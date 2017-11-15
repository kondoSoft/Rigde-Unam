@extends('layouts.app')

@section('content')

    	<div class="row" ng-controller="MenuController">
    		<div class="col-md-12">
    			<h3  ng-if="hasAccess('accesoisi')">Bienvenido  <a href="/#/perfil/me">$username</a> <small>$claveplan</small></h3>
    			<h3  ng-if="hasAccess('accesomussi') || hasAccess('superadmin')">Bienvenido $username</h3>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-6">
    		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    		  <!-- Indicators -->
    		  <ol class="carousel-indicators">
    		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    		    <li data-target="#carousel-example-generic" data-slide-to="1" ></li>
    		  </ol>

    		  <!-- Wrapper for slides -->
    		  <div class="carousel-inner" role="listbox">
    		    <div class="item active item-video">
    		    	<div class=" embed-responsive  embed-responsive-4by3">
    		     		<video controls class="embed-responsive-item">
    				 		<source src="{!!$prefix!!}/video/FINAL.mp4" type="video/mp4">
    				 	 Lo sentimos tú navegador no soporta video en HTML5.

    					</video>
    				</div>

    		    </div>
    		    <div class="item item-video">
    		      <div class=" embed-responsive  embed-responsive-4by3">
    			     	<video controls class="embed-responsive-item">
    						<source src="{!!$prefix!!}/video/FINAL_MUSSI.mp4" type="video/mp4">
    					  Lo sentimos tú navegador no soporta video en HTML5.

    					</video>
    				</div>
    		    </div>

    		  </div>

    		  <!-- Controls -->
    		  <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    		    <span class="sr-only">Previous</span>
    		  </a>
    		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    		    <span class="sr-only">Next</span>
    		  </a>-->
    		</div>


    		</div>
    		<div class="col-md-6">
    			<div>
    				 <!-- Default panel contents -->
    				  <div class="panel-heading font24"><strong>Introducción</strong></div>
    				  <div class="panel-body">
    				    <p>El Modelo de Supervisión del Sistema Incorporado, MUSSI,  busca que las Instituciones del Sistema Incorporado, ISI, asuman un papel activo, crítico, reflexivo y responsable sobre las condiciones de funcionamiento y calidad que brindan a sus estudiantes. Es decir, las ISI deberán comprometer todos sus esfuerzos y recursos en pro de la mejora continua con la perspectiva de alcanzar la Calidad Educativa.</p>
    				    <p>
    					Para lograr dicho objetivo, los Directores Técnicos, con su equipo de colaboradores, elaborarán un Plan de Desarrollo Institucional, PDI, el cual les permitirá detectar las fortalezas y oportunidades de la ISI que representan. Asimismo apoyará en la toma de decisiones para diseñar estrategias que: solucionen problemáticas generadas en el pasado, presente y futuro;  favorezcan el éxito de las metas internas; y el cumplimiento de los lineamientos normativos requeridos por la UNAM.</p>
    					<p>Documentos de interés</p>
    					<p>

    			  <strong><strong class="glyphicon glyphicon-download-alt"></strong><a href="{!!$prefix!!}/documentos/Fases_de_Autoevaluación_MUSSI.pdf" target="_blank"> Fases de Autoevaluación</a></strong>
    					</p>
    					<p>

    			  <strong><strong class="glyphicon glyphicon-download-alt"></strong><a href="{!!$prefix!!}/documentos/Introduccion.pdf" target="_blank"> Documento de introducción</a></strong>
    					</p>
    				  </div>
    			</div>
    		</div>

    	</div>
    	<div class="row top30">

    		<div class="col-md-12" ng-controller="MenuController">
    			<div class="row">
    			  <!--<div class="col-md-4" ng-if="hasAccess('accesoisi')">
    			  	<h4>Mis tareas</h4>
    			  	<ul class="list-group">
    				  <li class="list-group-item">Plan de estudios</li>
    				</ul>
    			  </div>-->
    			  <div class="col-md-4" ng-if="hasAccess('accesomussi') || hasAccess('superadmin')">
    			  	<h4 class="item">Procesos</h4>

    			  	<ul class="list-group">
                        <li class="list-group-item">
                        	<a href="#/autoevaluacion/workflow/admin/$cliid" class="font16"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Autoevaluación</a>
                        </li>
                        <li class="list-group-item">
                        	<a href="#/seguimiento" class="font16"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Seguimiento</a>
                        </li>
    				</ul>
    			  </div>
    			  <div class="col-md-4" ng-if="hasAccess('accesoisi')">
    			  	<h4 class="item">Procesos</h4>
    			  	<ul class="list-group">
                        <li class="list-group-item">
                            <a href="{!!route('catalogos.dirTecnica.index')!!}" class="font16"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Información inicial</a>
                        </li>
    				  <li class="list-group-item"><a href="#/autoevaluacion/workflow/$cliid"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Autoevaluación</a></li>
    				   <li class="list-group-item"><a href="#/autoevaluacion/workflow/$cliid/seguimiento"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Seguimiento</a></li>
    				</ul>
    			  </div>
    			  <div class="col-md-4" ng-if="hasAccess('accesomussi') || hasAccess('superadmin')">
    			  	<h4 class="item">Herramientas</h4>
    			  	<ul class="list-group">
    				  <li class="list-group-item"><a href="#/lista/isi"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Consultar ISI</a></li>
    				</ul>
    			  </div>
    			  <div class="col-md-4" ng-if="hasAccess('superadmin')" >
    			  	<h4 class="item">Administración</h4>
    			  	<ul class="list-group">
    				  <li class="list-group-item">
    				  	<a href="{!!route('admin.usuarios.index')!!}" class="font16"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a>
    				  	<br><span class="text-muted"> Administración de usuarios</span>
    				  </li>
    				  <li class="list-group-item">
    				  	<a href="#/groups" class="font16"><i class="glyphicon glyphicon-user"></i> Grupos de usuarios</a>
    				  	<br><span class="text-muted">Administración de grupos</span>
    				  </li>
    				  <!--<li class="list-group-item"><a href="#/listadimensiones">Dimensiones</a></li>-->
    				  <li class="list-group-item">
    				  	<a href="#/listaindicadores" class="font16"><i class="glyphicon glyphicon-info-sign"></i> Indicadores</a>
    				  	<br><span class="text-muted">Administración de indicadores</span>
    				  </li>
    				  <li class="list-group-item">
    				  	<a href="#/autoevaluacion/admin" class="font16"><i class="glyphicon glyphicon-cog"></i> Autoevaluación</a>
    				  	<br><span class="text-muted">Iniciar autoevaluación</span>
    				  </li>
    				</ul>
    			  </div>
    			</div>
    		</div>
    	</div>

@endsection
