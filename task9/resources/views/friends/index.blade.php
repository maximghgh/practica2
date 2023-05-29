@extends('templates.default')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <h4>Ваши друзья:</h4>
        @if(!$friends->count())
            <p>У вас нет друзей</p>
        @else
            @foreach($friends as $user) 
                @include('user.partials.userblock')
            @endforeach
        @endif
    </div>
    <div class="col-lg-6">
        <h4>Запросы в друзья:</h4>
        @if(!$requests->count())
            <p>У вас нет запросов в друзья</p>
        @else
            @foreach($requests as $user) 
                @include('user.partials.userblock')
            @endforeach
        @endif
    </div>

</div>

@endsection