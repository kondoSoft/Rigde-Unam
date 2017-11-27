<div class="col-md-12 row">
  <div class="form-group col-md-6">
       <label class="">Turno</label>
       {{Form::select(
           'turnos[]',
           $turnos,
           null,
           ['class' => 'form-control turnosSelect2', 'multiple' => 'multiple'])}}
  </div>
  <div class="form-group col-md-6">
       <label for="">Número de expediente</label>
       <input type="text" class="form-control" name="numExp[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Nombre del (la) Director(a) Técnico(a)</label>
       <input type="text" class="form-control" name="nombreDirector[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Grado académico y nombre de estudio</label>
       <input type="text" class="form-control" name="grado[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Horario de permanencia en la ISI (rango)</label>
       <input type="text" class="form-control" name="horario[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Antigüedad docente DGIRE</label>
       <input type="text" class="form-control" name="antDocente[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Fecha de oficio de autorizacion como Director Técnico</label>
       <input type="text" class="form-control" name="FechaOficio[{{$turno or ''}}]">
  </div>
  <div class="form-group col-md-6">
       <label for="">Antigüedad en la Dirección Tecnica de la ISI (años)</label>
       <input type="text" class="form-control" name="FechaOficio[{{$turno or ''}}]">
  </div>
</div>
<div class="col-md-12">
  <table class="table" id="horarios">
       <thead>
            <tr>
                 <th>Clave Asignatura</th>
                 <th>Horario</th>
            </tr>
       </thead>
       <tbody>
            <tr>
                 <td class="col-md-6">
                      <select class="form-control materiasSelect2" name="cveMateria[1]">
                           <option value="1511">Ciencias de la salud</option>
                           <option value="1512">Ciencias politicas y sociales</option>
                           <option value="1513">Derecho I</option>
                           <option value="1514">Economia I</option>
                           <option value="1515">Geografia I</option>
                           <option value="1516">Psicologia I</option>
                      </select>
                 </td>
                 <td><input type="text" class="form-control" name="horario[1]"></td>
                 <td align="right">
                      <button class="btn btn-danger" type="button" id="eliminar"><i class="glyphicon glyphicon-trash"></i></button>
                      <button class="btn btn-success" type="button" id="agregar"><i class="glyphicon glyphicon-plus"></i></button>
                 </td>
            </tr>
       </tbody>
  </table>
  <div class="form-group">
  </div>
</div>
