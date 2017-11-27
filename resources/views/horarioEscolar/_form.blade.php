<div class="col-md-12 table">
     <table class="table table-hover">
          <thead>
               <tr>
                    <th>Días</th>
                    <th colspan="2">Turno Matutino</th>
                    <th colspan="2">Turno Vespertino</th>
                    <th colspan="2">Turno Mixto</th>
               </tr>
          </thead>
          <tbody>
               @foreach ($dias as $nombre)
                    <tr>
                         <th>{{$nombre}}</th>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker form-group">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                              </div>
                         </td>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                              </div>
                         </td>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker1">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                              </div>
                         </td>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                              </div>
                         </td>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                              </div>
                         </td>
                         <td>
                              <div class="input-group bootstrap-timepicker timepicker">
                                   <input id="timepicker1" type="text" class="form-control input-small timepicker1" placeholder="23:59">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                              </div>
                         </td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</div>
