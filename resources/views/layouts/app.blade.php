<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="./css/bootstrap-theme.min.css">

        <link href="./css/nprogress.css" rel="stylesheet" />
        <link href="./css/animate.css" rel="stylesheet" />
        <link href="./css/please-wait.css" rel="stylesheet">
        <link href="./css/autocomplete.css" rel="stylesheet" />
        <!-- El css de la app -->
        <link rel="stylesheet" href="./css/app2.css">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="./js/core/jquery.min.js"></script>
        <script src="./js/core/angular.min.js"></script>
        <script src="./js/core/angular-locale_es-es.js"></script>
        <script src="./js/core/angular-cookies.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="./js/core/bootstrap.min.js"></script>
        <script src="./js/core/angular-strap.js" data-semver="v2.3.2"></script>
        <script src="./js/core/angular-strap.tpl.js" data-semver="v2.3.2"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="./js/extras/satellizer.js"></script>
        <script src="./js/extras/angular-animate.min.js"></script>
        <script src="./js/extras/angular-resource.min.js"></script>
        <script src="./js/extras/angular-route.min.js"></script>
        <script src="./js/extras/angular-sanitize.min.js"></script>
        <script src="./js/extras/angular-scroll.min.js"></script>
        <script src="./js/extras/loadingbar.js"></script>
        <script src="./js/extras/angular-paginate.js"></script>
        <script src="./js/extras/angular-validator.min.js"></script>

        <script src="./js/extras/nprogress.js"></script>
        <script src="./js/extras/noty.js"></script>

        <script src="./js/extras/autocomplete.js"></script>

        <script type="text/javascript" src="./js/extras/please-wait.js"></script>
        <script type="text/javascript" src="./js/extras/angular-file-upload.min.js"></script>

        <script type="text/javascript">
            var _tk = '<?php echo csrf_token(); ?>';
        </script>
        <script src="./js/app.js"></script>
        <script src="./js/app/services.js"></script>
        <script src="./js/app/SecController.js"></script>
        <script src="./js/app/controllers.js"></script>
        <script src="./js/app/userscontroller.js"></script>
        <script src="./js/app/accesoscontroller.js"></script>
        <script src="./js/app/seguimientocontroller.js"></script>
        <script src="./js/app/directives.js"></script>
    </head>
    <body resizable>
        <div loading-indicator></div>
            <div nt-scroll-to-top></div>

                <header>

                    <!-- Fixed navbar -->
                    <nav class="navbar navbar-inverse paddtop navbar-fixed-top" ng-controller="MenuController">
                        <div class="container">

                            <img class="img-responsive" src="img/l_unam.png" style="float:left;max-width:70px;">
                            <img src="img/l_dgire.png" alt="DGIRE UNAM" class="img-responsive" style="float:left;max-width:70px;">
                            <p class="navbar-text font24 title hidden-xs hidden-sm">MODELO DE SUPERVISIÓN DEL SISTEMA INCORPORADO</p>
                            <p class="navbar-text font18 title hidden-md hidden-lg">MODELO DE SUPERVISIÓN DEL SISTEMA INCORPORADO</p>
                            <div class="navbar-header hidden-xs hidden-sm">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <div id="navbar" class="navbar-collapse collapse" >
                                <ul class="nav navbar-nav   hidden-xs hidden-sm" style="float:right;">
                                    <!--<li ng-if="hasAccess('accesoisi') && isAuthenticated()"><a href="/#/perfil/me" style="border-left-width: 0px; padding-left: 30px; padding-top: 30px;color:#fff;">Mi perfil</a></li>
                                    <li ng-if="hasAccess('accesoisi') && isAuthenticated()"><a href="/#/faqs" style="border-left-width: 0px; padding-left: 30px; padding-top: 30px;color:#fff;">FAQs</a></li>-->
                                    @if (!Auth::guest())
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="font20" style="border-left-width: 0px; padding-left: 30px; padding-top: 30px;color:#fff;">Salir</a></li>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                </ul>
                            </div><!--/.nav-collapse -->

                        </div>
                    </nav>
                    <nav class="navbar navbar-inverse navbar-fixed-top top100 subnavbar" ng-controller="MenuController">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <div id="navbar2" class="navbar-collapse collapse" >
                                <ul class="nav navbar-nav" >
                                    @if (!Auth::guest())
                                        <li ng-if="isAuthenticated()"><a href="#/panelcontrol" class="menu-item">Inicio</a></li>
                                        <li ng-if="isAuthenticated() && hasAccess('accesoisi')"><a href="/#/perfil/me" class="menu-item">Mi perfil</a></li>
                                        <li ng-if="isAuthenticated() && hasAccess('accesoisi')"><a href="/#/faqs" class="menu-item">FAQs</a></li>
                                        <li ng-if="isAuthenticated()" class="hidden-md hidden-lg"><a href="/#/logout" class="menu-item">Salir</a></li>
                                    @endif
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </header>
                <section class="top110">
                    <div class="section container">
                        <div class="wrapper-container" style="position:relative;">
                            <div ng-view>@yield('content')</div>
                        </div>
                    </div>
                </section>

                <footer>
                    <div class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2 col-xs-2 ">
                                    <img src="img/l_unam.png" class="img-responsive" style="float: left;">
                                </div>
                                <div class="col-md-8 col-xs-8">
                                    <div class="footer-wrapper center-block text-center font12">

                                      &copy; Hecho en M éxico, todos los derechos reservados 2015<br>
                                      Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la institución. Sitio web administrado por: Dirección General de Incorporación y Revalidación de Estudios.

                                  </div>
                              </div>
                              <div class="col-md-2 col-xs-2 ">
                                  <img src="img/l_siunam.png" class="img-responsive" style="float: right;">
                              </div>
                          </div>
                      </div>
                  </div>
              </footer>
          <!-- Scripts -->
          <script src="{{ asset('js/app.js') }}"></script>
      </body>
</html>
