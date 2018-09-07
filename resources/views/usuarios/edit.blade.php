@extends('layout')
@section('contenido')
    <h1>Editar usuario</h1>

    @if(session()->has('info'))
        {{--esto se envia desde el controllador del user--}}
        <div class="alert alert-success" role="alert">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
        <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            {{--<input type="text" name="_token" value="{{ csrf_token() }}">--}}
            {!! method_field('PUT') !!}
            @include('usuarios.form')
            <input class="btn btn-primary" type="submit" value="Editar">
        </form>

@stop