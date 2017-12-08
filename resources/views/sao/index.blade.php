@extends('layouts.crud')

@section('menu')
    @include('menu.menu')
@endsection
@section('titulo')
    Situación Actual de Operación
@endsection
@section('panel-body')
    {{Form::open()}}
        @include('sao._form')
    {{Form::close()}}
@endsection
@section('btnSave')
    {{Form::submit('Guardar', ['class' => 'btn btn-success'])}}
@endsection
@section('btnNext')
    <a href="#" class="btn btn-info">Siguiente</a>
@endsection

@section('javascript')
    <script src="{{asset('/js/app/sao.js')}}" charset="utf-8"></script>
@endsection
