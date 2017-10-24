@extends('layouts.temporal')

@section('content')

     @include('dirTecnica._form')

@endsection

@section('javascript')
     <script src="{{ asset('js/cloneRows.js') }}"></script>
@endsection
