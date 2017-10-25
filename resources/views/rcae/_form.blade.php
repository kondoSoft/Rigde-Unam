<div class="col-md-10 col-md-offset-1">
     @foreach ($areas as $nombre)
          <div class="col-md-12">
               <h4>{{$nombre}}</h4>
               <div class="form-group col-md-6">
                    <select class="form-control" name="">
                         <option value="null" disabled selected>-- Seleccione una Escolaridad --</option>
                         <option value="">Ing. en Sistemas Cómputacionales</option>
                         <option value="">Ing. en Tecnologías de la información</option>
                         <option value="">Lic. en Derecho</option>
                         <option value="">Lic. en Amdministración y Evaluación de Proyectos</option>
                    </select>
               </div>
               <div class="form-group col-md-6">
                    <input type="text" class="form-control col-md-6" placeholder="Nombre de la Persona">
               </div>
          </div>
     @endforeach
</div>
