@extends('layouts.temporal')

@section('content')
     <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title">@yield('titulo')</h3>
          </div>
          <div class="panel-body">
               @yield('body')
          </div>
          <div class="panel-footer">
               @yield('footer')
          </div>
     </div>
@endsection

@section('javascript')
     @yield('javascript')
@endsection
