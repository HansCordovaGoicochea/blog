@extends('layout')
@section('contenido')
    <h1>Editar mensaje</h1>

    @if(session()->has('msg'))
        <h3>{{ session('msg') }}</h3>
    @else
        <form action="{{ route('mensajes.update', $mensaje->id) }}" method="POST">
            {{--<input type="text" name="_token" value="{{ csrf_token() }}">--}}
            {!! method_field('PUT') !!}
           @include('mensajes.form', ['btnText' => 'Actualizar'])
        </form>
    @endif
@stop