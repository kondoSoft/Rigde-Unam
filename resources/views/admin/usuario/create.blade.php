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

            {!!Form::open(['class' => 'form-horizontal top10', 'name' => 'userNewForm', 'method' => 'post'])!!}
                {!! csrf_field() !!}


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
				   	<label for="planestudios">Busca una ISI y Plan de estudios*</label>
				   	<p><span>Ejemplo: 8895-25-LICENCIADO EN PSICOLOGÍA</span></p>
				   	<!--<autocomplete name="plan" ng-model="plan" data="planisi" attr-placeholder="ISI y plan de estudios" autocomplete-required="true"></autocomplete>-->
                    {!!Form::text('plan', '', ['class' => 'form-control', 'placeholder' => 'Clave plantel-Clave Plan'])!!}
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
		    		<label for="nombre" class="cblass">Nombre*</label>
				    <input type="text"
		                class="validate form-control"
		                ng-model="user.clinombre"
		                invalid-message="'Escribe tu nombre'"
		                required-message="''"
		                id="clinombre"
		                name="nombre"
		                validate-on="dirty"
		                />
                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
				</div>

		        <div class="mussi form-group{!! $errors->has('apellidoPaterno') ? ' has-error' : '' !!}" >
		            <label for="apellidoPaterno" class="cblass">Apellido Paterno*</label>

			        <input type="text"
		                class="validate form-control"
		                ng-model="user.cliapellidopaterno"
		                invalid-message="'Apellido incorrecto'"
		                required-message="''"
		                id="apellidoPaterno"
		                name="apellidoPaterno"
						validate-on="dirty"
		                />
                        @if ($errors->has('apellidoPaterno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellidoPaterno') }}</strong>
                            </span>
                        @endif
				</div>
				<div class="mussi form-group{!! $errors->has('apellidoMaterno') ? ' has-error' : '' !!}" >
		            <label for="apellidoMaterno" class="cblass">Apellido Materno*</label>

			        <input type="text"
		                class="validate form-control"
		                ng-model="user.cliapellidomaterno"
		                invalid-message="'Apellido incorrecto'"
		                required-message="''"
		                id="apellidoMaterno"
		                name="apellidoMaterno"
						validate-on="dirty"
		                />
                        @if ($errors->has('apellidoMaterno'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellidoMaterno') }}</strong>
                            </span>
                        @endif
				</div>
				<div class="mussi form-group{!! $errors->has('email') ? ' has-error' : '' !!}">
					<label for="email" class="cblass">Correo electrónico*</label>
				    <input type="email"
				    	class="validate form-control"
				    	ng-model="user.climail"
						invalid-message="'Formato incorrecto de email'"
	                    required-message="''"
						id="email"
						name="email"
						validate-on="dirty"
				    	/>
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
				    <label for="password" class="uk-form-label cbclass">Contraseña*</label>
				   	<input type="password"
				   		id="password"
				   		name="password"
				   		ng-model="user.clicontrasena"
				   		class="validate form-control"
				   		validator="passwordValidator(user.clicontrasena,1) === true"
				   		validate-on="dirty"
	                    invalid-message="passwordValidator(user.clicontrasena)"
	                    required-message="''"

				   		/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

				</div>

				<div class="form-group{!! $errors->has('password_confirmation') ? ' has-error' : '' !!}">
				   	<label for="password_confirmation" class="cbclass">Contraseña nuevamente*</label>
				    <input type="password"
				    	ng-model="clicontrasenarepeat"
				    	class="validate form-control"
				    	id="password_confirmation"
				    	name="password_confirmation"
				    	validator="passrepeat() ===true"
	                    validate-on="dirty"
	                    invalid-message="'Contraseñas no coinciden!'"
	                    required-message="''"
	                    ng-required="user.clicontrasena?true:false"
				    	/>
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
    var funcion = function funChangeGrupoUsuario () {
        //Obtenemos el valor del grupo de usuario.
        var grupoUsuario = $(this).val();
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
        $(document).ready(function() {
            $(document).on('change', '[name="tipoUsuario"]', funcion);
            $('[name=tipoUsuario]').trigger('change');
        });
    </script>
@endsection
