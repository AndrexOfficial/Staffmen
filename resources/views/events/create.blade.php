@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Crea Nuovo Evento</h3>
      </div>
      <form method="post" action="{{url('/events/new')}}">
        {{ csrf_field() }}
      <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

          <div class="form-group">
              <label class="form-label">Evento *</label>
              <div class="selectgroup selectgroup-pills">
                @foreach ($jobs as $job)
                  <label class="selectgroup-item">
                    <input type="radio" name="job" value="{{$job->id}}" class="selectgroup-input">
                    <span class="selectgroup-button">{{$job->name}}</span>
                  </label>
                @endforeach
              </div>
            </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label">Numero di posti totali *</label>
                <input name="members_total" type="number" class="form-control" placeholder="10" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label">Numeri di posti già occupati *</label>
                <input name="members_confirmed" type="number" class="form-control" placeholder="6" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>
            </div>
            <div class="col-md-4">

              <div class="form-group">
                <label class="form-label">Prezzo/h *</label>
                <input type="text" name="cost" class="form-control" placeholder="0.00" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>

            </div>

          </div>

<div class="d-flex justify-content-start align-items-center">
<span class="avatar avatar-xxl mr-4" style="background-image: url({{\Auth::user()->event_photo}})"></span>
<div class="form-group">
<label for="exampleFormControlFile1">Cover Evento</label>
<input type="file" name="event_photo" class="form-control-file" id="exampleFormControlFile1">
</div>
</div>
          <label class="form-label">Location Evento *</label>
          <input id="pac-input" class="controls" name="local" type="text" placeholder="Inserisci indirizzo della Location" required>
          <div id="map" class="mb-4"></div>

          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label">Data Evento *</label>
                <input type="date" name="date" class="form-control" data-inputmask-alias="date" data-inputmask-inputformat="dd/mm/yyyy" placeholder="dd/mm/yyyy" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>
          </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label">Ora di Inizio *</label>
                <input type="text" name="time_start" class="form-control" data-inputmask-alias="hh:mm" data-inputmask-inputformat="hh:mm" placeholder="hh:mm" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="form-label">Ora di Fine *</label>
                <input type="text" name="time_end" class="form-control" data-inputmask-alias="hh:mm" data-inputmask-inputformat="hh:mm" placeholder="hh:mm" required>
                {{-- <small class="form-text text-muted">Non condividiamo la tua email con altri.</small> --}}
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Titolo o Nome Evento </label>
            <input type="text" class="form-control" name="title" placeholder="Titolo" >
          </div>

          <div class="form-group">
            <label class="form-label">Descrizione</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
          </div>

          @if(\Auth::user()->role==1)
          <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status">
              <option value="1">Active</option>
              <option value="2">In Active</option>
            </select>
          </div>
          @endif
      </div>
      <div class="card-footer text-right">
          <div class="d-flex">
            <a href="{{ URL::to('/events')}}" class="btn btn-link">Cancella</a>
            <button type="submit" class="btn btn-primary ml-auto">Pubblica Ora</button>
          </div>
        </div>
        </form>
    </div>




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

      $(document).ready(function(){
        $(":input").inputmask();
      });

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 45.477270, lng: 9.170023},
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
            window.alert("Nessun dettaglio disponibile nell'input: '" + place.name + "'");
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
        CKEDITOR.replace('description', {
        })
    </script>

@endsection
