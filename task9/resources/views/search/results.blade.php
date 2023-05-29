@extends('templates.default')


@section('content')
    <h1>Результаты поиска: "{{ Request::input('query')}}" </h1>
    
    @if(!$users->count())
        <p>Пользователь не найден</p>
    @else
            <div class="row">
                <div class="col-lg-6">
                    @foreach ($users as $user)
                        @include('user.partials.userblock')
                    @endforeach
                </div>
            </div>
    @endif
   
@endsection