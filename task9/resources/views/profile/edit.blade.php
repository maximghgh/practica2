@extends('templates.default')


@section('content')

<div class="row">
    <div class="col-lg-6">
        <h1>Редактирование профиля:</h1>
        <form method="POST" action="{{ route('profile.edit') }}" novalidate>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : ''}}" id="name" aria-describedby="emailHelp" value="{{ Request::old('name') ?: Auth::user()->name}}">

            @if($errors->has('name'))
                <span class="help-block text-danger">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        
        <div class="mb-3">
            <label for="last_name" class="form-label">Фамилия</label>
            <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : ''}}" id="last_name" aria-describedby="emailHelp" value="{{ Request::old('last_name') ?: Auth::user()->last_name}}">

            @if($errors->has('last_name'))
                <span class="help-block text-danger">
                    {{ $errors->first('last_name') }}
                </span>
            @endif
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Локация</label>
            <input type="text" name="location" class="form-control{{ $errors->has('location') ? ' is-invalid' : ''}}" id="location" value="{{ Request::old('location') ?: Auth::user()->location}}">
            
            @if($errors->has('location'))   
                <span class="help-block text-danger">
                    {{ $errors->first('location') }}
                </span>
            @endif
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Обновить профиль</button>
        </form>
    </div>
</div>


@endsection