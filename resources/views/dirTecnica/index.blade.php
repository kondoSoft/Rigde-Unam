@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection

@section('style')
     <link type="text/css" href="{{asset('/css/bootstrap-timepicker.css')}}" />
@endsection

@section('titulo')
    Dirección técnica
@endsection
@section('panel-body')
    @include('dirTecnica._form')
@endsection

@section('btnSave')
    {{Form::submit('Agregar', ['class' => 'btn btn-success'])}}
@endsection
@section('btnNext')
    <a href="#" class="btn btn-info">Siguiente</a>
@endsection

@section('javascript')
    <script src="{{asset('/js/bootstrap-timepicker.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/cloneRows.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.turnosSelect2, .materiasSelect2').select2({
                theme: "bootstrap"
            });
        });
    </script>
    <script type="text/javascript">
         $('.timepicker1').timepicker({
              showMeridian: false,
              defaultTime: false,
              disableFocus: true,
              template: true
         });
    </script>
@endsection
