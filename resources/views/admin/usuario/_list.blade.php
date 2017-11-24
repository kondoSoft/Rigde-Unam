<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>
            <a href="javascript:ajaxLoad('{{route('admin.ususarios.list', ['field' => 'username', 'sort' => Session::get('userSort')=='asc'?'desc':'asc' ])}}')">
                Usuario
            </a>
            <i class="glyphicon  {{ Session::get('userField')=='username'?(Session::get('userSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('{{route('admin.usuarios.list', ['field' => 'tipoUsuario', 'sort' => Session::get('userSort')=='asc'?'desc':'asc' ])}}')">
                Tipo Usuario
            </a>
            <i class="glyphicon  {{ Session::get('userField')=='tipoUsuario'?(Session::get('userSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('{{route('admin.usuarios.list', ['field' => 'email', 'sort' => Session::get('userSort')=='asc'?'desc':'asc' ])}}')">
                Correo
            </a>
            <i class="glyphicon  {{ Session::get('userField')=='email'?(Session::get('product_sort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
        </th>
        <th>
            Comandos
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $key=>$user)
        <tr>
            <td>{{$user->username}}</td>
            <td>{!!$user->tipoUsuarioName!!}</td>
            <td align="right"> {{$user->email}}</td>
            <td style="text-align: center">
                <div class="btn-group" role="group" ng-hide=" hasAccess('superadmin')">
                    <a class="btn btn-primary"  title="Editar este usuario" href="{!!route('admin.usuarios.edit', ['id' => $user->id])!!}"><i class="glyphicon glyphicon-pencil"></i></a>
                    @if($user->tipoUsuario != 2 && $user->tipoUsuario != 'A')
                        {{Form::open(['method' => 'DELETE', 'url' => route('admin.usuarios.delete', ['id' => $user->id]), 'class' => 'formDelete'])}}
                            {{Form::button('<i class="glyphicon glyphicon-trash"></i>',
                                [
                                    'class' => 'btn btn-danger deleteJS',
                                    'data-url' => route('admin.usuarios.delete', ['id' => $user->id]),
                                    'data-modalTargetId' => 'modalconfirmdelete',
                                    'data-modalDisplayText' => '¿Desea eliminar el usuario ' . $user->username . '?'
                                ])
                            }}
                        {{Form::close()}}
                    @endif
                    <a href="{{route('admin.accesos.showListForm', ['id' => $user->id])}}" data-modal="#modalaccessuser" title="Ver/Asignar accesos de este usuario" class="modalURL btn btn-warning" ><i class="glyphicon glyphicon-check"></i></a>
                    @if($user->tipoUsuario == 1)
                        <a href="{{route('admin.grupos.showListForm', ['id' => $user->id])}}" data-modal="#modalgroupuser" title="Ver/Asignar grupos de este usuario" class="modalURL btn btn-info" ><i class="glyphicon glyphicon-check"></i></a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$users->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$users->total()}} registros.
    </i>
</div>
