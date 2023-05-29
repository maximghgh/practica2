@extends('templates.default')


@section('content')

<div class="row">
    <div class="col-lg-6">
        @include('user.partials.userblock')
    </div>


<div class="col-lg-4 col-lg-offset-3">

    @if ( Auth::user()->hasFriendRequestPending($user) )
    <p>В ожидании {{ $user->getFirstNameOrUsername() }}
    подтверждения запроса в друзья.</p>
    @elseif (Auth::user()->hasFriendRequestReceived($user))
        <a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-success mb-3"> Подвердить запрос на дружбу</a>
    @elseif(Auth::user()->isFriendWith($user))
        {{ $user->getFirstNameOrUsername() }} у вас в друзьях
    @elseif(Auth::user()->id !==$user->id)
        <a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-success mb-3">Добавить в друзья</a>
    @endif

    <h4>У {{ $user->getFirstNameOrUsername() }} есть в друзьях:</h4>

    @if(!$user->friends()->count())
        <p>{{ $user->getFirstNameOrUsername() }} Hет друзей.</p>
    @else
        @foreach($user->friends() as $user) 
            @include('user.partials.userblock')
        @endforeach
    @endif
</div>

</div>

@endsection