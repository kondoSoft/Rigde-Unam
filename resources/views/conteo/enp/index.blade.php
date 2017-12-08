@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection

@section('titulo')
    Matricula por Turno ENP
@endsection

@section('panel-body')
     @include('conteo.enp._form')
@endsection

@section('btnSave')
    {{Form::button('Guardar', ['class' => 'btn btn-success'])}}
@endsection

@section('btnNext')
    <a href="#" class="btn btn-info">Siguiente</a>
@endsection

@section('javascript')
    <script src="{{ asset('js/cloneRows.js') }}"></script>
    <script type="text/javascript">
        $(document).on('change', '.sumMat', function(){
            var sum = 0;
            // iterate through each td based on class and add the values
            $(".sumMat").each(function() {
                var value = $(this).val();
                console.log(value);
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#totalMat').html(sum);
        });
        $(document).on('change', '.sumVes', function(){
            var sum = 0;
            // iterate through each td based on class and add the values
            $(".sumVes").each(function() {
                var value = $(this).val();
                console.log(value);
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#totalVes').html(sum);
        });
        $(document).on('change', '.sumMix', function(){
            var sum = 0;
            // iterate through each td based on class and add the values
            $(".sumMix").each(function() {
                var value = $(this).val();
                console.log(value);
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#totalMix').html(sum);
        });

    </script>
@endsection
