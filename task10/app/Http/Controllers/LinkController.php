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
    public function getLink($bookid)
    {
        DB::table('links') -> insert(['book_id' => $bookid]);

        $link = Link::where('book_id', $bookid) -> first();

        return view('links.index', [

            'link' => $link

        ]) -> with('info', 'Можете поделится своей библиотекой');
    }

    public function viewLink($bookid)
    {
        $book=Book::where('id', $bookid) -> first();

        $reader = '';

        $read_book = '';

        $link=Link::where('book_id', $bookid) -> first();

        if($link === null)
        {

            $link='';

        }


        return view('links.index', [

            'book' => $book,
            'reader' => $reader,
            'read_book' => $read_book,
            'link' => $link

        ]);

    }
}
