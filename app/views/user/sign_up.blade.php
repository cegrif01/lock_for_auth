
{{ Form::open(['route'=>'sign-up']) }}

    <p>
        {{ Form::label('user[email]','Email') }}
        {{ Form::text('user[email]') }}
    </p>

    <p>
        {{ Form::label('user[password]','Password') }}
        {{ Form::password('user[password]') }}
    </p>

    <p>
        {{ Form::label('user[password_confirmation]','Password Confirmation') }}
        {{ Form::password('user[password_confirmation]') }}
    </p>

    <p class="actions">
        {{ Form::submit('Sign Up',['class'=>'btn btn-primary']) }}
        {{ HTML::link(URL::to('/'),'Cancel',['class'=>'btn']) }}
    </p>
{{ Form::close() }}
