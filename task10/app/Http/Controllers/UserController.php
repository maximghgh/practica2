<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::select('*') -> get();

        return view('avtors.index') -> with('avtors', $users);
    }

}