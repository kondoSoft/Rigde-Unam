
<h3>Planes de Estudio Escuela Nacional Preparatoria</h3>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
     @foreach ($enp as $semestre => $value)
          <div class="panel panel-default">
               <div class="panel-heading" role="tab" id="heading{{$semestre}}">
                    <h4 class="panel-title">
                         <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$semestre}}" aria-expanded="false" aria-controls="collapse{{$semestre}}">
                              {{$semestre}} Año
                         </a>
                    </h4>
               </div>
               <div id="collapse{{$semestre}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$semestre}}">
                    <div class="panel-body">
                         <div class="panel-body">
                              @foreach ($value as $opcion => $materia)
                                   <div class="col-md-10 col-md-offset-1">
                                             <table class="table table-hover table-condensed tableCheckbox">
                                                  <thead>
                                                       <tr>
                                                            <th colspan="2">{{$opcion}}</th>
                                                       </tr>
                                                       <tr>
                                                            <td width="80%">Materia</td>
                                                            <td width="20%">Plan de Estudio</td>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($materia as $nombre)
                                                            <tr>
                                                                 <td>{{$nombre}}</td>
                                                                 <td align="Center"><input type="checkbox" name="" value=""></td>
                                                            </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                              @endforeach
                         </div>
                    </div>
               </div>
          </div>
     @endforeach
</div>
