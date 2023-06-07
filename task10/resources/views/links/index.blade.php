@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <h2>Библиотека {{$avtor->first_name." ".$avtor->last_name}}</h2>
    </div>
    <h4>Книги {{$avtor->first_name." ".$avtor->last_name}}</h4>
        @foreach ($books as $book)
            @include('libraly.books')
        @endforeach
</div>
@endsection
