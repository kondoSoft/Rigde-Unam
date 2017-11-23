@extends('layouts.crud')

@section('titulo')
    Editar grupo
@endsection

@section('panel-body')
    {{Form::model($grupo, ['route' => ['admin.grupos.update', $grupo->id], 'method' => 'PUT'])}}
        @include('admin.grupo._form')
    {{Form::close()}}
@endsection
