@extends('layout')
@section('contenido')
   <h1>USUARIOS</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{ route('usuarios.show', $user->id) }}">
                        {{ $user->name }}
                    </a>
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    {{--{{ dd($user->roles->pluck('nombre')) }}--}}
                    {{--@foreach($user->roles as $role)--}}
                        {{--{{ $role->nombre }}--}}
                    {{--@endforeach--}}
                    {{ $user->roles->pluck('nombre')->implode(', ') }}
                </td>
                <td>
                    <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display: inline;">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@stop
