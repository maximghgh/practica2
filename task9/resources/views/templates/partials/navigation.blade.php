<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Social</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @if (Auth::check())
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Стена</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('friend.index') }}">Друзья</a>
            </li>
            <form method="GET" action="{{ route('search.results') }}" class="d-flex ">
                <input class="form-control me-2 " name="query" type="search" placeholder="Поиск..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </ul>
        @endif
        <ul class="navbar-nav ml-auto">  

            @if (Auth::check())
            <li class="nav-item"> 
                <a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}" class="nav-link">{{ Auth::user()->getNameOrUsername() }}</a>
            </li>
            <li class="nav-item"> 
                <a href="{{ route('profile.edit')}}" class="nav-link">Редактировать профиль</a>
            </li>
            <li class="nav-item"> 
                <a href="{{ route('auth.signout')}}" class="nav-link">Bыйти из аккаунта</a>
            </li>

            @else
                <li class="nav-item"> 
                    <a href="{{ route('auth.signup')}}" class="nav-link">3apeгистриpоваться</a>
                </li>
                
                <li class="nav-item"> 
                    <a href="{{ route('auth.signin')}}" class="nav-link">Bойти</a>
                </li>
            @endif
        </ul>
        </div>
    </div>
</nav>