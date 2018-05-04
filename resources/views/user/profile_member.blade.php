@extends('layouts.app')

@section('content')

  <div class="container">

    @if (Session::has('success'))
    	<div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Profilo Steward</b></h3>
      </div>
      <div class="card-body">

        <div class="d-flex justify-content-start">

          <span class="avatar avatar-xxl" style="background-image: url({{$member->photo}})"></span>

          <div class="ml-4">
            <h3 class="mb-1">{{$member->name}}</h3>
            @if($member->location)
              <p class="text-muted"><i class="fe fe-map-pin"></i> {{$member->location}}</p>
            @endif
            @foreach ($member->jobs as $job)
              <span class="tag">{{$job->name}}</span>
            @endforeach
          </div>

        </div>

      </div>

      </div>
    </div>


  </div>

@endsection
