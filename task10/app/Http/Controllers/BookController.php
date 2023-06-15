<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    public function add(Request $request, $username)
    {
        $this->validate($request, [
            'name_book' => 'required|max:50',
            'text' => 'required|'
        ]);

        Book::create([
            'user_id' => $username,
            'name_book' => $request->input('name_book'),
            'text' => $request->input('text'),
        ]);

        return redirect()->back()->with('info', 'Книга добавлена');
    }

    public function read($bookid)
    {
        $book = Book::find($bookid);

        return view('libraly.book', [
            'book' => $book
        ]);
        
    }

    public function getedit($bookid)
    {
        $book=Book::find($bookid);

        if (Auth::user() -> id !== $book -> user -> id) 
        {
            return redirect() -> route('home');
        }

        return view('libraly.edit', [
            'book' => $book
        ]);
    }
    // изменить книгу
    public function postEdit(Request $request,$bookid)
    {
        $book=Book::find($bookid);

        if(Auth::user()->id!==$book->user->id)
        {
            return redirect()->route('home');
        }

        $this->validate($request,
        [
            'name_book' => 'max:50',
        ]);
        $book -> update(
        [
            'name_book' => $request -> input('name_book'),
            'text' => $request -> input('text')
        ]);

        return redirect()->back()->with('info', 'Публикация изменена');
    }
    public function deleteBook($bookid)
    {
        $book=Book::find($bookid);

        if(Auth::user() -> id !== $book -> user -> id)
        {
            return redirect() -> route('home');
        }

        $book -> delete();

        return redirect() -> back() -> with('info', 'Книга удалена из вашей библиотеки');
    }

    public function readLink($bookid)
    {
        $link = Link::where('book_id', $bookid) -> first();

        if($bookid == $link -> book_id)
        {
            $book = Book::find($bookid);

            return view('libraly.book', [

                'book' => $book,
                
            ]);
        }

       return redirect() -> route('index');
    }
}