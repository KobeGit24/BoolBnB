@extends('layouts.app')

@section('content')
  <div class="card-width mt-4">
    <div class="card card-shadow">
      <div class="card-header input-title-text text-center">{{ __('Aggiungi una proprietà') }}</div>
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

        <form method="post" action="{{route('prop.store')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Nome proprieta --}}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right input-text"> {{ __('Name') }} </label>
                <div class="col-md-6">

                  <input class="form-control" type = "text" name="name" required autocomplete="name" autofocus>
                </div>
            </div>

            {{-- Indirizzo --}}
            <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right input-text">{{ __('Full Address') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "text" name='full_address' id="address" required autocomplete="full_address" autofocus>
                </div>
            </div>

            {{-- Descrizione --}}
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right input-text" for="description">{{ __('Description') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "textarea" name="description" required autocomplete="description" autofocus>
                </div>
            </div>


            {{-- M2 --}}
            <div class="form-group row">
                <label for="m2" class="col-md-4 col-form-label text-md-right input-text">{{ __('m2') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "number" name="m2" required autocomplete="m2" autofocus>
                </div>
            </div>

            {{-- Piani --}}
            <div class="form-group row">
                <label for="floors" class="col-md-4 col-form-label text-md-right input-text">{{ __('Floors') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "number" name="floors" required autocomplete="floors" autofocus>
                </div>
            </div>

            {{-- Beds --}}
            <div class="form-group row">
                <label for="beds" class="col-md-4 col-form-label text-md-right input-text">{{ __('Beds') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "number" name="beds" required autocomplete="beds" autofocus>
                </div>
            </div>

            {{-- Bathrooms --}}
            <div class="form-group row">
                <label for="bathrooms" class="col-md-4 col-form-label text-md-right input-text">{{ __('Bathrooms') }}</label>
                <div class="col-md-6">

                  <input class="form-control" type = "number" name="bathrooms" required autocomplete="bathrooms" autofocus>
                </div>
            </div>

            {{-- Property Img --}}
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right input-text">{{ __('Property Image') }}</label>
                <div class="col-md-6">

                  <input type="file" name="image">
                </div>
            </div>

            {{-- NASCOSTI --}}
            {{-- Lat --}}
            <input type = "hidden" name="lat" id="lat">

            {{-- Lng --}}
            <input type = "hidden" name="lng" id="lng">

            {{-- UserID --}}
            <input type = "hidden" name="user_id" value="{{Auth::id()}}">

            {{-- State --}}
            <input type="hidden" name="state" id="state">

            {{-- City --}}
            <input type="hidden" name="city" id="city">

            {{-- Address --}}
            <input type="hidden" name="address" id="t_address">

            {{-- Servizi --}}
            <div class="form-group d-flex flex-xl-row flex-lg-row flex-md-row flex-sm-column justify-content-sm-start justify-content-md-around align-items-center service-property">

                @foreach ($services as $service)
                    <label for="{{$service -> name}}"> {{$service -> name}}: </label>
                    <input type="checkbox" name="{{$service -> name}}" value="{{$service -> id}}">
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-success align-self-center p-3 btn-card"> Crea</button>
            </div>
        </form>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script>
        (function() {
        var placesAutocomplete = places({
            appId: 'pl6JIIW6OD7S',
            apiKey: '7748a0e1bed4673c3861620b3abcc682',
            container: document.querySelector('#address')
        });

        placesAutocomplete.on('change', function(e) {

            // console.log(e.suggestion);
            // console.log(e.suggestion.latlng.lng);
            // console.log(e.suggestion.latlng.lat);

            $('#address').val(e.suggestion.value);
            $('#lat').val(e.suggestion.latlng.lat);
            $('#lng').val(e.suggestion.latlng.lng);
            $('#state').val(e.suggestion.country);
            $('#city').val(e.suggestion.city);
            $('#t_address').val(e.suggestion.name);

            // console.log("latitudine: ", $('#lat').val());
            // console.log("longitudine: ", $('#lng').val());
        });

        placesAutocomplete.on('clear', function() {
            $('#address').val('');
            $('#lat').val('');
            $('#lng').val('');
            $('#state').val('');
            $('#city').val('');
            $('#t_address').val('');
        });
        })();
    </script>
@endsection
