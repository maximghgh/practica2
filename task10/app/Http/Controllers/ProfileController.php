<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $avtor = User::where('username',$username) -> first();

        $books = $avtor -> books() -> get();

        $reader = Reader::where('user_id', Auth::user()->id) -> where('reader_id', $avtor->id) -> first();

        if($reader == null)
        {
            $reader = '';
        }

        $read_book = DB::table('readers') -> where('user_id', $avtor) -> where('reader_id', Auth::user() -> id) -> first();

        if($read_book == null)
        {
            $read_book = '';
        }

        return view('profile.index', [

            'avtor' => $avtor,
            'books' => $books,
            'reader' => $reader,
            'read_book' => $read_book,

        ]);
    }
    
}
