@extends('layouts.app')

@section('content')

  <div class="container">

    @if (Session::has('success'))
    	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ Session::get('success') }}
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Richieste</b></h3>
      </div>
      <ul class="list-group list-group-flush">
        @if(\Auth::user()->requests->count()==0)
          <li class="list-group-item">
            <small class="text-muted">
              Non hai richieste 
            </small>
          </li>
        @endif
      @foreach (\Auth::user()->requests as $request)
        <li class="list-group-item">
          <div class="d-flex justify-content-between align-items-center">
            <div>
               Hai mandato una richiesta di partecipare all'evento
               <a href="/events/{{$request->game->id}}"></a>
               <br>
               <small class="text-muted">
                 {{\Carbon\Carbon::parse($request->created_at)->diffforhumans()}}
               </small>
            </div>
            @if($request->state==0)
              <span class="tag">In Attesa</span>
            @elseif($request->state==1)
              <span class="tag tag-green">Accettato</span>
            @elseif($request->state==2)
              <span class="tag tag-red">Refiutato</span>
            @endif
          </div>
        </li>
      @endforeach
      </ul>

  </div>

@endsection
