@extends('layouts.app')

@section('menu')
    @include('menu.menu')
@endsection

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h3>Bachillerato a Distancia UNAM</h3>
          </div>
          <div class="panel-body">
               @include('planesEstudio.bdu._form')
          </div>
     </div>


@endsection

@section('javascript')
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
