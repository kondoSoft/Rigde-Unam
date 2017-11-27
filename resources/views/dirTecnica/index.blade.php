@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/cloneRows.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.turnosSelect2, .materiasSelect2').select2({
                theme: "bootstrap"
            });
        });
    </script>
@endsection
