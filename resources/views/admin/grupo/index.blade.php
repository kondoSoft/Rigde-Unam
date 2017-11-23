@extends('layouts.crud')

@section('titulo')
    Grupos
@endsection

@section('panel-body')
        <div class="form-group">
            <a class="btn btn-success" href="{!!Route('admin.grupos.create')!!}">Agregar Grupo <i class="glyphicon glyphicon-plus"></i></a>
        </div>
        <div class="input-group col-md-12">
            <input
                id="search"
                value="{!! Session::get('grupoSearch') !!}"
                name="search"
                onkeydown="if (event.keyCode == 13) ajaxLoad('{{route('admin.grupos.list')}}?ok=1&search='+this.value)"
                type="text"
                placeholder="Nombre del grupo contiene"
                class="form-control col-md-10"
            >
            <div class="input-group-btn">
                <div class="visible-xs">&nbsp;</div>
                <button class="btn btn-primary col-md-12" type="button" ng-disabled="isSearching" ng-click="getSearch()"><i class="glyphicon glyphicon-search"></i> Buscar</button>
            </div>
        </div>
        <div id="content">
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
            ajaxLoad('{!!route('admin.grupos.list')!!}');
        });
    </script>
@endsection
