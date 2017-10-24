<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/general.css') }}" rel="stylesheet">
     @yield('styles')

     <!-- Scripts -->
     <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
     </script>
</head>
<body>
     <div id="app">
          <nav class="navbar navbar-default navbar-static-top">
               <div class="container">
                    <div class="navbar-header">

                         <!-- Collapsed Hamburger -->
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                             <span class="sr-only">Toggle Navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                         </button>

                         <!-- Branding Image -->
                         <a class="navbar-brand" href="{{ url('/') }}">
                             {{ config('app.name', 'Laravel') }}
                         </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                         <!-- Left Side Of Navbar -->
                         <ul class="nav navbar-nav">
                             &nbsp;
                         </ul>

                         <!-- Right Side Of Navbar -->
                         <ul class="nav navbar-nav navbar-right">
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      General <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="{{route('catalogos.sao.index')}}">Situación Actual de Operación</a>
                                      </li>
                                       <li>
                                          <a href="{{route('catalogos.dirTecnica.index')}}">Dirección Tecnica</a>
                                      </li>
                                  </ul>
                              </li>

                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      Planes de Estudio <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="{{route('planesEstudio.bdu.index')}}">BDU</a>
                                      </li>
                                      <li>
                                          <a href="{{route('planesEstudio.enp.index')}}">ENP</a>
                                      </li>
                                      <li>
                                          <a href="{{route('planesEstudio.cch.index')}}">CCH</a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      Conteo <span class="caret"></span>
                                  </a>

                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="{{route('conteo.enp.index')}}">ENP</a>
                                      </li>
                                      <li>
                                          <a href="{{route('conteo.cch.index')}}">CCH</a>
                                      </li>
                                  </ul>
                              </li>
                         </ul>
                    </div>
               </div>
          </nav>
          <div class="row">
               <div class="col-md-8 col-md-offset-2">
                    @yield('content')
               </div>
          </div>
     </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('javascript')
</body>
</html>
