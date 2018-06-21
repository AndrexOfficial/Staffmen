@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>
<title>Profilo utente</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Profilo utente">

<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{ asset('/css/profile-member-style.css')}}">
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="30">

  <div class="container">

    @if (Session::has('success'))
    	<div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
<div class="card">
      <div class="card-header">
        <h3 class="card-title"><b>Profilo</b></h3>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-start">
          <span class="avatar avatar-xxl" style="background-image: url({{asset($member->photo)}})"></span>
          <div class="ml-4">
            <h3 class="mb-1">{{$member->name}}</h3>
            @if($member->location)
              <p class="text-muted"><i class="fe fe-map-pin"></i> {{$member->location}}</p>
            @endif

              <p>Curriculum CV:</p><a href="{{asset($member->cv)}}" target="_blank">Scarica Curriculum</a>
          </div>                 
        </div>
      </div>
        <div class="col-md-12">
            <h5>Email:</h5><p>{{$member->email}}</p>
        </div>
        <div class="col-md-12">
            <h5>Indirizzo:</h5><p>{{$member->location}}</p>
        </div>
        <div class="col-md-12">
            <h5>Registrato come:</h5><p>@if($member->role==1)Steward @else Organizzatore @endif</p>
        </div>
        <div class="col-md-12">
            <h5>Numero di Telefono:</h5><p>{{$member->phone_number}}</p>
        </div>
        <div class="col-md-12">
            <h5>Bio:</h5><p>{{$member->descr}}</p>
        </div>
        <div class="col-md-12">
            <h5>Età:</h5><p>{{$member->age}}</p>
        </div>
        <div class="col-md-12">
            <h5>Sesso:</h5><p>@if($member->sex==1)Maschio @else Femmina @endif</p></p>
        </div>
        <div class="col-md-12">
            <h5>Colore capelli:</h5><p>{{$member->hair}}</p>
        </div>
        <div class="col-md-12">
            <h5>Colore occhi:</h5><p>{{$member->eyes}}</p>
        </div>
        <div class="col-md-12">
            <h5>Altezza:</h5><p>{{$member->height}}</p>
        </div>
        <div class="col-md-12">
            <h5>Taglia maglietta:</h5><p>{{$member->tshirt_size}}</p>
        </div>
        <div class="col-md-12">
            <h5>Numero di piede:</h5><p>{{$member->shoes_size}}</p>
        </div>
        <div class="col-md-12">
            <h5>Lavori precedenti:</h5><p>{{$member->prev_job}}</p>
        </div>

    </div>
      
  </div>

@endsection
