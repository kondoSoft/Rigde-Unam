@extends('layouts.crud')

@section('style')
    <link href="{{ asset('/css/jquery.dynatable.css')}}" rel="stylesheet" />
@endsection

@section('titulo')
    Lista de Indicadores
@endsection

@section('panel-body')
    @include('catalogo.indicador._list')
    <!-- Modal Structure -->
    <div id="modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <!--Contenido remoto-->
                    <div id="modal-content">
                    </div>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-warning" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{asset('/js/jquery.dynatable.js')}}" charset="utf-8"></script>
    <script src="{{asset('/js/app/ajaxSearch.js')}}" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#indicadoresTable').dynatable();
        $('#indicadoresTable').on('click', 'a', function(event) {
            event.preventDefault();
            content = $(this).data('content');
            $('#modal').modal();
            ajaxLoad($(this).attr('href'), $(this).data('content'));
        });
    });
    </script>
@endsection
