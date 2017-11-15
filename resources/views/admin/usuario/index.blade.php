@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row top10 col-md-12">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
                    <div class="col-md-12 row">
                        <h1>Usuarios</h1>
                    </div>
					<div class="form-group col-md-12">
                        <div class="form-group">
                            <a class="btn btn-success" href="{!!Route('admin.usuarios.create')!!}">Agregar Usuario <i class="glyphicon glyphicon-plus"></i></a>
                        </div>
						<div class="input-group col-md-12">
				        	<input
				        		id="search"
                                value="{!! Session::get('userSearch') !!}"
				        		name="search"
                                onkeydown="if (event.keyCode == 13) ajaxLoad('{{route('admin.usuarios.list')}}?ok=1&search='+this.value)"
				        		ng-model="q"
				        		type="text"
				        		placeholder="Clave, email contiene"
				        		class="form-control col-md-12"
				        	>
                            <div class="input-group-btn">
                                <div class="visible-xs">&nbsp;</div>
                                <button class="btn btn-primary col-md-12" type="button" ng-disabled="isSearching" ng-click="getSearch()"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                            </div>
			        	</div>
					</div>
                    <div class="row">
                        <div class="pg-loading-logo-header">

                        </div>
                    </div>
                    <div class="form-group col-md-12" id="content">
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="modalconfirmdelete" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Lista de suscriptores</h2>
			</div>
		    <div class="modal-body">

		    </div>

		  <div class="modal-footer">
		    <a class="btn btn-success" ng-click="deleteuser()">Aceptar</a>
		    <a class="btn btn-danger" ng-click="cancelDelete()">Cancelar</a>
		  </div>
		</div>
	</div>
</div>

<div id="modalaccessuser" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		  	<div class="modal-header">
		  		<h3>Accesos del usuario: </h3>
		  		<div>Para asignar o quitar permisos al usuario selecciona la casilla del permiso</div>
		  	</div>
		    <div class="modal-body">
	    	<ul class="list-group">
		    	<li class="list-group-item" ng-repeat="acceso in allacess">

					<input type="checkbox" autocomplete="off" class="accessfield" id="a" ng-checked="hasPermiso(acceso.accid)" ng-click="updateAccess($event,acceso.accid)">
					<span></span>

		    	</li>
	    	</ul>
	    </div>
	  </div>
	</div>
</div>

<div id="modalgroupuser" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		  	<div class="modal-header">
		  		<h3>Grupo asignado al usuario: </h3>
		  		<div>Para asignar o quitar un grupo al usuario ingrese el ID del grupo</div>
		  	</div>
		    <div class="modal-body">
	    		<label>Ingresa el ID del grupo</label>
	    		<input type="text" id="idgroup" ng-model="idgroup" required/>
	    		<button class="btn btn-info" ng-if="addbutton" ng-click="saveGrupo()"  ng-disabled="!idgroup">Agregar a grupo</button>
	    		<button class="btn btn-danger" ng-if="delbutton">Eliminar del grupo</button>
	    		<div ng-if="delbutton">
	    			<p>
	    				<span>Planes asignados:</span>
	    			</p>
	    			<p>
	    				<span></span>
	    			</p>
	    		</div>


	    	</div>
	    </div>
	  </div>
	</div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        function ajaxLoad(filename, content) {
            content = typeof content !== 'undefined' ? content : 'content';
            $('.loading').show();
            $.ajax({
                type: "GET",
                url: filename,
                contentType: false,
                success: function (data) {
                    $("#" + content).html(data);
                    $('.loading').hide();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }
        $(document).ready(function () {
            ajaxLoad('{!!route('admin.usuarios.list')!!}');
        });
    </script>
@endsection
