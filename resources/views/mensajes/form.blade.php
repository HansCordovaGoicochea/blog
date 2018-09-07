{{--<input type="text" name="_token" value="{{ csrf_token() }}">--}}
{!! csrf_field() !!}
{{--a menos que tenga un user id no se mostrara--}}
@unless (isset($mensaje) and $mensaje->user_id)
    @if (auth()->guest())
    <p>
        <label for="nombre">
            Nombre
            <input class="form-control" type="text" name="nombre" value="{{ $mensaje->nombre or old('nombre')  }}"/>
            {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
        </label>
    </p>
    <p>
        <label for="email">
            Email
            <input class="form-control" type="text" id="email" name="email" value="{{ $mensaje->email or old('email')  }}"/>
            {{ $errors->first('email') }}
        </label>
    </p>
        @endif
@endunless
<p>
    <label for="mensaje">
        Mensaje
        <textarea class="form-control" name="mensaje" id="" cols="30" rows="5">{{ $mensaje->mensaje or old('mensaje')  }}</textarea>
        {{ $errors->first('mensaje') }}
    </label>
</p>
<input type="submit" value="{{ $btnText or 'Guardar' }}" class="btn btn-primary">