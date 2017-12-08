@extends('layouts.crud')

@section('style')
    <link href="{{ asset('/css/datatables.min.css')}}" rel="stylesheet" />

@endsection

@section('titulo')
     <h3>Conteo de Materiales</h3>
@endsection

@section('panel-body')
     @include('conteoMateriales._form')
@endsection

@section('panel-footer')
     pie de materiales
@endsection

@section('javascript')
    <script src="{{asset('/js/datatables.min.js')}}" charset="utf-8"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#materialesTable').DataTable({
            "language": {
                "url": "{{ asset('/js/app/dataTableLan/spanish.json')}}"
            }
        });
    });
    </script>
@endsection
