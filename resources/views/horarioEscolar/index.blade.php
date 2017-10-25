@extends('layouts.temporal')

@section('style')
     <link type="text/css" href="css/bootstrap-timepicker.css" />
@endsection

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h3>Horario Escolar</h3>
          </div>
          <div class="panel-body">
               @include('horarioEscolar._form')
          </div>
     </div>
@endsection

@section('javascript')
     <script type="text/javascript" src="/js/bootstrap-timepicker.js"></script>
     <script type="text/javascript">
          $('.timepicker1').timepicker({
               showMeridian: false,
               defaultTime: '12:00'
          });
     </script>
@endsection
