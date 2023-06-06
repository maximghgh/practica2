<div class="card border-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">{{$book->name_book}}</div>
    <div class="row p-3 gap-3">
      <a href="{{ route('book', ['bookid' => $book->id])}}" class="btn btn-primary">Прочитать</a>
      @if (Auth::user()->id===$book->user_id)    
        <a href="{{route('edit', ['bookid' => $book->id])}}" class="btn btn-secondary btn-sm">Изменить</a>
        <a href="{{route('delete', ['bookid' => $book->id])}}" class="btn btn-danger btn-sm">Удалить</a>
      @endif
    </div>
</div>