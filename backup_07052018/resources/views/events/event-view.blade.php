@extends('main')

@section('stylesheets')
    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        .panel-danger > .panel-heading{
            background-color:#4EC96D;
            border-color:#4EC96D;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{$event->title}}</h3>
                </div>
                <div class="panel-body content">
                    <p><strong>Descrizione:</strong></p>
                    {!! $event->description !!}
                </div>

                <div id="map"></div>

                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                    <tr>
                        <td><strong>Data di inizio:</strong></td>
                        <td>{{$event->start_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Data di fine:</strong></td>
                        <td>{{$event->end_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Indirizzo:</strong></td>
                        <td>{{$event->address}}</td>
                    </tr>
                    <tr>
                        <td><strong>Organizzato da:</strong></td>
                        <td><a href="#">{{$event->creator->name}}</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initMap() {
            var uluru = {lat: {{$event->lat}}, lng: {{$event->long}} };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: uluru,
                styles: [
                    {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                    {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                    {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                    {
                        featureType: 'administrative.locality',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#d59563'}]
                    },
                    {
                        featureType: 'poi',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#d59563'}]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'geometry',
                        stylers: [{color: '#263c3f'}]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#6b9a76'}]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry',
                        stylers: [{color: '#38414e'}]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#212a37'}]
                    },
                    {
                        featureType: 'road',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#9ca5b3'}]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry',
                        stylers: [{color: '#746855'}]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#1f2835'}]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#f3d19c'}]
                    },
                    {
                        featureType: 'transit',
                        elementType: 'geometry',
                        stylers: [{color: '#2f3948'}]
                    },
                    {
                        featureType: 'transit.station',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#d59563'}]
                    },
                    {
                        featureType: 'water',
                        elementType: 'geometry',
                        stylers: [{color: '#17263c'}]
                    },
                    {
                        featureType: 'water',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#515c6d'}]
                    },
                    {
                        featureType: 'water',
                        elementType: 'labels.text.stroke',
                        stylers: [{color: '#17263c'}]
                    }
                ]
            });
            let marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap">
    </script>
@endsection
