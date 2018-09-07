{!! csrf_field() !!}
<p>
    <label for="name">
        Nombre
        <input class="form-control" type="text" name="name" value="{{ $user->name or old('name')  }}"/>
        {!! $errors->first('name', '<span class="error">:message</span>') !!}
    </label>
</p>
<p>
    <label for="email">
        Email
        <input class="form-control" type="text" id="email" name="email" value="{{ $user->email or old('email') }}"/>
        {{ $errors->first('email') }}
    </label>
</p>
@unless($user->id)
    <p>
        <label for="password">
            Password
            <input class="form-control" type="password" name="password" value=""/>
            {!! $errors->first('password', '<span class="error">:message</span>') !!}
        </label>
    </p>
    <p>
        <label for="password_confirmation">
            Password Confirm
            <input class="form-control" type="password" name="password_confirmation" value=""/>
            {!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
        </label>
    </p>
@endunless

<div class="form-check">
    <label class="form-check-label">
        @foreach($roles as $id => $nombre)
            <input type="checkbox"
                   class="form-check-input"
                   name="roles[]"
                   id="roles"
                   value="{{ $id }}"
                    {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
            {{ $nombre }}
        @endforeach
    </label>
</div>
{!! $errors->first('roles', '<span class="error">:message</span>') !!}
<hr>