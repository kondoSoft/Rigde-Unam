@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection

@section('style')
     <link type="text/css" href="{{asset('/css/bootstrap-timepicker.css')}}" />
@endsection

@section('titulo')
    Horario escolar
@endsection

@section('panel-body')
    @include('horarioEscolar._form')
@endsection

@section('btnSave')
    {{Form::button('Guardar', ['class' => 'btn btn-success'])}}
@endsection

@section('btnNext')
    <a href="#" class="btn btn-info">Siguiente</a>
@endsection
@section('javascript')
     <script type="text/javascript" src="{{asset('/js/bootstrap-timepicker.js')}}"></script>
     <script type="text/javascript">
          $('.timepicker1').timepicker({
               showMeridian: false,
               defaultTime: false,
               disableFocus: true,
               template: true
          });
     </script>
@endsection
