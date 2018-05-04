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
        <h3 class="card-title"><b>Invita Utenti</b></h3>
      </div>

    <div class="list-group list-group-flush">
      @if($members->count()==0)
        <li class="list-group-item">
          <small class="text-muted">
            Nessun utente disponibile adesso
          </small>
        </li>
      @endif
    @foreach ($members as $member)

          <div class="list-group-item">

            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex flex-column">
                <div class="d-flex align-items-center mt-auto">
                  <div class="avatar avatar-md mr-3" style="background-image: url({{$member->photo}})"></div>
                  <div>
                    <a href="{{ URL::to('/member/')}}/{{$member->id}}" class="text-default"><b>{{$member->name}}</b></a>
                    <small class="d-block text-muted">{{$member->location}}</small>
                    <div class="mt-1">
                        @foreach ($member->jobs as $job)
                          <span class="tag">{{$job->name}}</span>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <a href="{{ URL::to('/events/')}}/{{$event->id}}/invite/{{$member->id}}" class="btn btn-primary">Invita</a>
            </div>
          </div>

    @endforeach
    </div>

    {{ $members->links() }}

  </div>


@endsection
