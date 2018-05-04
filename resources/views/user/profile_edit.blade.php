@extends('layouts.app')

@section('content')

  <div class="container">


      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><b>Modifica Profilo</b></h3>
        </div>
        <div class="card-body">

          <form id="form" class="mt-4" method="post" action="{{url('/profile/edit')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="d-flex justify-content-start align-items-center">
              <span class="avatar avatar-xxl mr-4" style="background-image: url({{\Auth::user()->photo}})"></span>
              <div class="form-group">
                  <label for="exampleFormControlFile1">Foto del Profilo</label>
                  <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>

            <div class="form-group mt-4">
              <label class="form-label">Nome e Cognome *</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{\Auth::user()->name}}" aria-describedby="emailHelp" placeholder="Inserisci il tuo nome" required>
            </div>

            <div class="form-group">
              <label class="form-label">Indirizzo di residenza</label>
              <input id="pac-input" name="location" class="controls" type="text" value="{{\Auth::user()->location}}" placeholder="Inserisci indirizzo di residenza" >
              <div id="map"></div>

            </div>

            <div class="form-group">
             <label class="form-label">Eventi a cui hai partecipato</label>
             <select name="jobs[]" multiple class="form-control">
               @foreach (\App\Job::all() as $job)
                 <option value="{{$job->id}}">{{$job->name}}</option>
               @endforeach
             </select>
           </div>

           <div class="form-group mt-4">
              <label class="form-label">Età </label>
              <input type="text" name="age" class="form-control" value="{{\Auth::user()->age}}" placeholder="Inserisci età" >
          </div>
          <div class="form-group mt-4">
              <label class="form-label">Numero di telefono </label>
              <input type="text" name="phone" class="form-control" value="{{\Auth::user()->phone_number}}" placeholder="Inserisci numero di telefono">
          </div>
          <div class="form-group mt-4">
              <label class="form-label">Sesso </label>
              <select name="sex" class="form-control">
                 <option value="1" {{\Auth::user()->sex == 1 ? 'selected' : ''}} >Maschio</option>
                 <option value="2" {{\Auth::user()->sex == 2 ? 'selected' : ''}} >Femmina</option>
             </select>
             <div class="form-group mt-4">
              <label class="form-label">Descrivi te stesso </label>
              <input type="text" name="descr" class="form-control" value="{{\Auth::user()->descr}}" placeholder="Racconta te stesso in poche righe" >
          </div>
          </div>
          <div class="form-group mt-4">
              <label class="form-label">Lavori Precedenti </label>
              <input type="text" name="job" class="form-control" value="{{\Auth::user()->prev_job}}" placeholder="Inserisci esperienze lavorative passate">
          </div>
          @if(\Auth::user()->resume!='')
            <!-- <div class="form-group mt-4">
                <label class="form-label"><a href="{{url('/')}}{{\Auth::user()->resume}}">Download here</a></label>
            </div> -->
            <div class="form-group mt-4">
                <label class="form-label">Carica Curriculum </label>
                <input type="file" name="cv">
                <a href="{{url('/')}}{{\Auth::user()->resume}}" target="_blank">Scarica Curriculum</a>
            </div>
          @else
            <div class="form-group mt-4">
                <label class="form-label">Carica Curriculum </label>
                <input type="file" name="cv">
            </div>
          @endif
          

        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
              <a href="{{ URL::to('/profile')}}" class="btn btn-link">Cancella</a>
              <button type="submit" class="btn btn-primary ml-auto">Salva Profilo</button>
            </div>
          </div>
        </form>
      </div>



      <style>

          #map {
            height: 400px;
          }

          .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
          }

          #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
          }

          #pac-input:focus {
            border-color: #4d90fe;
          }

          .pac-container {
            font-family: Roboto;
          }

          #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
          }

          #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
          }
        </style>

        <script>

        $(document).ready(function () {
          $('#form').on('keyup keypress', function(e) {
              var keyCode = e.keyCode || e.which;
              if (keyCode === 13) {
              e.preventDefault();
              return false;
              }
            });
        });

        </script>

        <script>

          function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 45.464211, lng: 9.191383},
              zoom: 13
            });
            var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input'));

            var types = document.getElementById('type-selector');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
              }));
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
              }

              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
              infowindow.open(map, marker);
            });

            // Sets a listener on a radio button to change the filter type on Places
            // Autocomplete.
            function setupClickListener(id, types) {
              var radioButton = document.getElementById(id);
              radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
              });
            }

            setupClickListener('changetype-all', []);
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD22LYxp8jsIshXVBidtMaBg76tdfcVovM&libraries=places&callback=initMap"
            async defer></script>
            <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('descr', {
        })
    </script>


  </div>

@endsection
