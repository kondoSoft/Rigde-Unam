@foreach ($areas as $nombre)
  <div class="col-md-12 row">
      {{Form::label('escolaridad', $nombre, ['class' => 'col-md-12'])}}
       <div class="form-group col-md-6">
           {{Form::select('escolaridad[]', $escolaridad, null, ['class' => 'form-control escolaridadSelect2', 'placeholder' => ''])}}
       </div>
       <div class="form-group col-md-6">
            <input type="text" class="form-control col-md-6" placeholder="Nombre de la Persona">
       </div>
  </div>
@endforeach
