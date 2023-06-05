<div class="d-flex align-items-center">
  <div class="flex-shrink-0 mb-3"  >
    <a href="{{ route('profile.index', ['username' => $user->username]) }}"></a> 
  </div>
  <div class="flex-grow-1 ms-3">
    <h5>
        <a href="{{ route('profile.index', ['username' => $user->username]) }}">{{ $user->getNameOrUsername() }}</a> 
    </h5>
  </div>
</div>