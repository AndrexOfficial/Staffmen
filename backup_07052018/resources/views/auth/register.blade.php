@extends('main')

@section('title', '| Registrazione')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {{ csrf_field() }}
                {{ Form::label('name', "Nome:") }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                {{ Form::label('password_confirmation', 'Conferma Password:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                {{ Form::label('role', 'Tipo di profilo:') }}
                <br/>
                {{ Form::select('role', ['Steward', 'Organizzatore'],null,['class' => 'form-control']) }}
                <br/>
                {{ Form::submit('Registrati', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
