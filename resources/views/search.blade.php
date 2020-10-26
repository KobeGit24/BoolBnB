@extends('layouts.app')
@section('content')

  <div style="margin-top: 200px;" class="d-flex flex-row">
    <form class="container" action="{{ route('search')}}">
      @csrf
      @method('GET')
      <div class="form-group d-flex flex-row align-items-center">
        <div class="aa-input-container" id="aa-input-container">
          <input  type="search" id="aa-search-input"
                  class="aa-input-search"
                  placeholder="Search for players or teams..."
                  name="search"
                  value="{{ $requestInput['search'] }}"
                  autocomplete="off" />
          <input  id="lat"
                  type="hidden"
                  name="lat"
                  value="{{ $requestInput['lat'] }}"
                  class="form-control">
          <input  id="lng"
                  type="hidden"
                  name="lng"
                  value="{{ $requestInput['lng'] }}"
                  class="form-control">
        </div>
        <div class="search-button">
          {{-- <button type="submit" class="btn btn-primary">
            CERCA
          </button> --}}
        </div>
      </div>
    </form>
  </div>

  <div style="margin-top: 100px;" class="d-flex flex-row bg-light">

    <ul id="property-wall" class="list-group list-group-horizontal">

    </ul>

  </div>

  {{-- SEZIONE JS --}}

  <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

  <script>

  (function() {
      var placesAutocomplete = places({
        appId: 'pl6JIIW6OD7S',
        apiKey: '7748a0e1bed4673c3861620b3abcc682',
        container: document.querySelector('#aa-search-input'),
      });
      var address = document.querySelector('#aa-search-input');
        placesAutocomplete.on('change', function(e) {
          document.querySelector("#aa-search-input").value = e.suggestion.value || "";
          document.querySelector("#lat").value = e.suggestion.latlng.lat || "";
          document.querySelector("#lng").value = e.suggestion.latlng.lng || "";
        });
        placesAutocomplete.on('clear', function() {
          address.textContent = 'none';
        });
    })();

  </script>

  <script id="property-template" type="text/x-handlebars-template">
    <div class="card my-3" style="width: 18rem;">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title text-center">@{{ name }}</h5>
        <p class="card-text">@{{ description }}</p>
        <p class="card-text">@{{ address }}</p>
        <a href="/property/@{{ id }}" class="btn btn-primary align-self-center">SCEGLI</a>
      </div>
    </div>
  </script>

  <script>

  $(document).ready(function() {
    $("input").change(function(){
      searchProperties();
    });
  });

  function degreesToRadians(degrees) {
    return degrees * Math.PI / 180;
  }

  function getDistance(lat1, lon1, lat2, lon2) {
    var earthRadiusKm = 6371;

    var dLat = degreesToRadians(lat2-lat1);
    var dLon = degreesToRadians(lon2-lon1);

    lat1 = degreesToRadians(lat1);
    lat2 = degreesToRadians(lat2);

    var a =   Math.sin(dLat/2) * Math.sin(dLat/2) + Math.sin(dLon/2)
              * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);

    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

    return Math.ceil(earthRadiusKm * c);
  }

  function searchProperties() {

    var latInput = $('#lat').val();
    var lngInput = $('#lng').val();

    // console.log(lat);
    // console.log(lng);

    $.ajax({

      url: 'http://127.0.0.1:8000/api/reseach',
      method: 'GET',
      data: {
        lat: latInput,
        lng: lngInput
      },
      success: function (properties) {

        var target = $('#property-wall');
        target.html('');

        var template = $('#property-template').html();
        var compiled = Handlebars.compile(template);

        for (var i = 0; i < properties.length; i++) {

          var property = properties[i];

          var latProp = property.lat;
          var lngProp = property.lng;

          var validDistance = getDistance(latInput,lngInput,latProp,lngProp) <= 20;

          var propertyHTML = compiled(property);

          if (validDistance) {

            target.append(propertyHTML);
          }
        }


      },
      error: function (err) {

        console.log('error: ', err);
      }
    });
  }

  </script>

@endsection
