@extends('layouts.temporal')

@section('content')

     {{--@include('sao._form')--}}
     {{--@include('dirTecnica._form', ['turno' => 'Vespertino'])--}}
     {{--
         @include('planesEstudio.enp.anio4._form')

     @include('planesEstudio.enp.anio5._form')
          @include('planesEstudio.enp.anio6._form')
     --}}

     @include('planesEstudio.bdu._form')

     {{--@include('planesEstudio.cch.semestre1._form')--}}

@endsection

@section('javascript')
     <script src="{{ asset('js/cloneRows.js') }}"></script>
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
