<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user) 
        {
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();

        return view('profile.index', [
            'user' => $user,
            'statuses' => $statuses,
            'authUserIsFriend' => Auth::user()->isFriendWith($user)
        ]);
    }

    public function getEdit()
    {
        return view('profile.edit', compact('user'));
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:30',
        ]);

        Auth::user()->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('profile.edit')->with('info', 'Профиль успешно обновлен!');
    }
}