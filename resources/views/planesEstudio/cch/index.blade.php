@extends('layouts.temporal')

@section('content')

     <div class="panel panel-default">
          <div class="panel-heading">
               <h3>Plan y Programas Indicativos Colegio de Ciencias y Humanidades</h3>
          </div>
          <div class="panel-body">
               @include('planesEstudio.cch._form')
          </div>
     </div>

@endsection

@section('javascript')
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
