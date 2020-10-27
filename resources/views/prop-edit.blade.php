@extends('layouts.app')

<style>
    #central{
        margin-top: 200px;
        padding: 10px;
    }
</style>
@section('content')
    <div id="central">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{route('prop.edit.store', $property -> id)}}">
            @csrf
            @method('POST')

            {{-- Nome proprieta --}}
            <div class="form-group">
                <label for="name"> Name </label>
                <input type = "text" name="name" value="{{$property -> name}}">
            </div>

            {{-- Indirizzo --}}
            <div class="form-group">
                <label for="address">Full Address </label>
                <input type = "text" name='full_address' id="address" value="{{$property -> state}}, {{$property -> city}}, {{$property -> address}}">
            </div>

            {{-- Descrizione --}}
            <div class="form-group">
                <label for="description"> Description </label>
                <input type = "textarea" name="description" value="{{$property -> description}}">
            </div>

            
            {{-- M2 --}}
            <div class="form-group">
                <label for="m2"> m2 </label>
                <input type = "number" name="m2" value="{{$property -> m2}}">
            </div>
            
            {{-- Piani --}}
            <div class="form-group">
                <label for="floors"> Floors </label>
                <input type = "number" name="floors" value="{{$property -> floors}}">
            </div>
            
            <div class="form-group">
                <label for="beds"> Beds </label>
                <input type = "number" name="beds" value="{{$property -> beds}}">
            </div>
            
            <div class="form-group">
                <label for="bathrooms">Bathrooms </label>
                <input type = "number" name="bathrooms" value="{{$property -> bathrooms}}">
            </div>

            {{-- NASCOSTI --}}
            {{-- Lat --}}
            <input type = "hidden" name="lat" id="lat" value="{{$property -> lat}}">
            
            {{-- Lng --}}
            <input type = "hidden" name="lng" id="lng" value="{{$property -> lng}}">
            
            {{-- UserID --}}
            <input type = "hidden" name="user_id" value="{{Auth::id()}}">
            
            {{-- State --}}
            <input type="hidden" name="state" id="state" value="{{$property -> state}}">

            {{-- City --}}
            <input type="hidden" name="city" id="city" value="{{$property -> city}}">

            {{-- Address --}}
            <input type="hidden" name="address" id="t_address" value="{{$property -> address}}">

            {{-- ID Property --}}
            <input type="hidden" name="id_property_edit" value="{{$property -> id}}">

            {{-- Servizi --}}
            <div class="form-group">
                
                @foreach ($services as $service)
                    <label for="{{$service -> name}}"> {{$service -> name}}: </label>
                    <input type="checkbox" name="{{$service -> name}}" value="{{$service -> id}}">
                @endforeach
            </div>

            <button type="submit" class="btn btn-danger"> Edit </button>

        </form>
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