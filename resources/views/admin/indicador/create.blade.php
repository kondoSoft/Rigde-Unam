@extends('layouts.crud')

@section('titulo')
    Crear indicador
@endsection

@section('panel-body')
    @include('admin.indicador._form')
@endsection

@section('panel-footer')
        <a href="{{route('admin.indicadores.index')}}">Regresar</a>

@endsection
