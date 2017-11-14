@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
		<div class="col-md-12">
		<h1>Usuarios</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-success" href="/usuarios/create">Agregar Usuario <i class="glyphicon glyphicon-plus"></i></a>
		</div>
	</div>
	<div class="row top10">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" name="regFormBoletin">
						<div class="form-group col-md-12">
							<div class="col-xs-12 col-sm-12">
								<label class="sr-only" for="q">Nombre usuario, email contiene</label>
							</div>
							<div class="col-xs-12 col-sm-10">
					        	<input
					        		id="q"
					        		name="q"
					        		ng-model="q"
					        		type="text"
					        		placeholder="Clave, email contiene"
					        		class="form-control col-md-10"
					        		>
				        	</div>
				        	<div class="col-sm-2 col-xs-12">
				        		<div class="visible-xs">&nbsp;</div>
				        		<button class="btn btn-primary col-xs-12" type="button" ng-disabled="isSearching" ng-click="getSearch()"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				        	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col s12 m12 l12">
			<div>
				<dir-pagination-controls boundary-links="true" on-page-change="changePage(newPageNumber)" template-url="/js/app/templates/dirpagination.html"></dir-pagination-controls>
			</div>
		</div>

	</div>
	<div class="row">
		<table class="table table-striped table-hover " id="tramtable">
			<thead>
			  <tr>
			      <th data-field="usuario">
			      	<a id="ord1" class="order-list order-list-active" ng-click="doOrder('cliapellidopaterno','asc')"><i class="mdi-hardware-keyboard-arrow-up"></i></a>
			      	Usuario
			      	<a id="ord2" class="order-list" ng-click="doOrder('cliapellidopaterno','desc')"><i class="mdi-hardware-keyboard-arrow-down"></i></a>
			      	</th>

			      <th data-field="tipo">
			      	<a id="ord3" class="order-list order-list-active" ng-click="doOrder('clitipousuario','asc')"><i class="mdi-hardware-keyboard-arrow-up"></i></a>
			      	Tipo usuario
			      	<a id="ord4" class="order-list" ng-click="doOrder('clitipousuario','desc')"><i class="mdi-hardware-keyboard-arrow-down"></i></a>
			      </th>
			      <th data-field="email">
			      	<a id="ord3" class="order-list order-list-active" ng-click="doOrder('climail','asc')"><i class="mdi-hardware-keyboard-arrow-up"></i></a>
			      	Correo
			      	<a id="ord4" class="order-list" ng-click="doOrder('climail','desc')"><i class="mdi-hardware-keyboard-arrow-down"></i></a>
			      </th>
			      <th data-field="comandos">
			      	Comandos
			      </th>
			  </tr>
			</thead>

			<tbody id="tbtram">
			  <tr class="collection-item" dir-paginate="usuario in users | itemsPerPage: paginationdata.per_page" total-items= current-page="paginationdata.current_page">


		            <td>
		            	<span ng-if="usuario.clitipousuario == 'A' || usuario.clitipousuario == '1'"></span>
		            	<span ng-if="usuario.clitipousuario == '2'"></span>
		            </td>

		            <td>
		            	<span ng-show="usuario.clitipousuario == 'A'">Administrador</span>
		            	<span ng-show="usuario.clitipousuario == '1'">Usuario DGIRE</span>
		            	<span ng-show="usuario.clitipousuario == '2'">Institución</span>

		            </td>
		            <td>

		            </td>
		            <td>
		            	<div class="btn-group" role="group" ng-hide=" hasAccess('superadmin')">
		            		<a class="btn btn-primary"  title="Editar este usuario" href="#/users/"><i class="glyphicon glyphicon-pencil"></i></a>

							<a ng-show="usuario.clitipousuario != '2' && usuario.clitipousuario != 'A'" class="btn btn-danger"  title="Eliminar este usuario" ng-click="deleteuserWait(usuario)"><i class="glyphicon glyphicon-trash"></i></a>

							<a class="btn btn-warning"  title="Ver/Asignar accesos de este usuario" ng-click="asignarAccesos(usuario)"><i class="glyphicon glyphicon-check"></i></a>

							<a ng-show="usuario.clitipousuario == '1'" class="btn btn-info"  title="Ver/Asignar grupo a este usuario" ng-click="asignarGrupo(usuario)"><i class="glyphicon glyphicon-check"></i></a>
		            	</div>

		            </td>
		        </tr>
			</tbody>
		</table>
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
