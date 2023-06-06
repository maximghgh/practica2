@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h3>Автор: {{$avtor->first_name." ".$avtor->last_name}}</h3><hr>

            @if (Auth::user()->id===$avtor->id)
            <h4>Добавить книгу</h4>
    <form method="POST" action="{{route('add', ['username' => $avtor->id])}}" novalidate>
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название книги</label>
        <input type="text" name="name_book" class="form-control {{$errors->has('name_book') ? ' is-invalid' : ''}} " id="exampleFormControlInput1" placeholder="Название книги" value="{{Request::old('name_book') ?: ''}}">
    @if ($errors->has('name_book'))
        <span class="help-block text-danger">
            {{ $errors->first('name_book')}}
        </span>
    @endif
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст книги</label>
        <textarea class="form-control {{$errors->has('text') ? ' is-invalid' : ''}} " name="text" id="exampleFormControlTextarea1" placeholder="Текст книги" rows="3" >{{Request::old('text') ?: ''}}</textarea>
    @if ($errors->has('text'))
        <span class="help-block text-danger">
            {{ $errors->first('text')}}
        </span>
    @endif
    </div>
        <button type="submit" class="btn btn-primary mb-3">Опубликовать</button><hr>
    </form>
    @else
    @if($reader)
        @if ($reader->accepted===1)
            <a href="{{ route('reader.del', ['username' => $avtor->id] )}}" type="button" class="btn btn-danger">Убрать доступ из библиотеки</a>
        @else
            <a href="{{ route('reader', ['username' => $avtor->id] )}}" type="button" class="btn btn-success">Дать доступ к своей библиотеке</a><hr>
        @endif
    @else
        <a href="{{ route('reader', ['username' => $avtor->id] )}}" type="button" class="btn btn-success">Дать доступ к своей библиотеке</a><hr>
    @endif
        @endif
        <h4>Книги {{$avtor->first_name." ".$avtor->last_name}}:</h4>
        @foreach ($books as $book)
            @include('libraly.books')
        @endforeach
    
    </div>
</div>

@endsection  