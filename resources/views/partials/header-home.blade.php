<header id="header-home">

  <div class="header-container d-flex flex-column">
    <div class="navbar-header d-flex justify-content-between align-items-center">
      <a class="logo" href="/">BoolBnB</a>
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
              <li class="dropdown d-flex align-items-center">
                  <a id="navbarDropdown" class="login dropdown-toggle" href="{{ route('dashboard') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->firstname }}
                  </a>

                  <div class="dropdown" aria-labelledby="navbarDropdown">
                      <a class="join" href="{{ route('logout') }}"
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


    <div class="jumbo-text d-flex flex-column justify-content-center align-items-start">
      <div class="jumbo-text-content">
        <h2>Riscopri l'Italia</h2>
        <p>Cambia quadro. Scopri alloggi nelle vicinanze tutti da vivere, per lavoro e svago.</p>
        <a href="#">Esplora i dintorni</a>
      </div>
    </div>
  </div>


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
