<div class="panel panel-default">
     <div class="panel-heading">
          <h3>Matricula por Turno ENP</h3>
     </div>
     <div class="panel-body">
          <div class="col-md-8 col-md-offset-2">
               <table class=" table table-hover table-condensed">
                    <thead>
                         <tr>
                              <th width="20%" >Grado / Area</th>
                              <th width="20%">Total Grupo</th>
                              <th width="20%">Turno Matutino</th>
                              <th width="20%">Turno Vespertino</th>
                              <th width="20%">Turno Mixto</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td>4 <sup>to</sup></td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                         <tr>
                              <td>5 <sup>to</sup></td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                         <tr>
                              <td>6 <sup>to</sup> Area I</td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                         <tr>
                              <td>6 <sup>to</sup> Area II</td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                         <tr>
                              <td>6 <sup>to</sup> Area III</td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                         <tr>
                              <td>6 <sup>to</sup> Area IV</td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                              <td>
                                   <input type="text" class="form-control">
                              </td>
                         </tr>
                    </tbody>
               </table>
               <table class="table table-hover">
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
                         </tr>
                    </thead>
                    <tbody>
                         @for ($i=1; $i < 10; $i++)
                              <tr>
                                   <td>Grupo {{$i}}</td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control"></td>
                              </tr>
                         @endfor
                    </tbody>
               </table>
          </div>
     </div>
</div>
