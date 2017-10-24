@extends('layouts.temporal')

@section('content')

     @include('planesEstudio.bdu._form')

@endsection

@section('javascript')
     <script src="{{ asset('js/tableCheckbox.js') }}"></script>
@endsection
