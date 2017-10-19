@extends('layouts.temporal')

@section('content')
     <div class="container-fluid">
          <div class="h1">Situación actual de operación</div>
          <br>
          <div class="form-group col-md-4 ">
               <div class="checkbox">
                    <label>
                         <input type="checkbox"> Vigente.
                    </label>
               </div>
               <div class="form-group">
                    <div class="checkbox">
                         <label>
                              <input type="checkbox"> Incorporación gradual.
                         </label>
                    </div>
                    <label>Especificar en cual semestre / años se encuentra la incorporación</label>
                    <input type="text" class="form-control col-md-2"></input>
               </div>
               <div class="form-group">
                    <div class="checkbox">
                         <label>
                              <input type="checkbox"> Desincorporación gradual.
                         </label>
                    </div>
                    <label>de cuales semestres / años</label>
                    <input type="text" class="form-control"></input>
               </div>
               <div class="form-group">
                    <div class="checkbox">
                         <label>
                              <input type="checkbox"> Suspensión parcial de actividades.
                         </label>
                    </div>
                    <label>de cuáles semestres / años</label>
                    <input type="text" class="form-control"></input>
               </div>
               <div class="form-group">
                    <div class="checkbox">
                         <label>
                              <input type="checkbox"> Suspensión total de actividades.
                         </label>
                    </div>
               </div>
          </div>
     </div>

     @include('dirTecnica._form', ['turno' => 'Vespertino'])

@endsection

@section('javascript')
     <script src="{{ asset('js/cloneRows.js') }}"></script>
@endsection
