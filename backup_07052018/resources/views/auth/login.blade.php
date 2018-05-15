@extends('main')

@section('title', '| Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}

                {{ csrf_field() }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', "Password:") }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                <br>
                {{ Form::checkbox('remember') }}{{ Form::label('remember', " Ricordami") }}

                <br>
                {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

                <p><a href="{{ route('password.request') }}">Password Dimenticata</a>


            {!! Form::close() !!}
        </div>
    </div>

@endsection
