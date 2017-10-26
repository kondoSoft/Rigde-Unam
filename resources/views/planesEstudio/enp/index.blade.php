@extends('layouts.temporal')

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h3>Planes de Estudio Escuela Nacional Preparatoria</h3>
          </div>
          <div class="panel-body">
               @include('planesEstudio.enp._form')
          </div>
     </div>

@endsection

@section('javascript')
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
