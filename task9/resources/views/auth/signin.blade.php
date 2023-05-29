@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-5 ">
        <h1>Войти в аккаунт</h1>
        <form method="POST" action="{{ route('auth.signin') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" id="email" aria-describedby="emailHelp" placeholder="Например: user@gmail.com" value="{{ Request::old('email') ?: ''}}">
            @if($errors->has('email'))
                <span class="help-block text-danger">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}" id="password" placeholder="Минимум 8 символов">
            @if($errors->has('password'))   
                <span class="help-block text-danger">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>
@endsection