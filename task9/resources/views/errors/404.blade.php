@extends('templates.default')


@section('content')
<div class="errors">
    <h1>Ошибка 404</h1>
    <p>Страница не найдена, вернуться <a href="{{ route('home') }}">на главную</a></p>
    <img src="https://celes.club/uploads/posts/2022-05/1652339715_53-celes-club-p-samurai-art-cherno-belii-krasivo-55.jpg" width="600px" height="800px" alt="">
</div>
@endsection