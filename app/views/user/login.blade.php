{{ Form::open(['route'=>'auth']) }}

    <p>
        {{ Form::label('user[email]','Email') }}
        {{ Form::text('user[email]') }}
    </p>

    <p>
        {{ Form::label('user[password]','Password') }}
        {{ Form::password('user[password]') }}
    </p>

    <p class="actions">
        {{ Form::submit('Login',['class'=>'btn btn-primary']) }}
    </p>
{{ Form::close() }}