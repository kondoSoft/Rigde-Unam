<div class="col-md-12">
   <table class=" table table-hover table-condensed">
        <thead>
             <tr>
                  <th width="20%" >Grado / Area</th>
                  <th width="20%">Turno Matutino</th>
                  <th width="20%">Turno Vespertino</th>
                  <th width="20%">Turno Mixto</th>
             </tr>
        </thead>
        <tbody>
             <tr>
                  <td>4 <sup>to</sup></td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
             <tr>
                  <td>5 <sup>to</sup></td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
             <tr>
                  <td>6 <sup>to</sup> Area I</td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
             <tr>
                  <td>6 <sup>to</sup> Area II</td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
             <tr>
                  <td>6 <sup>to</sup> Area III</td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
             <tr>
                  <td>6 <sup>to</sup> Area IV</td>
                  <td>
                       <input type="text" class="form-control sumMat">
                  </td>
                  <td>
                       <input type="text" class="form-control sumVes">
                  </td>
                  <td>
                       <input type="text" class="form-control sumMix">
                  </td>
             </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>Total Grupo:</td>
                <td id="totalMat"></td>
                <td id="totalVes"></td>
                <td id="totalMix"></td>
            </tr>
        </tfoot>
   </table>
   <table class="table table-hover cloneRow">
        <thead>
             <tr>
                  <th rowspan="2">Matutino Y/o Vespertino</th>
                  <th colspan="6">Número de Alumnos</th>
             </tr>
             <tr>
                 <th>4° año</th>
                 <th>5° año</th>
                 <th>6° Área I</th>
                 <th>6° Área II</th>
                 <th>6° Área III</th>
                 <th>6° Área IV</th>
                  <th>Comandos</th>
             </tr>
        </thead>
        <tbody>
              <tr>
                   <td class="contador">Grupo </td>
                   <td><input type="text" name="grupo1[1]" class="form-control"></td>
                   <td><input type="text" name="grupo1[2]" class="form-control"></td>
                   <td><input type="text" name="grupo1[3]" class="form-control"></td>
                   <td><input type="text" name="grupo1[4]" class="form-control"></td>
                   <td><input type="text" name="grupo1[5]" class="form-control"></td>
                   <td><input type="text" name="grupo1[6]" class="form-control"></td>
                   <td align="right">
                        <button class="btn btn-danger" type="button" id="eliminar"><i class="glyphicon glyphicon-trash"></i></button>
                        <button class="btn btn-success" type="button" id="agregar"><i class="glyphicon glyphicon-plus"></i></button>
                   </td>
              </tr>
        </tbody>
   </table>
</div>
