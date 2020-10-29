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
</header>
