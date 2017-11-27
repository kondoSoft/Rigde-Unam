<!-- Formulario para Situacion actual de operacion-->

<div class="container-fluid">
     <br>
     <div class="form-group col-md-10 col-md-offset-1 ">
         {{Form::open()}}
          <div class="radio">
               <label>
                   {{Form::radio('estado', true)}} Vigente.
               </label>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                        {{Form::radio('estado', false)}} Incorporación gradual.
                    </label>
               </div>
               <label>Especificar en cual semestre / años se encuentra la incorporación</label>
               <input type="text" class="form-control col-md-2"></input>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                         {{Form::radio('estado', false)}} Desincorporación gradual.
                    </label>
               </div>
               <label>de cuales semestres / años</label>
               <input type="text" class="form-control"></input>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                         {{Form::radio('estado', false)}} Suspensión parcial de actividades.
                    </label>
               </div>
               <label>de cuáles semestres / años</label>
               <input type="text" class="form-control"></input>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                         {{Form::radio('estado', false)}} Suspensión total de actividades.
                    </label>
               </div>
          </div>
          {{Form::close()}}
     </div>
</div>
