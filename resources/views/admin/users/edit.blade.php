@extends('admin.layouts.app')

@section('title', 'Editar')

@section('content')

    <h1>Editar usuario {{ $user->name }}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('patch')
        @include('admin.users.partials.form')
    </form>

@endsection
