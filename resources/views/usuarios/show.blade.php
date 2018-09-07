@extends('layout')
@section('contenido')
    <h1>{{ $user->name }}</h1>
    <table class="table">
        <tr>
            <th>Nombre:</th>
            <th>{{ $user->name }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{ $user->email  }}</th>
        </tr>
        <tr>
            <th>Roles</th>
            <th>
                @foreach($user->roles as $role)
                    {{ $role->nombre }}
                @endforeach
            </th>
        </tr>
    </table>
    @can('edit', $user)
        <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info">Editar</a>
    @endcan
    @can('destroy', $user)
        <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display: inline;">
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    @endcan
@stop