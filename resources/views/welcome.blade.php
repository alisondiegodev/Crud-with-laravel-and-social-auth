@extends('layouts.main');

@section('content')
    <h1>{{ $user->name }}</h1>
    <h1>{{ $user->email }}</h1>
    <h1>{{ $user->avatar }}</h1>
@endsection
