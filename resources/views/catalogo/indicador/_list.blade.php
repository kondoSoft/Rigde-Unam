<table id="indicadoresTable" class="table table-hover">
    <thead>
        <tr>
            <td width="10%">Clave indicador</td>
            <td width="70%">Nombre</td>
            <td>Opciones</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>PF 1.1</td>
            <td>Documentos relativos a la seguridad del inmueble, requeridos por las normas Federales y Municipales.</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-warning" data-content="modal-content" href="{{ route('catalogos.indicadores.detallesModal')}}">Detalles</a>
                    <a class="btn btn-default" href="#">Evaluar</a>
                </div>
            </td>
        </tr>
        @for ($i=1; $i < 40; $i++)
            <tr>
                <td>1.{{ $i }}</td>
                <td>Documentos</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-warning" data-content="modal-content" href="{{ route('catalogos.indicadores.detallesModal')}}">Detalles</a>
                        <a class="btn btn-default" data-content="modal-content" href="{{ route('catalogos.indicadores.detallesModal')}}>Evaluar</a>
                    </div>
                </td>
            </tr>
        @endfor
    </tbody>
</table>
