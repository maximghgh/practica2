@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-5 ">
        <h1>Регистрация</h1>
        <form method="POST" action="{{ route('auth.signup') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" id="email" aria-describedby="emailHelp" placeholder="Например: user@gmail.com">
            @if($errors->has('email'))
                <span class="help-block text-danger">
                    {{ $errors->first('email') }}
                </span>
            @endif
            <div id="emailHelp" class="form-text">We ll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Login</label>
            <input type="tetx" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : ''}}" id="password" placeholder="Например: user">
        @if($errors->has('username'))
            <span class="help-block text-danger">
                {{ $errors->first('username') }}
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
        


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection