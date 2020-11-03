@extends('layouts.app')

@section('content')

  <div class="d-flex flex-column justify-content-center align-items-center">
      @if ($prop-> user_id == Auth::id() )
        <div class="d-flex justify-content-center align-items-center">
          <a class="btn btn-success mr-2 p-2 btn-card" href="{{ route('prop.info', $prop -> id) }}">Vedi statistiche e messaggi</a>
          <a class="btn btn-primary ml-2 p-2 btn-card" href="{{ route('payment.view', $prop -> id) }}"> Sponsorizza </a>
        </div>
      @endif
    <div class="main-property-container d-flex flex-column justify-content-between align-items-start pb-3">
      <div class="main-property-title text-center w-100 border-bottom border-warning">
        <h2>{{$prop -> name}}</h2>
      </div>
      <div class="main-property-content d-flex justify-content-center">
        <div class="property-info w-100">
          <img id="img-prop-show"src="{{asset('img_db/properties')}}/{{$prop -> img}}" alt="">
          <div class="property-info-content d-flex pt-1">
            <div class="property-info-text d-flex flex-column">
              <div class="description">
                <h4>Descrizione</h4>
                <p class="text-secondary">{{$prop -> description}}</p>
                <h5>Indirizzo</h5>
                <p class="text-secondary">{{$prop -> address}}, {{$prop -> city}}</p>
              </div>
              <div class="amenities d-flex flex-column">
                <p class="text-secondary"><strong class="text-dark">Piano: </strong>{{$prop -> floors}}
                </p>
                <p class="text-secondary">
                    <i class="fas fa-bed text-dark"></i>: {{$prop -> beds}}
                </p>
                <p class="text-secondary">
                  <i class="fas fa-bath text-dark"></i>:
                  </strong>{{$prop -> bathrooms}}
                </p>
                <p class="text-secondary"><strong class="text-dark">M2: </strong>{{$prop -> m2}}</p>
                <h5>Servizi Extra</h5>
                <span class="text-secondary">
                  @foreach ($services as $item)
                      @if ($item -> property_id == $prop -> id)
                        -  {{$item -> service -> name}}
                      @endif
                  @endforeach
                </span>
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

                <h3 class="text-primary">Contatta {{$prop -> name}}</h3>
                <input class="form-control m-1" type="email" name="user_email" value="" placeholder="inserisci e-mail" required autocomplete="user_email" autofocus>

                <input class="form-control m-1" type="text" name="firstname" placeholder="nome" required autocomplete="firstname" autofocus>

                <input class="form-control m-1" type="text" name="lastname" placeholder="cognome" required autocomplete="lastname" autofocus>

                <input class="form-control m-1" type="text" name="number" placeholder="cellulare" required autocomplete="number" autofocus>

                <textarea class="form-control m-1" name="text" rows="5" cols="50" placeholder="Inserisci il tuo messaggio"></textarea required autocomplete="text" autofocus>

                <button class="btn btn-secondary contact-button m-2 pt-2 pb-2 pl-3 pr-3" type="submit" name="button">Invia</button>
              </form>

            @endif

          </div>
        </div>

        <div class="property-map w-100" id="mapContainer"></div>
      </div>
    </div>
</div>


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
