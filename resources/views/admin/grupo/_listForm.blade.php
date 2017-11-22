<div class="col-md-12 msg">
</div>
{{Form::open([
    'url' => route('admin.grupos.putListForm', ['id' => $user->id]),
    'method' => 'PUT',
    'id' => 'putGrupoListForm'])}}
    <table class="table table-hover table tableCheckbox">
        @foreach ($grupos as $grupo)
            <tr>
                <td>{{Form::label('grupos', $grupo->descripcion, ['class' => 'form'])}}</td>
                <td>{{Form::checkbox('grupos[]', $grupo->id, in_array($grupo->id, $userGrupos) === TRUE ? TRUE : FALSE)}}</td>
            </tr>
        @endforeach
    </table>
{{Form::close()}}
