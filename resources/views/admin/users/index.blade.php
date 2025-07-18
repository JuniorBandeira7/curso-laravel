@extends('admin.layouts.app')
@section('title', 'Listagem dos usuários')


@section('content')
<h1>Usuarios for else caso users for vazio executa a diretiva empty</h1>

    <a href="{{ route('users.create') }}">Adicionar novo usuario</a>

    <x-alert/>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                    <td><a href="{{ route('users.show', $user->id) }}">Detalhes</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="100">Nenhum usuario</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
