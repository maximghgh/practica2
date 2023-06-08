<div class="card border-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">Название : {{$book->name_book}}</div>
    <div class="row p-3 gap-3">
    @if (Auth::user())
      @if (Auth::user()->id===$book->user_id)    
        <a href="{{ route('book', ['bookid' => $book->id])}}" class="btn btn-primary">Прочитать</a>
        <a href="{{route('edit', ['bookid' => $book->id])}}" class="btn btn-secondary btn-sm">Изменить</a>
        <a href="{{route('delete', ['bookid' => $book->id])}}" class="btn btn-danger btn-sm">Удалить</a>
        <a href="{{route('link')}}" class="btn btn-success">Поделиться книгой</a>
      @endif
    @endif 

    @if($read_book)
        @if(Auth::user()->id===$read_book->reader_id && $read_book->accepted===1)
        <a href="{{ route('book', ['bookid' => $book->id])}}" class="btn btn-primary">Прочитать</a>
        @endif
    @endif

    @if ($link)
        @if (Auth::user())  
        @else
        <a href="{{route('links.book', ['bookId' => $book->id])}}" class="btn btn-info btn-sm">Прочитать</a>
      @endif
    @endif
    </div>
</div>