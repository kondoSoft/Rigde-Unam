@extends('layouts.temporal')

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h3>Sitación Actual de Operación</h3>
          </div>
          <div class="panel-body">
               @include('sao._form')
          </div>
     </div>

@endsection

@section('javascript')

@endsection
