@extends('layout')
@section('contenido')
    <h1>Saludo {{ $nombre  }}</h1>

    @foreach($consolas as $consola)
        <li>{{ $consola  }}</li>
    @endforeach

    @forelse($deportes as $deporte)
        <li>{{ $deporte  }}</li>
    @empty
        <h1>No hay deportes</h1>

    @endforelse
@stop