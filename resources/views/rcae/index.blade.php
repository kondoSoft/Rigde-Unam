@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection

@section('titulo')
    Responsables o Coordinadores de Áreas Específicas
@endsection

@section('panel-body')
    @include('rcae._form')
@endsection

@section('btnSave')
    {{Form::submit('Guardar', ['class' => 'btn btn-success'])}}
@endsection

@section('btnNext')
    <a href="#" class="btn btn-info">Siguiente</a>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.escolaridadSelect2').select2({
                theme: "bootstrap",
                tags: true,
                placeholder: "Seleccione o ingrese escolaridad",
                allowClear: true
            });
        });
    </script>
@endsection
