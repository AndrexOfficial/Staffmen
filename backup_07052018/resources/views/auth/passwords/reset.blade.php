@extends('main')

@section('title', '| Password dimenticata')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Resetta Password</div>

				<div class="panel-body">

					{!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

					{{ Form::hidden('token', $token) }}

					{{ Form::label('email', 'Indirizzo Email:') }}
					{{ Form::email('email', $email, ['class' => 'form-control']) }}

					{{ Form::label('password', 'Nuova Password:') }}
					{{ Form::password('password', ['class' => 'form-control']) }}

					{{ Form::label('password_confirmation', 'Conferma Nuova Password:') }}
					{{ Form::password('password_confirmation', ['class' => 'form-control']) }}

					{{ Form::submit('Resetta Password', ['class' => 'btn btn-primary']) }}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>

@endsection
