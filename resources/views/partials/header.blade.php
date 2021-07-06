<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-light fixed-top py-4">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('img/logo-seven-eats.png')}}" alt="">
    </a>
    {{-- <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button> --}}

    <div class="" id="navbarSupportedContent">

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="my-btn" href="{{ route('login') }}">{{ __('Area Ristoratori') }}</a>
          </li>
          {{-- @if (Route::has('register'))
            <li class="nav-item">
              <a class="my-btn" href="{{ route('register') }}">{{ __('Registrati') }}</a>
            </li>
          @endif --}}
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

            {{-- <a href="{{route('')}}">Area personale</a> --}}

            <a class="dropdown-item" href="{{route('admin.restaurants.index')}}">I tuoi ristoranti</a>

          </div>
        </li>
      @endguest
    </ul>
  </div>
</div>
</nav>
