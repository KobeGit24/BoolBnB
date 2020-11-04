<header id="header-home">

  <div class="header-container d-flex flex-column">
    <div class="navbar-header">
      <div class="container d-flex justify-content-between align-items-center">
        <a class="logo d-flex" href="/">
          <span class="b">
            B
          </span>
          <span class="text-danger b">
            <i class="fas fa-map-marker-alt"></i>
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <span class="lbnb b">
            lbnb
          </span>
        </a>
        <ul class="navbar-header-right d-flex flex-xl-row flex-lg-row flex-md-row justify-content-center align-items-center">
            @guest
                <li class="header-login">
                    <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="header-login">
                        <a class="join" class="btn nav-link" href="{{ route('register') }}">{{ __('Diventa un Host') }}</a>
                    </li>
                    <li class="ham-menu font-weight-bold">
                      <i class="fas fa-ellipsis-v"></i>
                      <ul class="dropdown-ham-xs">
                        <li class="ham-login-xs">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <hr>
                        <li class="ham-reg-xs">
                            <a href="{{ route('register') }}">{{ __('Diventa un Host') }}</a>
                        </li>
                      </ul>
                    </li>
                @endif
            @else


                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="{{asset('img_db/users')}}/{{Auth::user() -> img}}" class="img-profile-header">
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="options">

                      <a href='{{ route('dashboard') }}' class="dropdown-item">
                          <span class="menu-options-black"> Dashboard </span>
                      </a>

                      <a href=' {{route('prop.create')}}' class="dropdown-item">
                        <span class="menu-options-black"> Aggiungi properità </span>
                      </a>

                      <a href='{{route('upr.update')}}' class="dropdown-item">
                        <span class="menu-options-black"> Modifica account </span>
                      </a>

                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <span class="menu-options-black"> Logout </span>
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


    <div id="jumbo-title-input" class="jumbo-text container d-flex flex-column justify-content-center">
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

</header>
