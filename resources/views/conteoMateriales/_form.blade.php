<div class="col-md-12">
     @foreach ($asignaturas as $asignatura)
         <h4>{{ $asignatura->nombre}}</h4>
         <table class="table" id="materialesTable">
              <thead>
                   <tr>
                        <th>Nombre del Material</th>
                        <th>Unidad de Medida</th>
                        <th>Tipo</th>
                        <th width="10%">Cantidad Existente</th>
                   </tr>
              </thead>
              <tbody>
                  @foreach ($asignatura->materiales as $key => $material)
                      <tr>
                           <td>{{ $material->nombre }}</td>
                           <td>{{ $material->unidadMedida->nombre }}</td>
                           <td>{{ $material->tipoMaterial->nombre }}</td>
                           <td><input class="col-md-12" type="text" name="" value=""></td>
                      </tr>
                  @endforeach
              </tbody>
         </table>
     @endforeach
</div>
