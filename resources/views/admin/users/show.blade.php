@extends('admin.layouts.app')

@section('title', $user->name)

@section('content')

    <h1>{{ $user->name }}</h1>
    <ul>
        <li>Nome: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
    </ul>
    <x-alert/>

    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Deletar</button>
        </form>
    @endcan
@endsection
