<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AvtorController extends Controller
{

    public function getAvtors()
    {
        $avtors = DB::table('users')->select('*')->get();
        return view('avtors.index')->with('avtors',$avtors);
    }
    
}
