<!-- Formulario para 4to año-->

<div class="form">
     @foreach ($materias as $key => $value)

          <div class="col-md-4">
               <table class="table table-hover tableCheckbox">
                    <thead>
                         <tr>
                              <th class="tituloTabla" colspan="2">{{$key}} AÑO</th>
                         </tr>
                         <tr>
                              <th>Materia</th>
                              <th>Plan de estudio</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td>Matematicas IV</td>
                              <td><input type="checkbox" name="" value=""></td>
                         </tr>
                         <tr>
                              <td>Fisica III IV</td>
                              <td><input type="checkbox" name="" value=""></td>
                         </tr>
                         <tr>
                              <td>Informatica IV</td>
                              <td><input type="checkbox" name="" value=""></td>
                         </tr>
                    </tbody>
               </table>
          </div>
     @endforeach
</div>
