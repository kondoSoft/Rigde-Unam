<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.indicadores.list', ['field' => 'nombre', 'sort' => Session::get('indicadorSort')=='asc'?'desc':'asc' ])}}')">
                    Nombre
                </a>
                <i class="glyphicon  {{ Session::get('indicadorField')=='nombre'?(Session::get('indicadorSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.indicadores.list', ['field' => 'clave', 'sort' => Session::get('indicadorSort')=='asc'?'desc':'asc' ])}}')">
                    Clave
                </a>
                <i class="glyphicon  {{ Session::get('indicadorField')=='nombre'?(Session::get('indicadorSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.indicadores.list', ['field' => 'dimension', 'sort' => Session::get('indicadorSort')=='asc'?'desc':'asc' ])}}')">
                    Dimensión
                </a>
                <i class="glyphicon  {{ Session::get('indicadorField')=='dimension'?(Session::get('indicadorSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.indicadores.list', ['field' => 'activo', 'sort' => Session::get('indicadorSort')=='asc'?'desc':'asc' ])}}')">
                    Estatus
                </a>
                <i class="glyphicon  {{ Session::get('indicadorField')=='activo'?(Session::get('indicadorSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($indicadores as $indicador)
            <tr>
                <td>{{$indicador->nombre}}</td>
                <td>{{$indicador->clave}}</td>
                <td>{{$indicador->dimension}}</td>
                <td>
                    @if ($indicador->activo)
                        <span ng-if="indicador.cinactivo == 1">
                            <a href="javascript:;" ng-click="changeEstatus(indicador.cinid,$index);"><i class="glyphicon glyphicon-ok" style="color: green;"></i></a>
                        </span>
                    @else
                        <span ng-if="indicador.cinactivo == 2">
                            <a href="javascript:;" ng-click="changeEstatus(indicador.cinid,$index);"><i class="glyphicon glyphicon-ban-circle" style="color: red;"></i></a>
                        </span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$indicadores->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$indicadores->total()}} registros.
    </i>
</div>
