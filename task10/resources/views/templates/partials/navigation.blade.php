<nav class="navbar bg-dark border-bottom border-bottom-dark navbar-expand-lg bg-body-tertiary mb-2" data-bs-theme="dark">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">Библиотека</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
        @if(Auth::check())
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('avtors')}}">Наши авторы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.index', ['username' => Auth::user()->username] )}}">{{ Auth::user()->getNameOrUsername() }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.signout')}}">Выйти из аккаунта</a>
                </li>
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('auth.signin')}}">Войти в аккаунта</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.signup')}}">Зарегистрироваться</a>
                </li>
            </ul>
        @endif
        </div>
    </div>
</nav>