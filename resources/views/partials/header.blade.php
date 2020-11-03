<header id="header">
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
</header>
