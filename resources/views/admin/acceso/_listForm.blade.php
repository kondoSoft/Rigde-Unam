<div class="col-md-12 msg">
</div>
{{Form::open([
    'url' => route('admin.accesos.putListForm', ['id' => $user->id]),
    'method' => 'PUT',
    'class' => 'putListForm'])}}
    <table class="table table-hover table tableCheckbox">
        @foreach ($accesos as $acceso)
            <tr>
                <td>{{Form::label('accesos', $acceso->descripcion, ['class' => 'form'])}}</td>
                <td>{{Form::checkbox('accesos[]', $acceso->id, in_array($acceso->id, $userAccesos) === TRUE ? TRUE : FALSE)}}</td>
            </tr>
        @endforeach
    </table>
{{Form::close()}}
