@extends('layouts.head')
@section('content')
<link href="{{ asset('css/background.css') }}" rel="stylesheet">
        <div class="container">
          <div class="row">
              <div class="col col-login mx-auto">
                <form class="card" action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                  <div class="card-body p-6">
                    <div class="card-title">Crea nuovo Account</div>
                    <div class="form-group">
                      <label class="form-label">Nome</label>
                      <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Digita il tuo nome">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="form-label">Indirizzo email</label>
                      <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Digita email">
                      @if ($errors->has('email'))
                          <span class="invalid-feedback">
                              {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback">
                              {{ $errors->first('password') }}
                          </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label class="form-label">Conferma Password</label>
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Ridigita Password">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Tipo di profilo:</label>
                      <br/>
                      <select class="form-control" name="role">
                        <option value="0">Steward</option>
                        <option value="1">Organizzatore</option>
                      </select>
                      <br/>
                    </div>

                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary btn-block">Crea Nuovo Account</button>
                    </div>
                  </div>
                </form>
                <div class="text-center text-muted">
                  <p>Hai già un Account? <a href="/login">Log In</a></p>
                </div>
              </div>
            </div>
        </div>

      @endsection
