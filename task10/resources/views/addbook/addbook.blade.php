@extends('templates.default')

@section('content')

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Название книги</label>
            <input type="email" name="name_book" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Текст книги</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

@endsection 



