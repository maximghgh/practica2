@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-5">
    <h3>Регистрация</h3>
        <form method="POST" action="{{ route('auth.signin') }}" novalidate>
            @csrf
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="password" aria-describedby="emailHelp" placeholder="Например: user@user.com" value="{{ Request::old('email') ?: '' }}">
            @if($errors->has('email'))
            <span class="help-block text-danger">
                {{ $errors->first('email') }}
            </span>
            @endif
        </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Не менее 8 символов">
            @if($errors->has('password'))
            <span class="help-block text-danger">
                {{ $errors->first('password') }}
            </span>
            @endif
        </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
</div>
@endsection 