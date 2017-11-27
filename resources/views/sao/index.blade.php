@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection
@section('titulo')
    Sitación Actual de Operación
@endsection
@section('panel-body')
   @include('sao._form')
@endsection

@section('javascript')
    <script src="{{asset('/js/app/sao.js')}}" charset="utf-8"></script>
@endsection
