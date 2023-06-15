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

        if (Link::where('book_id', $bookid) -> first()) {
            return redirect() -> back() -> with('info', 'Книга уже расшарена');
        }

        Link::create(['book_id' => $bookid]);

        return redirect() -> back() -> with('info', 'Теперь вы можете поделится своей книгой');
    }

}
