<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $avtor=User::where('username',$username)->first();

        return view('profile.index', $avtor);
    }
    
}
