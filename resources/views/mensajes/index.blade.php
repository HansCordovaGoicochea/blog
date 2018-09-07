@extends('layout')

@section('contenido')
    <h1>todos los mensajes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mensajes as $mensaje)
            <tr>
                @if($mensaje->user_id)
                    <td>{{ $mensaje->user->name }}</td>
                    <td>{{ $mensaje->user->email }}</td>
                @else
                    <td>{{ $mensaje->nombre }}</td>
                    <td>{{ $mensaje->email }}</td>
                @endif
                <td>   <a href="{{ route('mensajes.show', $mensaje->id) }}">{{ $mensaje->mensaje }}</a></td>
                <td> {{ optional( $mensaje->note )->body }}</td>
                <td>
                    <a href="{{ route('mensajes.edit', $mensaje->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('mensajes.destroy', $mensaje->id) }}" method="POST" style="display: inline;">
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