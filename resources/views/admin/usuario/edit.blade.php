@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Alta de usuario</h1>
		</div>
	</div>
	<div class="row">
		<div class=" col-xs-12 col-sm-8">
		    <div class="alert alert-info">
		    	<strong>Los campos marcados con * son obligatorios</strong>
		    </div>
            {!!Form::model($user, ['route' => ['admin.usuarios.update', $user->id]])!!}
                {{ method_field('PUT') }}


                <!--RADIO BUTTONS ISSI - MUSSI-->

                <div  class="form-group{!! $errors->has('tipoUsuario') ? ' has-error' : '' !!}"  ng-init="tipo=1">
                    {!!Form::label('planEstudios', 'Selecciona un grupo de Usuario')!!}
                    <div class="checkbox">
                        <label>
                            {!!Form::radio('tipoUsuario', 1, False, ['value' => 1])!!}
                            Usuario Mussi
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            {!!Form::radio('tipoUsuario', 2, True, ['value' => 2])!!}
                            Usuario ISI
                        </label>
                    </div>
                    @if ($errors->has('tipoUsuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tipoUsuario') }}</strong>
                        </span>
                    @endif
                </div>

                <!--Busqueda de ISI y Plan de estudio TIPO=2-->

		    	<div class="form-group{!! $errors->has('plan') ? ' has-error' : '' !!} isi" ng-if="tipo==2">
                    {!!Form::label('plan', 'Busca una ISI y Plan de estudios*')!!}
				   	<p><span>Ejemplo: 8895-25-LICENCIADO EN PSICOLOGÍA</span></p>
				   	<!--<autocomplete name="plan" ng-model="plan" data="planisi" attr-placeholder="ISI y plan de estudios" autocomplete-required="true"></autocomplete>-->
                    {!!Form::text('plan', null, ['class' => 'form-control', 'placeholder' => 'Clave plantel-Clave Plan'])!!}
                    @if ($errors->has('plan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('plan') }}</strong>
                        </span>
                    @endif
				</div>

			   	<div class="form-group mussi" ng-show="tipo==2">
					<p><h3 class="text-info">Agregar datos del responsable</h3></p>
				</div>
                <!--Datos mussi, en caso de seleccionar opcion 2-->
		    	<div class="form-group{!! $errors->has('nombre') ? ' has-error' : '' !!} mussi" >
                    {!!Form::label('nombre', 'Nombre*')!!}
                    {!!Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre'])!!}
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
				</div>

		        <div class="mussi form-group{!! $errors->has('apellidoPaterno') ? ' has-error' : '' !!}" >
                    {!!Form::label('apellidoPaterno', 'Apellido Paterno*')!!}
                    {!!Form::text('apellidoPaterno', null, ['class' => 'form-control', 'id' => 'apellidoPaterno'])!!}
                    @if ($errors->has('apellidoPaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="mussi form-group{!! $errors->has('apellidoMaterno') ? ' has-error' : '' !!}" >
                    {!!Form::label('apellidoMaterno', 'Apellido Materno*')!!}
                    {!!Form::text('apellidoMaterno', null, ['class' => 'form-control', 'id' => 'apellidoMaterno'])!!}
                    @if ($errors->has('apellidoMaterno'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="mussi form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
                    {!!Form::label('email', 'Correo*')!!}
                    {!!Form::text('email', null, ['class' => 'form-control', 'id' => 'email'])!!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
				</div>

				<div class="col-sm-12 alert alert-warning" style="font-size:11px;">
					<strong>Por seguridad tu contraseña tiene que tener:</strong>
					<ul class="list-pass">
						<li><strong>8 caracteres</strong></li>
						<li><strong>Por lo menos un número</strong></li>
						<li><strong>Por lo menos una letra mayúscula</strong></li>
					</ul>
				</div>
                <!--Campos contraseña-->
				<div class="form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
                    {!!Form::label('password', 'Contraseña*')!!}
                    {!!Form::password('password', ['class' => 'form-control', 'id' => 'password'])!!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

				</div>

				<div class="form-group{!! $errors->has('password_confirmation') ? ' has-error' : '' !!}">
                    {!!Form::label('password_confirmation', 'Contraseña Nuevamente*')!!}
                    {!!Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation'])!!}
				</div>
                {!!Form::submit('Guardar', ['id' => 'registersubmit', 'class' => 'btn btn-success'])!!}

		</div>
	</div>

	<div class="row top30"></div>

	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-xs-12">
			<p class="text-center"><a href="#/users">Regresar a la lista</a></p>
		</div>
		<div class="col-md-3"></div>
	</div>


</div>
@endsection

@section('javascript')
    <script type="text/javascript">
    function funChangeGrupoUsuario () {
        //Obtenemos el valor del grupo de usuario.
        var grupoUsuario = $('[name="tipoUsuario"]:checked').val();
        //si es 1 (mussi), ocultaremos el campo para bsuqueda de institucion y plan de estudio
        //si es 2 (isi), ocultaremos los campos datos responsables y lo deshabilitaremos
        console.log(grupoUsuario);
        if (grupoUsuario == 1) {
            $('.isi').hide('slow/400/fast');
            $('.mussi').show('slow/400/fast');
        } else if (grupoUsuario == 2) {
            $('.mussi').hide('slow/400/fast');
            $('.isi').show('slow/400/fast');
        }
    };
    $(funChangeGrupoUsuario);
    $(document).ready(function() {
        $(document).on('change', '[name="tipoUsuario"]', funChangeGrupoUsuario);
    });
    </script>
@endsection
