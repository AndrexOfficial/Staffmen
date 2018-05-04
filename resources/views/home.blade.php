@extends('layouts.app')

@section('content')

  <div class="container">

      <div class="page-header">
              <h1 class="page-title">
                Home
              </h1>
            </div>

      <div class="row">

        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
              <div class="card-body p-6 text-center">
                <div class="h1 m-0">{{\App\Job::count()}}</div>
                <div class="text-muted">Lavori</div>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-4 col-lg-2">
              <div class="card">
                <div class="card-body p-6 text-center">
                  <div class="h1 m-0">{{\App\User::count()}}</div>
                  <div class="text-muted">Utenti</div>
                </div>
              </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-6 text-center">
                    <div class="h1 m-0">{{\Auth::user()->requests->count()}}</div>
                    <div class="text-muted">Richieste</div>
                  </div>
                </div>
              </div>

      </div>



@endsection
