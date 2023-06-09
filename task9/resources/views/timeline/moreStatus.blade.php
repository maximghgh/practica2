

@foreach ($statuses as $status)
    <div id="statuses">
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
                <a href="{{ route('status.like', ['statusId' => $status->id]) }}">лaйк</a>
            </li>
            
        @endif
        
        @if($status->user->id==Auth::user()->id)
            <li class="list-inline-item">
                <a class="btn btn-danger mr-3" href="{{ route('status.delete', ['statusId' => $status->id]) }}">Удалить</a>
            </li>       
        @endif
        <li class="list-inline-item">
            {{$status->likes->count()}}{{Str::plural(' like', $status->count())}}
        </li><hr>
        <h4>Комментарий под записью
        </h4><hr>
        
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
                        <button type="submit" onclik="" class="btn btn-primary btn-sm">Отправить комментарий</button>
                        
                </form>
                
            </div>
        </div>
    @endforeach