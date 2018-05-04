@extends('layouts.head')
@section('content')
<link href="{{ asset('css/background.css') }}" rel="stylesheet">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="images/logo.png" class="h-10" alt="">
              </div>
              <form class="card" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
                <div class="card-body p-6">
                  <div class="card-title">Login al tuo Account</div>
                  <div class="form-group">
                    <label class="form-label">Indirizzo email</label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserisci email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                    </label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                <p>Non hai ancora un account? <a href="/register">Registrati</a></p>
              </div>
              <div class="text-center text-muted">
                <p><- Torna a <a href="/">Home</a></p>
              </div>
            </div>
          </div>
        </div>

        @endsection
