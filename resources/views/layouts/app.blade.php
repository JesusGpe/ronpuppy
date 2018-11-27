<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <link rel="stylesheet" href="css/plantilla.css">
    <!-- Styles -->
</head>
<body>
    <div id="app">
         <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
              <span class="sr-only">Desplegar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><h4>RONPUPPY</h4></a>
          </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        
    @guest
    <ul class="nav navbar-nav navbar-right">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"><h4>{{ __('Ingresar') }}</h4></a>
     </li>
    <li class="nav-item">
        @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}"><h4>{{ __('Registrarse') }}</h4></a>
        @endif
    </li>
    </ul>
    @else
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          {{ Auth::user()->name }}<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout')}}">
                <h4>{{ __('Perfil') }}</h4>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </li>
            <li><a class="dropdown-item" href="{{ route('logout')}}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <h4>{{ __('Salir') }}</h4>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </li>

        
    </ul>
    @endguest
      </li>
    </ul>
  </div>
</nav>

        <main class="col-md-12">
            @yield('content')
        </main>
    </div>
    <script src="js/app.js"></script>
     <script src="js/plantilla.js"></script>
    
</body>
</html>
