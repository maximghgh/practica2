<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller
{
    // добавить читателя
    public function addReader($username)
    {
        if(Auth::user() -> id == $username)
        {
            return redirect()->route('home'); 
        }

        $reader=DB::table('readers') -> where('reader_id', $username) -> first();

        if($reader==null)
        {
            $reader='';
        }

        if($reader)
        {
            DB::table('readers') -> where('reader_id', $username)->update(['accepted' => 1]);

            return redirect() -> back() -> with('info', 'Пользователю предоставлен доступ к библиотеке');
        }

        DB::table('readers') -> insert([
            'user_id' => Auth::user() -> id,
            'reader_id' => $username
        ]);

        return redirect()->back()->with('info', 'Пользователю добавлен доступ к библиотеке');

    }

    public function delReader($username)
    {
        if(Auth::user() -> id == $username)
        {
            return redirect() -> route('home');
        }

        DB::table('readers') -> where('reader_id', $username) -> update(['accepted' => 0]);

        return redirect() -> back() -> with('info', 'Доступ у пользователя был отключен');
    }
}
