@extends('layouts.app')

@section('content')

  <div class="container">

    @if (Session::has('success'))
    	<div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Il mio Profilo</b></h3>
        <div class="card-options">
          <a href="{{ URL::to('/profile/edit')}}" class="btn btn-secondary btn-sm ml-2"><i class="fe fe-edit mr-2"></i>Modifica</a>
        </div>
      </div>
      <div class="card-body">

        <div class="d-flex justify-content-start">

          <span class="avatar avatar-xxl" style="background-image: url({{\Auth::user()->photo}})"></span>

          <div class="ml-4">
            <h3 class="mb-1">{{\Auth::user()->name}}</h3>
            <p class="mb-0">{{\Auth::user()->email}}</p>
            <p class="text-muted"><i class="fe fe-map-pin"></i> {{\Auth::user()->location}}</p>
            @foreach (\Auth::user()->jobs as $job)
              <span class="tag">{{$job->name}}</span>
            @endforeach
          </div>

        </div>

      </div>

      </div>
    </div>


  </div>

@endsection
