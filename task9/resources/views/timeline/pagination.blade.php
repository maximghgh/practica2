@foreach($replies as $reply)
    <div class="comment">{{ $reply->text }}</div>
@endforeach

@if($replies->hasMorePages())
    <a id="load-more" href="{{ $replies->nextPageUrl() }}">Показать все комментарии</a>
@endif