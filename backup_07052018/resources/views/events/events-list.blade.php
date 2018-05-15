@extends('main')
<style>
    .panel-danger > .panel-heading{
        background-color:#4EC96D !important;
        border-color:#4EC96D !important;
    }
    .panel-danger{
        border-color:#ccc !important;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Eventi in Programma</h1>
            <a href="{{ route('event-add') }}" class="btn btn-success">Aggiungi Nuovo Evento</a>

            @foreach($upcomingEvents as $event)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-heading">
                            <a href="{{ route('event-view', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        <small>{{ $event->address }}</small>
                    </div>
                    <div class="panel-body">
                        <div class="">
                            <strong>Start date: </strong>{{$event->start_date}}
                            <br>
                            <strong>End date: </strong>{{$event->end_date}}
                            <br>
                            {{--<strong>Created by: </strong><a href="#">{{$event->creator->name}}</a>--}}
                        </div>
                        <div class="">
                            <p>{{$event->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Eventi in Corso</h1>

            @if(count($ongoingEvents) == 0)
                <h1>Nessun evento in corso</h1>
            @else
                @foreach($ongoingEvents as $event)
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a>
                            </h3>
                            <small>{{ $event->address }}</small>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <strong>Start date: </strong>{{$event->start_date}}
                                <br>
                                <strong>End date: </strong>{{$event->end_date}}
                                <br>
                                {{--<strong>Created by: </strong><a href="#">{{$event->creator->name}}</a>--}}
                            </div>
                            <div class="">
                                <p>{!! $event->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Eventi Passati</h1>

            @if(count($pastEvents) == 0)
                <h1>Nessun evento passato</h1>
            @else
                @foreach($pastEvents as $event)
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-heading">
                                <a href="{{ route('event-view', $event->id) }}">{{ $event->title }}</a>
                            </h3>
                            <small>{{ $event->address }}</small>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <strong>Start date: </strong>{{$event->start_date}}
                                <br>
                                <strong>End date: </strong>{{$event->end_date}}
                                <br>
                                {{--<strong>Created by: </strong><a href="#">{{$event->creator->name}}</a>--}}
                            </div>
                            <div class="">
                                <p>{!! $event->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop
