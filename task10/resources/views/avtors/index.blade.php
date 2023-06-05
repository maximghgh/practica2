@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
        <h4>Наши авторы: </h4>
        @foreach ($avtors as $avtor)
        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $avtor->first_name." ".$avtor->last_name}}</h5>    
            </div>
            <a href="{{ route('profile.index', ['username' => $avtor->username] ) }}" class="btn btn-primary">Посмотреть профиль</a>
        </div>
        @endforeach
        
    </div>
@endsection  