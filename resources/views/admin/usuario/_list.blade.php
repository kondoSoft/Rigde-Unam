<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>
            <a href="javascript:ajaxLoad('/usuarios/_list?field=username&sort={{Session::get("userSort")=="asc"?"desc":"asc"}}')">
                Usuario
            </a>
            <i class="glyphicon  {{ Session::get('userField')=='username'?(Session::get('userSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('/usuarios/_list?field=tipoUsuario&sort={{Session::get("userSort")=="asc"?"desc":"asc"}}')">
                Tipo Usuario
            </a>
            <i class="glyphicon  {{ Session::get('userField')=='tipoUsuario'?(Session::get('userSort')=='asc'?'glyphicon-sort-by-alphabet':'glyphicon-sort-by-alphabet-alt'):'' }}"></i>
        </th>
        <th>
            <a href="javascript:ajaxLoad('/usuarios/_list?field=email&sort={{Session::get("userSort")=="asc"?"desc":"asc"}}')">
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

                    <a ng-show="usuario.clitipousuario != '2' && usuario.clitipousuario != 'A'" class="btn btn-danger"  title="Eliminar este usuario" ng-click="deleteuserWait(usuario)"><i class="glyphicon glyphicon-trash"></i></a>

                    <a class="btn btn-warning"  title="Ver/Asignar accesos de este usuario" ng-click="asignarAccesos(usuario)"><i class="glyphicon glyphicon-check"></i></a>

                    <a ng-show="usuario.clitipousuario == '1'" class="btn btn-info"  title="Ver/Asignar grupo a este usuario" ng-click="asignarGrupo(usuario)"><i class="glyphicon glyphicon-check"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="pull-right">{!! str_replace('/?','?',$users->render()) !!}</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$users->total()}} records
    </i>
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        ajaxLoad($(this).attr('href'));
    });
</script>
