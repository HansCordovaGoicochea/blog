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
            {!! csrf_field() !!}
            <p>
                <label for="name">
                    Nombre
                    <input class="form-control" type="text" name="name" value="{{ $user->name  }}"/>
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </label>
            </p>
            <p>
                <label for="email">
                    Email
                    <input class="form-control" type="text" id="email" name="email" value="{{ $user->email  }}"/>
                    {{ $errors->first('email') }}
                </label>
            </p>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>

@stop