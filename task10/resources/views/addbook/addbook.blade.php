@extends('templates.default')

@section('content')
<h2>Библиотека {{$avtor->first_name." ".$avtor->last_name}}</h2>
    <div class="row gap-3 mt-3">
        <h4>Добавить книгу</h4>
<form method="post" action="{{route('add', ['userId' => $user->id])}}" novalidate>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название книги</label>
        <input type="email" name="name_book" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    @if ($errors->has('name_book'))
        <span class="help-block text-danger">
            {{ $errors->first('name_book')}}
        </span>
    @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст книги</label>
        <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
    @if ($errors->has('text'))
        <span class="help-block text-danger">
            {{ $errors->first('text')}}
        </span>
    @endif
    </div>
        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>

@endsection 



