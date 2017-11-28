<div class="col-md-12">
   <table class=" table table-hover table-condensed">
        <thead>
             <tr>
                  <th width="20%" >Semestre / Area</th>
                  <th width="20%">Turno Matutino</th>
                  <th width="20%">Turno Vespertino</th>
                  <th width="20%">Turno Mixto</th>
             </tr>
        </thead>
        <tbody>
             <tr>
                  <td>1 <sup>er</sup> Semestre</td>
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
                  <td>2 <sup>do</sup> Semestre</td>
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
                  <td>3 <sup>er</sup> Semestre</td>
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
                  <td>4 <sup>to</sup> Semestre</td>
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
                  <td>5 <sup>to</sup> Semestre</td>
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
                  <td>6 <sup>to</sup> Semestre</td>
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
                  <th>1 <sup>er</sup> Semestre</th>
                  <th>2 <sup>do</sup> Semestre</th>
                  <th>3 <sup>er</sup> Semestre</th>
                  <th>4 <sup>to</sup> Semestre</th>
                  <th>5 <sup>to</sup> Semestre</th>
                  <th>6 <sup>to</sup> Semestre</th>
                  <th>Comandos</th>
             </tr>
        </thead>
        <tbody>
              <tr>
                   <td class="contador">Grupo </td>
                   <td><input type="text" name="grupo1[1]" class="form-control"></td>
                   <td><input type="text" name="grupo1[2]" class="form-control"></td>
                   <td><input type="text" name="grupo[3]" class="form-control"></td>
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
