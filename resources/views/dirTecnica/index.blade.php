@extends('layouts.temporal')

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h2>Dirección Técnica</h2>
          </div>
          <div class="panel-body">
               @include('dirTecnica._form')
          </div>
     </div>

@endsection

@section('javascript')
     <script src="{{ asset('js/cloneRows.js') }}"></script>
@endsection
