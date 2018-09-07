@extends('layout')
@section('contenido')
    <h1>contactosss</h1>

    @if(session()->has('msg'))
        <h3>{{ session('msg') }}</h3>
    @else
        <form action="{{ route('mensajes.store') }}" method="POST">
           @include('mensajes.form')
        </form>
    @endif
@stop