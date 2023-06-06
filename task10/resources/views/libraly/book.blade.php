@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <h1>Название: {{ $book->name_book }}</h1><hr>
        <p>{{ $book->text }} END.</p>
    </div>
</div>
@endsection