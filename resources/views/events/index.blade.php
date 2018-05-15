@extends('layouts.app')
<link href="{{ asset('css/app-core-style.css') }}" rel="stylesheet">
@section('content')
  <div class="container">

    @if (Session::has('success'))
    	<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        <i class="fe fe-check mr-2" aria-hidden="true"></i> {{ Session::get('success') }}
      </div>
    @endif

    <div class="row">
              <div class="col-md-3">
                <h3 class="page-title mb-5">Eventi</h3>
                <div>
                  @if(\Auth::user()->role==2)
                  <div class="mb-6">
                    <a href="{{ URL::to('/events/new')}}" class="btn btn-primary btn-block">
                    <i class="fe fe-plus mr-2"></i> Crea Nuovo
                    </a>
                  </div>
                  @endif
                  <div class="list-group list-group-transparent mb-6">
                    <a href="{{ URL::to('/events')}}" class="list-group-item list-group-item-action d-flex align-items-center @if(\Request::path()=='events') active @endif">
                      <span class="icon mr-3"><i class="fe fe-chevron-right"></i></span>
                      <small><b>PROSSIMI EVENTI</b></small>
                      <span class="ml-auto tag">{{$events->total()}}</span>
                    </a>
                    <a href="{{ URL::to('/my-events')}}" class="list-group-item list-group-item-action d-flex align-items-center @if(\Request::path()=='my-events') active @endif">
                      <span class="icon mr-3">
                        <i class="fe fe-chevron-right"></i></span>
                        <small><b>I MIEI EVENTI</b></small>
                        <span class="ml-auto tag">{{\Auth::user()->myEvents->count()}}</span>
                    </a>
                    <a href="{{ URL::to('/attending')}}" class="list-group-item list-group-item-action d-flex align-items-center @if(\Request::path()=='attending') active @endif">
                      <span class="icon mr-3">
                        <i class="fe fe-chevron-right"></i></span>
                        <small><b>EVENTI A CUI PARTECIPO</b></small>
                        <span class="ml-auto tag">{{\Auth::user()->attending->count()}}</span>
                    </a>
                    <a href="{{ URL::to('/pending')}}" class="list-group-item list-group-item-action d-flex align-items-center @if(\Request::path()=='pending') active @endif">
                      <span class="icon mr-3">
                        <i class="fe fe-chevron-right"></i></span>
                        <small><b>IN SOSPESO</b></small>
                        <span class="ml-auto tag">{{\Auth::user()->pending->count()}}</span>
                    </a>
                  </div>

                </div>
              </div>
              <div class="col-md-9">

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><b>
                      @if(\Request::path()=='events')
                        Prossimi Eventi
                      @elseif(\Request::path()=='my-events')
                        I Miei Eventi
                      @elseif(\Request::path()=='attending')
                        Eventi a cui Partecipo
                      @elseif(\Request::path()=='pending')
                        In Sospeso
                      @endif
                    </b></h3>
                  </div>
                  <div class="list-group list-group-flush">
                @if($events->count()==0)
                  <li class="list-group-item">
                    <small class="text-muted">
                      Non ci sono eventi per te
                    </small>
                  </li>
                @endif
                @foreach ($events->sortBy('date') as $event)

                  @php
                    if(\Request::path()=='attending' OR \Request::path()=='pending'){
                      $event = $event->event;
                    }
                  @endphp

                    <div class="offset-md-10">
                      <a href="{{url('events')}}/{{$event->id}}/delete" style="position: relative;top: -40px;border: none !important;"><i class="fe fe-trash"></i> Delete Eventi</a>
                    </div>

                    <a href="{{ URL::to('/events/')}}/{{$event->id}}" class="list-group-item list-group-item-action">
                      <div class="d-flex justify-content-start">
                        <div style="background:#d5dde5;border:none" class="card mb-0 col-sm-4 col-md-4 col-lg-3 col-xl-2 d-none d-sm-flex mr-4">
                          <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="text-muted">{{ \Carbon\Carbon::parse($event->date)->format('D') }}</div>
                            <div class="h1 m-0">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</div>
                            <div class="text-muted">{{ \Carbon\Carbon::parse($event->date)->format('M y') }}</div>
                          </div>
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-9 col-xl-10 col-xs-12 flex-column">
                          <div class="d-flex justify-content-between">
                            <h3 class="card-title mb-1">{{$event->title}}</h3>
                            
                          </div>
                          <div class="text-muted"><i class="fe fe-clock"></i>   {{ \Carbon\Carbon::parse($event->time_start)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->time_end)->format('H:i') }}
                          &nbsp;  • &nbsp;{{ $event->cost }}€ Ogni Ora</div>
                          <div class="text-muted d-sm-none d-flex"><i class="fe fe-calendar"></i> &nbsp;  {{ \Carbon\Carbon::parse($event->date)->format('D, d M y') }}</div>
                          <div class="text-muted"><i class="fe fe-map-pin"></i>  {{$event->local}}</div>
                          <div class=" d-flex justify-content-start mt-3">
                            <div class="d-flex flex-column align-items-center">
                              <span class="avatar avatar-green">{{$event->attending->count() + $event->num_members_confirmed}}</span>
                              <small style="font-size:10px" class="text-muted"><b>STEWARD ACCETTATI</b></small>
                            </div>
                            <div class="d-flex flex-column align-items-center ml-3">
                              <span class="avatar avatar-gray">{{$event->num_members  - ($event->attending->count() + $event->num_members_confirmed) }}</span>
                              <small style="font-size:10px" class="text-muted"><b>POSTI RIMASTI</b></small>
                            </div>
                            @if($event->user->id == \Auth::user()->id)
                              <div class="d-flex align-items-center ml-5">
                                <span class="status-icon bg-secondary"></span>
                                <small class="text-muted"><b>Il tuo evento</b></small>
                              </div>
                            @endif
                            @if($event->members->where('user_id',\Auth::user()->id)->first())
                              @if($event->members->where('user_id',\Auth::user()->id)->first()->state==0)
                                <div class="d-flex align-items-center ml-5">
                                  <span class="status-icon bg-info"></span>
                                  <small class="text-muted"><b>In Sospeso</b></small>
                                </div>
                              @elseif($event->members->where('user_id',\Auth::user()->id)->first()->state==1)
                                <div class="d-flex align-items-center ml-5">
                                  <span class="status-icon bg-success"></span>
                                  <small class="text-muted"><b>Stai partecipando</b></small>
                                </div>
                              @elseif($event->members->where('user_id',\Auth::user()->id)->first()->state==2)
                                <div class="d-flex align-items-center ml-5">
                                  <span class="status-icon bg-danger"></span>
                                  <small class="text-muted"><b>Rifiutato</b></small>
                                </div>
                              @endif
                            @endif
                          </div>
                        </div>
                      </div>
                    </a>
                @endforeach
              </div>

            </div>


        {{ $events->links() }}


              </div>
            </div>


  </div>


@endsection
