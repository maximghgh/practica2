<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $avtor=User::where('username',$username)->first();

        $books=$avtor->books()->get();


        return view('profile.index', [
            'avtor' => $avtor,
            'books' => $books
        ]);
    }
    
}
