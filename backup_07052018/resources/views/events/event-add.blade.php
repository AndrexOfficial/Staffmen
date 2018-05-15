@extends('main')

{{--Disabled csrf for some routes--}}

@section('content')
    <form action="{{route('event-save')}}" method="post" id="locationForm">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Aggiungi Nuovo Evento</h3>
                    </div>
                    <div class="panel-body">

                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Titolo evento:</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Inserisci Nome">
                            <span class="error">{{$errors->first('title')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Indirizzo:</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   placeholder="Inserisci Indirizzo Evento">
                            <span class="error">{{$errors->first('address')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Data di Inizio:</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                   placeholder="Inserisci Data di Inizio">
                            <span class="error">{{$errors->first('start_date')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Data di Fine:</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                   placeholder="Inserisci Data di Fine">
                            <span class="error">{{$errors->first('end_date')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrizione:</label>
                            <textarea
                                    id="description"
                                    name="description" class="form-control"
                                    placeholder="Inserisci la Descrizione"></textarea>
                            <span class="error">{{$errors->first('description')}}</span>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> Salva
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seleziona la Location</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <span class="error">{{$errors->first('lat')}}</span>
                            <span class="error">{{$errors->first('long')}}</span>
                            <google-map></google-map>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
        })
    </script>
@endsection
