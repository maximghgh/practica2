<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\User;
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
        $book=Book::find($bookid);

        if(Auth::user()->id==$book->user->id) 
        {
            $book=Book::where('id', $bookid)->first();

            
            return view('libraly.book', [
                'book' => $book
            ]);
        }

        $read=DB::table('readers')->where('user_id', $book->user->id)->where('reader_id', Auth::user()->id)->first();

        if(Auth::user()->id==$read->reader_id)
        {
            $book=Book::where('id', $bookid)->first();

            return view('libraly.book',[
                'book' => $book
            ]);
        }

        return redirect()->route('home');

        
    }

        public function getedit($bookid)
    {
        $book=Book::find($bookid);

        if(Auth::user()->id!==$book->user->id) 
        {
            return redirect()->route('home');
        }

        $book=Book::where('id', $bookid)->first();

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

        Book::where('id', $bookid)
              ->update(['name_book' => $request->input('name_book'),
                        'text' => $request->input('text')
            ]);
        
        return redirect()->back()->with('info', 'Публикация изменена');
    }
    public function deleteBook($bookid)
    {
        $book=Book::find($bookid);

        if(Auth::user()->id!==$book->user->id)
        {
            return redirect()->route('home');
        }

        Book::where('id', $bookid)->delete();

        return redirect()->back()->with('info', 'Книга удалена из вашей библиотеки');
    }
}