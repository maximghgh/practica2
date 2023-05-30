<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends= Auth::user()->friends();
        $requests= Auth::user()->friendRequests();

        return view('friends.index', [
            'friends' => $friends,
            'requests'=> $requests
        ]);
    }

    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();

        if ( ! $user) {
            return redirect()
            ->route('home')
            ->with('info', 'Пользователь не найден!');
        }


        if(Auth::user() ===$user->id)
        {
            return redirect()->route('home');
        }

        if( Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user()) )
        {
            return redirect()
            ->route('profile.index', ['username' => $user->username])
            ->with('info', 'Пользователю отправлен запрос в друзья');
        }

        if( Auth::user()->isFriendWith($user))
        {
            return redirect()
            ->route('profile.index', ['username' => $user->username])
            ->with('info', 'Пользователю уже у вас в друзьях');
        }

        Auth::user()->addFriend($user);
        return redirect()
        ->route('profile.index', ['username' => $user->username])
        ->with('info', 'Пользователю отправлен запрос в друзья');

        
    }

    public function getAccept($username)
    {
        $user = User::where('username', $username)->first();

        if ( ! $user) {
            return redirect()
            ->route('home')
            ->with('info', 'Пользователь не найден!');
        }

        if ( ! Auth::user()->hasFriendRequestReceived($user) ) 
        {
            return redirect()
            ->route('home');
        }

        Auth::user()-> acceptFriendRequest($user);
        
        return redirect()
        ->route('home')
        ->with('info', 'Запрос в друзья принят');
    }

    public function postDelete($username)
    {
        $user = User::where('username', $username)->first();

        if( !Auth::user()->isFriendWith($user))
        {
            return redirect()->back();
        }
        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Удален из друзей');
    }
}
