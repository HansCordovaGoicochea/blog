@extends('layout')
@section('contenido')
    <h1>Crear usuario</h1>

    @if(session()->has('info'))
        {{--esto se envia desde el controllador del user--}}
        <div class="alert alert-success" role="alert">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <form action="{{ route('usuarios.store') }}" method="POST">
        {{--<input type="text" name="_token" value="{{ csrf_token() }}">--}}

        @include('usuarios.form', ['user' => new \App\User])
        <input class="btn btn-primary" type="submit" value="Guardar">
    </form>

@stop