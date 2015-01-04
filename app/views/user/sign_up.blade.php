
{{ Form::open(['route'=>'sign-up']) }}

    <p>
        {{ Form::label('email','Email') }}
        {{ Form::text('email') }}
    </p>

    <p>
        {{ Form::label('password','Password') }}
        {{ Form::password('password') }}
    </p>

    <p>
        {{ Form::label('password_confirmation','Password Confirmation') }}
        {{ Form::password('password_confirmation') }}
    </p>

    <p class="actions">
        {{ Form::submit('Sign Up',['class'=>'btn btn-primary']) }}
        {{ HTML::link(URL::to('/'),'Cancel',['class'=>'btn']) }}
    </p>
{{ Form::close() }}
