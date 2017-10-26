<div class="col-md-12">
     <div class="col-md-10 col-md-offset-1">
          <div class="form-group col-md-6">
               <label class="">Turno</label>
               <select class="form-control">
                    <option>Matutino</option>
                    <option>Vespertino</option>
                    <option>Mixto</option>
               </select>
          </div>
          <div class="form-group col-md-6">
               <label for="">Nombre del (la) Director(a) Técnico(a)</label>
               <input type="text" class="form-control" name="nombreDirector[{{$turno or ''}}]">
          </div>
          <div class="form-group col-md-6">
               <label for="">Grado academico y nombre de estudio</label>
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
               <label for="">Número de expediente</label>
               <input type="text" class="form-control" name="numExp[{{$turno or ''}}]">
          </div>
          <div class="form-group col-md-6">
               <label for="">Fecha de oficio de autorizacion como Director Técnico</label>
               <input type="text" class="form-control" name="FechaOficio[{{$turno or ''}}]">
          </div>
          <div class="form-group col-md-6">
               <label for="">Antigüedad en la Dirección Tecnica de la ISI (años)</label>
               <input type="text" class="form-control" name="FechaOficio[{{$turno or ''}}]">
          </div>

          <table class="table" id="horarios">
               <thead>
                    <tr>
                         <th colspan="3">Asignaturas y horarios que se imparte en el plan Unam</th>
                    </tr>
                    <tr>
                         <th>Clave Materia</th>
                         <th>Horario</th>
                    </tr>
               </thead>
               <tbody>
                    <tr>
                         <td>
                              <select class="form-control" name="cveMateria[1]">
                                   <option value="1511">Ciencias de la salud</option>
                                   <option value="1512">Ciencias politicas y sociales</option>
                                   <option value="1513">Derecho I</option>
                                   <option value="1514">Economia I</option>
                                   <option value="1515">Geografia I</option>
                                   <option value="1516">Psicologia I</option>
                              </select>
                         </td>
                         <td><input type="text" class="form-control" name="horario[1]"></td>
                         <td>
                              <button class="btn btn-danger" type="button" id="eliminar"><i class="glyphicon glyphicon-trash"></i></button>
                         </td>
                    </tr>
               </tbody>
          </table>
          <div class="form-group">
                   <button class="btn btn-success" type="button" id="agregar">Agregar</button>
          </div>
     </div>
</div>
