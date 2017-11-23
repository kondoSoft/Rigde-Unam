@extends('layouts.crud')

@section('titulo')
    Crear nuevo grupo
@endsection

@section('panel-body')
    {{Form::open(['class' => 'form-horizontal top10 col-md-9 col-xs-12' ])}}
        @include('admin.grupo._form')
    {{Form::close()}}
@endsection

@section('panel-footer')
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4 col-xs-12">
            <p class="text-center"><a href="{{url()->previous()}}">Regresar</a></p>
        </div>
    </div>
@endsection
