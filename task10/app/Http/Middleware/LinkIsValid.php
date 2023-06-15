<?php

namespace App\Http\Middleware;
use App\Models\Book;
use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Auth;

use Closure;

class LinkIsValid
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bookid = explode('/', $request);
        $bookid = $bookid[2];
        $bookid = explode(' ', $bookid);
        $bookid = $bookid[0];

        $book = Book::where('id', $bookid) -> first();

        if (Auth::user()) {
            
            // проверка пользователя
            if (Auth::user() -> id === $book -> user -> id) { 
                return $next($request);
            }

            //проверка по доступу к библиотеке
            if (DB::table('readers') -> where([['user_id', $book -> user -> id], ['reader_id', Auth::user() -> id], ['accepted', 1]]) -> first()) 
            {

                $book = Book::where('id', $bookid) -> first();
    
                return $next($request);
                
            }
        }

        // проверка по доступу по ссылке
        if ($book) 
        {
            $link = Link::where('book_id', $bookid) -> first();

            if( ! $link) return redirect() -> route('home');
            
            return $next($request);
        }
        
        return redirect() -> route('home');
    }
}
