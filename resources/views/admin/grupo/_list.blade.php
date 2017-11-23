<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.grupos.list', ['field' => 'id', 'sort' => Session::get('grupoSort')=='asc'?'desc':'asc' ])}}')">
                    ID
                </a>
                <i class="glyphicon  {{ Session::get('grupoField')=='id'?(Session::get('grupoSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
            <th>
                <a href="javascript:ajaxLoad('{{route('admin.grupos.list', ['field' => 'nombre', 'sort' => Session::get('grupoSort')=='asc'?'desc':'asc' ])}}')">
                    Nombre
                </a>
                <i class="glyphicon  {{ Session::get('grupoField')=='nombre'?(Session::get('grupoSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
            </th>
            <th>
                Comandos
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($grupos as $grupo)
            <tr>
                <td>{{$grupo->id}}</td>
                <td>{{$grupo->nombre}}</td>
                <td>
                    <div class="btn-group" role="group" ng-hide=" hasAccess('superadmin')">
                        <a class="btn btn-primary"  title="Editar este grupo" href="{{route('admin.grupos.edit', ['id' => $grupo->id])}}"><i class="glyphicon glyphicon-pencil"></i></a>
                        {{Form::open(['method' => 'DELETE', 'url' => route('admin.grupos.delete', ['id' => $grupo->id]), 'class' => 'formDelete'])}}
                            {{Form::button('<i class="glyphicon glyphicon-trash"></i>',
                                [
                                    'class' => 'btn btn-danger deleteJS',
                                    'data-url' => route('admin.grupos.delete', ['id' => $grupo->id]),
                                    'data-modalTargetId' => 'modalconfirmdelete',
                                    'data-modalDisplayText' => '¿Desea eliminar el grupo ' . $grupo->nombre . '?'
                                ])
                            }}
                        {{Form::close()}}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$grupos->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$grupos->total()}} registros.
    </i>
</div>
