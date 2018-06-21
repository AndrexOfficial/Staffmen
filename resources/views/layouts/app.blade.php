<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StaffMen') }}</title>

    <link href="{{ asset('/css/dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-core-style.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/5724838085.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/jquery.inputmask.bundle.js')}}"></script>
    <link href="{{ asset('/public/css/datepicker.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/public/js/datepicker.js')}}"></script>
    <script src="{{ asset('/public/js/datepicker.en.js')}}"></script>
</head>
<body>
    <div id="app">

    <div class="header py-4" style="background: rgba(247, 250, 255, 0.6);border: 0.0px;">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="{{ URL::to('/events')}}">
                <img src="{{ asset('/images/StaffLogoSmallB.png')}}" class="img-fluid" alt="logo">
                <span>StaffMen</span>
                 <sup><small class="text-muted"></small></sup>
              </a>

              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    @if(\Auth::user()->unreadNotifications->count()>0)
                      <span class="nav-unread"></span>
                    @endif
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    @if(\Auth::user()->unreadNotifications->count()==0)
                      <span class="dropdown-item d-flex">
                        <div>
                          <div class="small text-muted">Nessuna Notifica</div>
                        </div>
                      </span>
                    @endif
                    @foreach (\Auth::user()->unreadNotifications as $notification)
                      @if($notification->type == 'App\Notifications\Join')
                        <a href="{{ URL::to('/events/')}}/{{\App\Event::find($notification->data['event_id'])->id}}" class="dropdown-item d-flex">
                          <span class="avatar mr-3 align-self-center" style="background-image: url({{\App\User::find($notification->data['user_id'])->photo}})"></span>
                          <div>
                            <strong>{{\App\User::find($notification->data['user_id'])->name}}</strong> ti ha inviato una richiesta di partecipazione all'evento.
                            <div class="small text-muted">{{\Carbon\Carbon::parse($notification->created_at)->diffforhumans()}}</div>
                          </div>
                        </a>
                      @elseif($notification->type == 'App\Notifications\Invite')
                        <a href="{{ URL::to('/invites')}}" class="dropdown-item d-flex">
                          <span class="avatar mr-3 align-self-center" style="background-image: url({{\App\User::find($notification->data['user_id'])->photo}})"></span>
                          <div>
                            <strong>{{\App\User::find($notification->data['user_id'])->name}}</strong> ti ha invitato a partecipare all'evento
                            <div class="small text-muted">{{\Carbon\Carbon::parse($notification->created_at)->diffforhumans()}}</div>
                          </div>
                        </a>
                      @elseif($notification->type == 'App\Notifications\Accepted')
                        <a href="{{ URL::to('/events/')}}/{{\App\Event::find($notification->data['event_id'])->id}}" class="dropdown-item d-flex">
                          <span class="avatar mr-3 align-self-center" style="background-image: url({{\App\Event::find($notification->data['event_id'])->user->photo}})"></span>
                          <div>
                            <strong>{{\App\Event::find($notification->data['event_id'])->user->name}}</strong> ha accettato la tua richiesta di partecipazione all'evento
                            <div class="small text-muted">{{\Carbon\Carbon::parse($notification->created_at)->diffforhumans()}}</div>
                          </div>
                        </a>
                      @elseif($notification->type == 'App\Notifications\Rejected')
                        <a href="{{ URL::to('/events/')}}/{{\App\Event::find($notification->data['event_id'])->id}}" class="dropdown-item d-flex">
                          <span class="avatar mr-3 align-self-center" style="background-image: url({{\App\Event::find($notification->data['event_id'])->user->photo}})"></span>
                          <div>
                            <strong>{{\App\Event::find($notification->data['event_id'])->user->name}}</strong> ha rifiutato la tua richiesta di partecipazione all'evento
                            <div class="small text-muted">{{\Carbon\Carbon::parse($notification->created_at)->diffforhumans()}}</div>
                          </div>
                        </a>
                      @endif
                    @endforeach
                    @if(\Auth::user()->unreadNotifications->count()>0)
                    <div class="dropdown-divider"></div>
                    <a href="{{ URL::to('/markallasread')}}" class="dropdown-item text-center text-muted-dark">Marca tutte come già lette</a>
                    @endif
                  </div>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{asset(\Auth::user()->photo)}})"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{ Auth::user()->name }}</span>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ URL::to('/profile')}}">
                      <i class="dropdown-icon fe fe-user"></i> Profilo
                    </a>
                    <a onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class="dropdown-item" href="{{ route('logout') }}">
                      <i class="dropdown-icon fe fe-log-out"></i> Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="header d-flex p-0 border-0" style="background: rgba(247, 250, 255, 0.6);border: 0.0px;">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0  flex-row">
                  <li class="nav-item main-menu">
                    <a href="{{ URL::to('./')}}" class="nav-link">
                      <i class="fe fe-home"></i>
                      Home &nbsp;
                    </a>
                  </li>
                  <li class="nav-item main-menu">
                    <a href="{{ URL::to('/events')}}" class="nav-link active">
                      <i class="fe fe-grid"></i>
                      Eventi &nbsp;
                    </a>
                  </li>
                  <li class="nav-item main-menu">
                    <a href="{{ URL::to('/requests')}}" class="nav-link">
                      <i class="fe fe-arrow-up"></i>
                      Richieste &nbsp;
                      <span class="tag tag-rounded">{{\Auth::user()->requests->count()}}</span>
                    </a>
                  </li>
                  <li class="nav-item main-menu">
                    <a href="{{ URL::to('/invites')}}" class="nav-link">
                      <i class="fe fe-arrow-down"></i>
                      Inviti &nbsp;
                      <span class="tag tag-rounded">{{\Auth::user()->invites->count()}}</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        


    <div class="mt-5"></div>

        @yield('content')
    </div>


</body>
</html>
