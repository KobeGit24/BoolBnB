@extends('layouts.app')
@section('content')

  <div class="search-content d-flex flex-column flex-lg-row justify-content-between">
    <form class="form-search-container d-flex flex-column justify-content-start" action="" method="post" enctype="multipart/form-data">
      <div class="aa-input-container d-flex justify-content-between" id="aa-input-container">
        <input  type="search" id="aa-search-input"
        class="aa-input-search"
        placeholder="Dove vorresti andare?"
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

      <button type="submit" class="">CERCA</button>

      {{-- SEZIONE FILTRI --}}
      <h4>Filtri di ricerca:</h4>
      <ul id="filters" class="d-flex flex-wrap flex-row flex-lg-column">
        <!-- Filtro Distanza -->
        <li class="">
          <label for="radius">Distanza:</label>
          <select id="radius" class="" name="radius">
            <option value="20">20km</option>
            <option value="30">30km</option>
            <option value="40">40km</option>
          </select>
        </li>
        <!-- Filtro Stanze -->
        <li class="">
          <label for="floors"> Floors: </label>
          <input id="floors" min="1" max="10" type="number" name="floors" value="">
        </li>
        <!-- Filtro Letti -->
        <li class="">
          <label for="beds"> Beds: </label>
          <input id="beds" min="1" max="10" type="number" name="beds" value="">
        </li>
        <!-- Filtro Wi-fi -->
        <li class="">
          <input id="wifi" type="checkbox" name="wifi" value="">
          <label for="wifi">Wi-fi</label>
        </li>
        <!-- Filtro Parking -->
        <li class="">
          <input id="parking" type="checkbox" name="parking" value="">
          <label for="parking">Parking</label>
        </li>
        <!-- Filtro Sauna -->
        <li class="">
          <input id="sauna" type="checkbox" name="sauna" value="">
          <label for="sauna">Sauna</label>
        </li>
        <!-- Filtro Pool -->
        <li class="">
          <input id="pool" type="checkbox" name="pool" value="">
          <label for="pool">Pool</label>
        </li>
        <!-- Filtro Concierge -->
        <li class="">
          <input id="concierge" type="checkbox" name="concierge" value="">
          <label for="concierge">Concierge</label>
        </li>
        <!-- Filtro Sea View -->
        <li class="">
          <input id="seaView" type="checkbox" name="seaView" value="">
          <label for="seaView">Sea View</label>
        </li>
      </ul>
      {{-- FINE SEZIONE FILTRI  --}}
    </form>

    <div class="property-search-container d-flex flex-column">

      <ul id="property-wall-promo" class="property-wall-promo">

      </ul>

      <ul id="property-wall" class="property-wall">

      </ul>
    </div>
  </div>


  {{-- SEZIONE JS --}}


  <script id="property-template" type="text/x-handlebars-template">
    <div class="property-search d-flex flex-column flex-sm-row justify-content-between align-items-center">
      <img src="img_db/properties/@{{img}}" alt="">
      <div class="property-search-text d-flex flex-column justify-content-between align-items-start">
        <h5 class="text-center">@{{ name }}</h5>
        <p>@{{ description }}</p>
        <p>@{{ address }}</p>
        <p>Metri Quadri: @{{ m2 }}</p>
        <p>Piani: @{{ floors }}</p>
        <p>Bagni: @{{ bathrooms }}</p>
        <p>Letti: @{{ beds }}</p>
        <a href="/property/@{{ id }}" class="btn align-self-center">MOSTRA</a>
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
