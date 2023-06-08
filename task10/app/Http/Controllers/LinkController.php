<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\Link;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    public function getLink()
    {
        DB::table('links')->insert(['user_id' => Auth::user()->id]);

        return redirect()->back();
    }

    public function viewLink($username)
    {
        $avtor=User::where('id', $username)->first();
        
        $books=$avtor->books()->get();

        $reader='';

        $read_book='';

        $link=Link::where('user_id', $username)->first();

        if($link===null)
        {
            $link='';
        }


        return view('links.index', [
            'avtor' => $avtor,
            'books' => $books,
            'reader' => $reader,
            'read_book' => $read_book,
            'link' => $link
        ]);
    }
}
