@extends('layouts.main')

@section('content')
    @auth
        <div>LOGGADO</div>

    @endauth
    @guest
        <div>DESLOGADO</div>
    @endguest
    <div class="flex justify-center w-screen gap-4">
        <br><br>
        <a href="/login">LOGIN</a>
        <br><br>
        <a href="/register">REGISTER</a>
    </div>
@endsection
