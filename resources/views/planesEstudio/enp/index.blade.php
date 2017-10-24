@extends('layouts.temporal')

@section('content')

     @include('planesEstudio.enp._form')

@endsection

@section('javascript')
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
