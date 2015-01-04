{{ Form::open(['route'=>'auth']) }}

    <p>
        {{ Form::label('email','Email') }}
        {{ Form::text('email') }}
    </p>

    <p>
        {{ Form::label('password','Password') }}
        {{ Form::password('password') }}
    </p>

    <p class="actions">
        {{ Form::submit('Login', ['class'=>'btn btn-primary']) }}
    </p>

{{ Form::close() }}