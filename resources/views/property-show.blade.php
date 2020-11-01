@extends('layouts.app')

@section('content')

  <div class="card-width">
    <div class="">

    </div>

  </div>

  {{-- <div id="central">
      <h1> {{$prop -> name}} </h1>

      <h2> Dati sull'abitazione </h2>

      <div id="container-box">
            <div class="casella">
                <p> Città: </p>
                <p> {{$prop -> city}}</p>
            </div>

            <div class="casella">
                <p> Indirizzo: </p>
                <p> {{$prop -> address}}</p>
            </div>

            <div class="casella">
                <p> Descrizione: </p>
                <p> {{$prop -> description}}</p>
            </div>

            <div class="casella">
                <p> m2: </p>
                <p> {{$prop -> m2}}</p>
            </div>

            <div class="casella">
                <p> Piani: </p>
                <p> {{$prop -> floors}}</p>
            </div>

            <div class="casella">
                <p> letti: </p>
                <p> {{$prop -> beds}}</p>
            </div>
        </div>

        <h3> Servizi: </h3>

        @foreach ($services as $item)
            @if ($item -> property_id == $prop -> id)
               - {{$item -> service -> name}} -
            @endif
        @endforeach



        @if (!Auth::user())

            <h2> Fai un richiesta all'host </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('store.request', $prop -> id)}}">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="user_email"> Email: </label>
                    <input type="email" name="user_email">
                </div>

                <div class="form-group">
                    <label for="firstname"> Firstname: </label>
                    <input type="text" name="firstname">
                </div>

                <div class="form-group">
                    <label for="lastname"> Lastname: </label>
                    <input type="text" name="lastname">
                </div>

                <div class="form-group">
                    <label for="number"> Phone Number: </label>
                    <input type="text" name="number">
                </div>

               <textarea name="text" rows="5" cols="50">
               </textarea>

               <div class="form-group">
                   <button type="submit" class="btn btn-danger"> Send </button>
               </div>
            </form>
        @endif
  </div> --}}

  <main class="main-property d-flex justify-content-center align-items-center">
  <div class="main-property-container d-flex flex-column justify-content-between align-items-start">
    <div class="main-property-title text-center">
      <h2>{{$prop -> name}}</h2>
    </div>
    <div class="main-property-content d-flex justify-content-center">
      <div class="property-info">
        <img src="{{asset('img_db/properties')}}/{{$prop -> img}}" alt="">
        <div class="property-info-content d-flex">
          <div class="property-info-text d-flex flex-column justify-content-between">
            <div class="description">
              <h4>Descrizione</h4>
              <p>{{$prop -> description}}</p>
              <p>{{$prop -> address}} {{$prop -> city}}</p>
            </div>
            <div class="amenities">
              <span><strong>Piano: </strong>{{$prop -> floors}} <strong>Letti: </strong>{{$prop -> beds}} <strong>Bagni: </strong>1 <strong>Metratura: </strong>{{$prop -> m2}}</span> <br>
              <span>
                @foreach ($services as $item)
                    @if ($item -> property_id == $prop -> id)
                      -  {{$item -> service -> name}}
                    @endif
                @endforeach
              </span>
            @if ($prop-> user_id == Auth::id() )
              <div class="">
                <a class="btn btn-success" href="{{ route('prop.info', $prop -> id) }}">Vedi statistiche e messaggi</a>
                <a class="btn btn-primary" href="{{ route('payment.view', $prop -> id) }}"> Sponsorizza </a>
              </div>
            @endif
            </div>
          </div>

          @if (Auth::id() != $prop-> user_id)

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('store.request', $prop -> id)}}" class="contact-owner d-flex flex-column justify-content-between">
              @csrf
              @method('POST')

              <h3>Contatta {{$prop -> name}}</h3>
              <input class="contact-email" type="email" name="user_email" value="" placeholder="la tua e-mail">
              <input type="text" name="firstname" placeholder="nome">
              <input type="text" name="lastname" placeholder="cognome">
              <input type="text" name="number" placeholder="cellulare">
              <textarea name="text" rows="5" cols="50" placeholder="Inserisci il tuo messaggio"></textarea>
              <button class="contact-button" type="submit" name="button">Invia Messaggio</button>
            </form>

          @endif

        </div>
      </div>

      <div class="property-map" id="mapContainer">

      </div>
    </div>
  </div>

</main>

<script type="text/javascript">

$(document).ready(hereMaps);

function hereMaps() {

  var platform = new H.service.Platform({

  'apikey': '8v6jacmVce_7FdAJ6i2bbWZgZGuNuuURchZG0RV3wUs'
  });

  // Get an instance of the search service:
  var service = platform.getSearchService();

  // Call the reverse geocode method with the geocoding parameters,
  // the callback and an error callback function (called if a
  // communication error occurs):
  service.reverseGeocode({
    at: '{{$prop -> lat}},{{$prop -> lng}}'
  }, (result) => {
    result.items.forEach((item) => {
      // Assumption: ui is instantiated
      // Create an InfoBubble at the returned location with
      // the address as its contents:
      ui.addBubble(new H.ui.InfoBubble(item.position, {
        content: item.address.label
      }));
    });
  }, alert);

  // Get the default map types from the Platform object:
  var defaultLayers = platform.createDefaultLayers();

  // Instantiate the map:
  var map = new H.Map(
      document.getElementById('mapContainer'),
      defaultLayers.vector.normal.map,
      {
          zoom: 16,
          center: { lng: {{$prop -> lng}}, lat: {{$prop -> lat}} }
      });

  // Create the default UI:
  var ui = H.ui.UI.createDefault(map, defaultLayers, 'it-IT');

  // MapEvents enables the event system
  // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
  var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

  }

</script>

@endsection
