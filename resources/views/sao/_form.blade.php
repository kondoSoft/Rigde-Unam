<!-- Formulario para Situacion actual de operacion-->

<div class="container-fluid">
     <br>
     <div class=" radioHideText">
          <div class="radio">
               <label>
                   {{Form::radio('estado', 'vigente', true)}} Vigente.
               </label>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                        {{Form::radio('estado', 'incGradual', false )}} Incorporación gradual.
                    </label>
               </div>
               <div class="form-group">

               </div>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                         {{Form::radio('estado', 'desgradual', false)}} Desincorporación gradual.
                    </label>
               </div>
               <div class="form-group">

               </div>
          </div>
          <div class="form-group">
               <div class="radio">
                    <label>
                         {{Form::radio('estado', 'susParAct', false)}} Suspensión parcial de actividades.
                    </label>
               </div>
               <div class="form-group">

               </div>
          </div>
           <div class="radio">
                <label>
                     {{Form::radio('estado', 'susTotAct', false)}} Suspensión total de actividades.
                </label>
           </div>
     </div>
</div>
