@extends('layouts.app')

@section('content')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    		<h1>@yield('titulo')</h1>
    		</div>
    	</div>

    	<div class="row top10 col-md-12">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-body">
                        <div class="form-group col-md-12">
                            @yield('panel-body')
                        </div>
    				</div>
                    <div class="panel-footer">
                        @yield('panel-footer')
                    </div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('javascript')
    @yield('javascript')
@endsection
