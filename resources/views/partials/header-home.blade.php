<header id="header-home">

  <div class="header-container d-flex flex-column">
    <div class="navbar-header d-flex justify-content-between align-items-center">
      <a class="logo" href="/">
        BoolBnB
      </a>
      <ul class="navbar-header-right d-flex justify-content-center align-items-center">
          @guest
              <li>
                  <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li>
                      <a class="join" class="btn nav-link" href="{{ route('register') }}">{{ __('Diventa un Host') }}</a>
                  </li>
              @endif
          @else
  
              
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{asset('img_db/users')}}/{{Auth::user() -> img}}" class="img-profile-header">
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="options">

                    <a href='{{ route('dashboard') }}' class="dropdown-item">
                        Dashboard
                    </a>

                    <a href=' {{route('prop.create')}}' class="dropdown-item">
                        Aggiungi properità
                    </a>

                    <a href='{{route('upr.update')}}' class="dropdown-item">
                        Modifica account 
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                

               
                </div>
            </li>
          @endguest
      </ul>
    </div>


    <div id="jumbo-title-input" class="jumbo-text d-flex flex-column justify-content-center">
        <h2>Riscopri l'Italia</h2>
        <p>Cambia quadro. Scopri alloggi nelle vicinanze tutti da vivere, per lavoro e svago.</p>
        <div class="d-flex">
          <form action="{{ route('search')}}">
            <div class="form-group d-flex flex-row align-items-center">
              <div class="aa-input-container text-dark" id="aa-input-container">
                <input  type="search" id="aa-search-input"
                class="aa-input-search"
                placeholder="La tua prossima destinazione"
                name="search"
                autocomplete="off" />
                <input  id="lat"
                type="hidden"
                name="lat"
                class="form-control">
                <input  id="lng"
                type="hidden"
                name="lng"
                class="form-control">
              </div>
              <div class="search-button">
                <button type="submit" class="btn btn-search">
                  <i class="fas fa-search-location"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <button type="submit" class="btn btn-danger btn-small">
          <i class="fas fa-search-location"></i>
        </button>
        <div class="circle">
          <a href="#gap-header">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>



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


  {{-- <nav class="fixed-top navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="/">
              LOGO
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

              </ul>
              <ul class="navbar-nav ml-auto">
                  @guest
                      <li class="nav-item">
                          <a class="nav-link btn btn-success" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="btn btn-warning nav-link" href="{{ route('register') }}">{{ __('Diventa un Host') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->firstname }}
                          </a>

                          <div class="nav-item dropdown" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav> --}}

</header>
