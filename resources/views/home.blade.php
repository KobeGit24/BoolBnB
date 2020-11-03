@extends('layouts.home')

@section('content')
  {{-- <div class="home-main-container">
    <section id="jumbo">
      <div class="search-main d-flex justify-content-between aling-items-center">
        <div class="title height-center">
        </div>
      </div>
    </section> --}}
    <div id="gap-header"></div>
    <h1 class="text-primary">Dove ti piacerebbe andare?</h1>
    <section id="prop-sponsored" class="">
      <div class="sponsored">
        <div class="title text-center p-2">
          <h3>Appartamenti in evidenza</h3>
        </div>
        <div class="">
          <div class="d-flex flex-wrap justify-content-around">
            @foreach ($data_property as $d_p)
              <div class="property-sponsored d-flex flex-column justify-content-between index-sponsored card-shadow">
                <img id="img-prop-index"src="{{asset('img_db/properties')}}/{{$d_p -> img}}" alt="">
                <h5 class="align-self-center">{{ $d_p-> name }}</h5>
                <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-primary align-self-center">SCOPRI</a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>

{{--
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
</script> --}}
@endsection
