@extends('templates.default')


@section('content')

<div class="row">
    <div class="col-lg-6">
        @include('user.partials.userblock')
        <hr>
        <h4>Все записи {{ $user->getFirstNameOrUsername() }}:</h4>
        <hr>

@if( !$statuses->count() )
    <p>{{ $user->getFirstNameOrUsername() }} пока нет записей:(</p>
@else
    @foreach ($statuses as $status)
<div class="media">
    <a class="mr-3" href="{{ route('profile.index', ['username' => $status->user->username]) }}">
        <img class="media-object rounded" src="{{ $status->user->getAvatarUrl()}}" alt="{{ $status->user->getNameOrUsername() }}">
        <a href="{{ route('profile.index', ['username' => $status->user->username]) }}">
            {{ $status->user->getNameOrUsername() }}
        </a>
          
        
        </img>
    </a>
    
<div class="media-body">
    
    <p>{{ $status->body }}</p>
    <ul class="list-inline">
        <li class="list-inline-item">{{ $status->created_at->diffForHumans() }}</li>
        @if ( $status->user->id !== Auth::user()->id )
            <li class="list-inline-item">
                {{$status->likes->count()}}{{Str::plural(' like', $status->count())}}
            </li>
        @endif
        @if($status->user->id==Auth::user()->id)
            <li class="list-inline-item">
                <a class="btn btn-danger mr-3" href="{{ route('status.delete', ['statusId' => $status->id]) }}">Удалить</a>
            </li>       
        @endif
        <h4>Комментарий под записью</h4><hr>
    </ul>

@foreach ($status->replies as $reply)

<div class="media ms-5">
    
    <a class="mr-3" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
        <img class="media-object rounded mb-3" src="{{ $reply->user->getAvatarUrl()}}" alt="{{ $reply->user->getNameOrUsername() }}"></img>
    </a>
    
        <a class="gg me-1" href="  {{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a>
    <div class="media-body">
        
        
        <p>{{ $reply->body }}</p>
            <ul class="list-inline">
                <li class="list-inline-item">{{ $reply->created_at->diffForHumans() }}</li>
                @if ( $reply->user->id !== Auth::user()->id )
                <li class="list-inline-item">
                    <a href="{{ route('status.like', ['statusId' => $reply->id]) }}">лaйк</a>
                </li>
                @endif
                @if($reply->user->id==Auth::user()->id)
                    <li class="list-inline-item">
                        <a class="btn btn-danger mr-3" href="{{ route('status.delete', ['statusId' => $reply->id]) }}">Удалить</a>
                    </li>       
                @endif
                <li class="list-inline-item">
                    {{$reply->likes->count()}}{{Str::plural(' like', $reply->count())}}
                </li>
            </ul>
        </div>
    </div>
    @endforeach

@if( $authUserIsFriend || Auth::user()->id === $status->user->id )
                <form method="POST" action="{{ route('status.reply', ['statusId' => $status->id]) }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <textarea name="reply-{{ $status->id }}" class="form-control mb-3{{ $errors->has("reply-{$status->id }") ? ' is-invalid' : '' }}" placeholder="Оставьте комментарий {{ $status->user->getNameOrUsername() }}" rows="3"></textarea>
                    @if($errors->has("reply-{$status->id}"))
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $errors->first("reply-{$status->id}") }}
                        </div>
                    @endif
                    </div>
                        <button type="submit" class="btn btn-primary btn-sm">Отправить комментарий</button>
                </form>
                @endif
            </div>
        </div>
    @endforeach
        
@endif
    </div>


<div class="col-lg-4 col-lg-offset-3">

    @if ( Auth::user()->hasFriendRequestPending($user) )
    <p>В ожидании {{ $user->getFirstNameOrUsername() }}
    подтверждения запроса в друзья.</p>
    @elseif (Auth::user()->hasFriendRequestReceived($user))
        <a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-success mb-3"> Подвердить запрос на дружбу</a>
    @elseif(Auth::user()->isFriendWith($user))
        {{ $user->getFirstNameOrUsername() }} у вас в друзьях
        <form action="{{ route('friend.delete', ['username' => $user->username]) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-success" value="Удалить из друзей">    
        </form>
    @elseif(Auth::user()->id !==$user->id)
        <a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-success mb-3">Добавить в друзья</a>
    @endif

    <h4>У {{ $user->getFirstNameOrUsername() }} есть в друзьях:</h4>

    @if(!$user->friends()->count())
        <p>У {{ $user->getFirstNameOrUsername() }} Hет друзей.</p>
    @else
        @foreach($user->friends() as $user) 
            @include('user.partials.userblock')
        @endforeach
    @endif
</div>

</div>

@endsection