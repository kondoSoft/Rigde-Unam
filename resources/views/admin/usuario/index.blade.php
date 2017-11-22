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
				<h2>Eliminar</h2>
			</div>
		    <div class="modal-body">
                ¿Desea realmente eliminarlo?
		    </div>

		  <div class="modal-footer">
		    <a class="btn btn-success" ng-click="deleteuser()" id="delete" data-dismiss="modal">Aceptar</a>
		    <a class="btn btn-danger" ng-click="cancelDelete()" data-dismiss="modal">Cancelar</a>
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
                <div class="col-md-12 msg">
                    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success ajaxForm" data-form=".putListForm" >Aceptar</a>
                <a class="btn btn-danger cancelar" ng-click="cancelDelete()" data-dismiss="modal">Cerrar</a>
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
                <div class="col-md-12 msg">
                    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
                </div>
	    	</div>
            <div class="modal-footer">
                <a class="btn btn-success ajaxForm" data-form="#putGrupoListForm" >Aceptar</a>
                <a class="btn btn-danger cancelar" ng-click="cancelDelete()" data-dismiss="modal">Cerrar</a>
            </div>
	    </div>
	  </div>
	</div>
</div>
@endsection

@section('javascript')
    <script src="{{$prefix}}/js/app/ajaxSearch.js" charset="utf-8"></script>
    <script src="{{$prefix}}/js/app/ajaxPrevent.js" charset="utf-8"></script>
    <script src="{{$prefix}}/js/app/delete.js" charset="utf-8" prefix="{{$prefix}}"></script>
    <script src="{{$prefix}}/js/app/modalURL.js" charset="utf-8"></script>
    <script src="{{$prefix}}/js/tableCheckbox.js" charset="utf-8"></script>
    <script src="{{$prefix}}/js/app/submitForm.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            ajaxLoad('{!!route('admin.usuarios.list')!!}');
        });
    </script>

@endsection
