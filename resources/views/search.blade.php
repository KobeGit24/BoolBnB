@extends('layouts.app')
@section('content')

  <div style="margin-top: 200px;" class="d-flex flex-row">
    <form class="container" action="" method="post" enctype="multipart/form-data">
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
        {{-- SEZIONE FILTRI --}}
        <ul id="filters" style="margin-left: 100px;"  class="list-group list-group">
          <h4>Filtri di ricerca</h4>
          <!-- Filtro Distanza -->
          <li class="list-group-item">
            <label for="radius">Distanza:</label>
            <select id="radius" class="" name="radius">
              <option value="20">20km</option>
              <option value="30">30km</option>
              <option value="40">40km</option>
            </select>
          </li>
          <!-- Filtro Stanze -->
          <li class="list-group-item">
            <label for="floors"> Floors: </label>
            <input id="floors" min="1" max="10" type="number" name="floors" value="">
          </li>
          <!-- Filtro Letti -->
          <li class="list-group-item">
            <label for="beds"> Beds: </label>
            <input id="beds" min="1" max="10" type="number" name="beds" value="">
          </li class="list-group-item">
          <!-- Filtro Wi-fi -->
          <li class="list-group-item">
            <label for="wifi">Wi-fi</label>
            <input id="wifi" type="checkbox" name="wifi" value="">
          </li>
          <!-- Filtro Parking -->
          <li class="list-group-item">
            <label for="parking">Parking</label>
            <input id="parking" type="checkbox" name="parking" value="">
          </li>
          <!-- Filtro Sauna -->
          <li class="list-group-item">
            <label for="sauna">Sauna</label>
            <input id="sauna" type="checkbox" name="sauna" value="">
          </li>
          <!-- Filtro Pool -->
          <li class="list-group-item">
            <label for="pool">Pool</label>
            <input id="pool" type="checkbox" name="pool" value="">
          </li>
          <!-- Filtro Concierge -->
          <li class="list-group-item">
            <label for="concierge">Concierge</label>
            <input id="concierge" type="checkbox" name="concierge" value="">
          </li>
          <!-- Filtro Sea View -->
          <li class="list-group-item">
            <label for="seaView">Sea View</label>
            <input id="seaView" type="checkbox" name="seaView" value="">
          </li>
        </ul>
        {{-- FINE SEZIONE FILTRI  --}}
      </div>
      <button type="submit" class="btn btn-primary">CERCA</button>
    </form>
  </div>

  <div style="margin-top: 100px;" class="d-flex flex-row bg-light">

    <ul id="property-wall-promo" class="list-group list-group-horizontal bg-danger">

    </ul>

    <ul id="property-wall" class="list-group list-group-horizontal bg-success">

    </ul>

  </div>


  {{-- SEZIONE JS --}}


  <script id="property-template" type="text/x-handlebars-template">
    <div class="card my-3" style="width: 18rem;">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title text-center">@{{ name }}</h5>
        <p class="card-text">@{{ description }}</p>
        <p class="card-text">@{{ address }}</p>
        <p class="card-text">Metri Quadri: @{{ m2 }}</p>
        <p class="card-text">Piani: @{{ floors }}</p>
        <p class="card-text">Bagni: @{{ bathrooms }}</p>
        <p class="card-text">Letti: @{{ beds }}</p>
        <a href="/property/@{{ id }}" class="btn btn-primary align-self-center">SCEGLI</a>
      </div>
    </div>
  </script>










  <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

  <script>

    (function() {
    var placesAutocomplete = places({
      appId: 'pl6JIIW6OD7S',
      apiKey: '7748a0e1bed4673c3861620b3abcc682',
      container: document.querySelector('#aa-search-input')
    });

    placesAutocomplete.on('change', function(e) {

      // console.log(e.suggestion);
      // console.log(e.suggestion.latlng.lng);
      // console.log(e.suggestion.latlng.lat);

      $('#aa-search-input').val(e.suggestion.value);
      $('#lat').val(e.suggestion.latlng.lat);
      $('#lng').val(e.suggestion.latlng.lng);

      // console.log("latitudine: ", $('#lat').val());
      // console.log("longitudine: ", $('#lng').val());
    });

    placesAutocomplete.on('clear', function() {
      $('#aa-search-input').val('');
      $('#lat').val('');
      $('#lng').val('');
    });
    })();

  </script>

  <script>

  $(document).ready(function() {
    $( "form" ).on( "submit", false );
    $("input").change(function(){
      searchProperties();
    });
    $( "#radius" ).change(function() {
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
    var rad = $( "select#radius option:checked" ).val();
    var floors = $('#floors').val();
    var beds = $('#beds').val();
    var wifi = $('#wifi').is(":checked") ? wifi = 'checked' : wifi = 'unchecked';
    var parking = $('#parking').is(":checked") ? parking = 'checked' : parking = 'unchecked';
    var pool = $('#pool').is(":checked") ? pool = 'checked' : pool = 'unchecked';
    var sauna = $('#sauna').is(":checked") ? sauna = 'checked' : sauna = 'unchecked';
    var seaView = $('#seaView').is(":checked") ? seaView = 'checked' : seaView = 'unchecked';
    var concierge = $('#concierge').is(":checked") ? concierge = 'checked' : seaView = 'unchecked';
    var sponsors;

    // console.log(lat);
    // console.log(lng);
    // console.log(rad);

    $.ajax({

      url: '/api/search',
      method: 'GET',
      data: {
        floors : floors,
        beds : beds,
        wifi : wifi,
        parking : parking,
        pool : pool,
        sauna : sauna,
        seaView : seaView,
        concierge : concierge
      },
      success: function (properties) {

        var sponsoredProperties = properties.sponsored;
        var normalProperties = properties.normal;

        var sponsorNum = [];

        var targetPromo = $('#property-wall-promo');
        targetPromo.html('');
        var templatePromo = $('#property-template').html();
        var compiled = Handlebars.compile(templatePromo);


        var target = $('#property-wall');
        target.html('');
        var template = $('#property-template').html();
        var compiled = Handlebars.compile(template);

        for (var i = 0; i < sponsoredProperties.length; i++) {

          var sponsoredProp = sponsoredProperties[i];
          var sponsoredPropId = sponsoredProp.id;

          sponsorNum.push(sponsoredPropId);

        }

        for (var i = 0; i < normalProperties.length; i++) {

          var normalProp = normalProperties[i];
          var normalPropId = normalProp.id;
          var latProp = normalProp.lat;
          var lngProp = normalProp.lng;

          var validDistance = getDistance(latInput,lngInput,latProp,lngProp) <= rad;
          var propertyHTML = compiled(normalProp);

          if (validDistance) {
            if (sponsorNum.includes(normalPropId)) {

              targetPromo.append(propertyHTML);

            } else {
              target.append(propertyHTML);
            }

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
