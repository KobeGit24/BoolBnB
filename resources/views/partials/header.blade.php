<header id="header">
  <div class="header-container d-flex flex-column">

    <div class="navbar-header">
      <div class="container d-flex justify-content-between align-items-center">
        <a class="logo" href="/">
          <span class="text-primary b">
            b
          </span>
          <span class="text-danger b">
            <i class="fas fa-map-marker-alt"></i>
          </span>
          <span class="text-primary b">
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
  </div>
</header>
