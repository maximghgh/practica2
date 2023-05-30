<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Status;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if( Auth::check())
        {
            $statuses = Status::NotReply()->where(function($query)
            {
                return $query->where('user_id', Auth::user()->id)->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));

            })
            ->orderBy('created_at', 'desc')->paginate(20);

            return view('timeline.index', compact('statuses'));
        }


        return view('home');
    }
    
}
