<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Social</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{--  @if (Auth::check())  --}}
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Стена</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Друзья</a>
            </li>
            <form class="d-flex ">
                <input class="form-control me-2 " type="search" placeholder="Поиск..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
        </ul>
        {{--  @endif  --}}
        <ul class="navbar-nav ml-auto">  

            @if (Auth::check())
            {{--  <li class="nav-item"> <a href="#" class="nav-link">{{ Auth::user()->getNameOrUsername() }}</a></li>  --}}
                <li class="nav-item"> <a href="/" class="nav-link">Bыйtи</a></li><

            @else
                <li class="nav-item"> <a href="{{route('auth.signup')}}" class="nav-link">3apeгистриpоваться</a></li>
                <li class="nav-item"> <a href="/" class="nav-link">Bойти</a></li>
            @endif
        </ul>
        </div>
    </div>
</nav>