@extends('layouts.app')

@section('content')
    <div class="row top50">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{$prefix}}/img/mussi_logo.png"  class="img-responsive">
        </div>
    </div>
    <div class="row top30">
        <div class=" col-md-6 col-md-offset-3">
            {!!Form::open(['class' => 'form-horizontal form-signin', 'name' => 'loginForm', 'route' => 'login'])!!}
                {!! csrf_field() !!}
                <div class="form-group col-md-12{!! $errors->has('username') ? ' has-error' : '' !!}">
                    <label for="username"><span  class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuario</label>
                    {!!Form::text('username', '', ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Usuario', 'required'])!!}
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{!! $errors->first('username') !!}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-12" {!! $errors->has('password') ? 'has-error' : '' !!}>
                    <label for="password"><span class="glyphicon glyphicon-pencil"></span> Contraseña</label>
                    {!!Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'contraseña', 'required'])!!}
                    @if ($errors->has('usuario'))
                        <span class="help-block">
                            <strong>{!! $errors->first('usuario') !!}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-12">
                    {!!Form::submit('Ingresar', ['class' => 'btn btn-lg btn-primary btn-block'])!!}
                </div>
            {!!Form::close()!!}
        </div>

    </div>
@endsection
