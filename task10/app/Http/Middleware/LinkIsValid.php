<?php

namespace App\Http\Middleware;
use App\Models\Book;
use App\Models\Link;

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

        if($book)
        {
            $link = Link::where('book_id', $bookid) -> first();
            
            return $next($request);
        }
        
        return redirect() -> route('home');
    }
}
