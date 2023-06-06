@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <h2>Редактирование</h2>
        <form method="post" action="{{route('edit', ['bookid' => $book->id])}}" novalidate>
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" name="name_book" class="form-control {{$errors->has('name_book') ? ' is-invalid' : ''}}" id="title" placeholder="Название книги" value="{{$book->name_book}}">
                @if ($errors->has('title'))
                    <span class="help-block text-danger">
                        {{ $errors->first('name_book')}}
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="text">Текст</label>
                <textarea name="text" class="form-control" placeholder="Текст книги" id="text" style="height: 100px">{{$book->text}}</textarea>
                @if ($errors->has('text'))
                    <span class="help-block text-danger">
                        {{ $errors->first('text')}}
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Редактировать публикацию</button>
        </form>
    </div>
</div>
@endsection
