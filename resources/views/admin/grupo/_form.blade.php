<div class="container top">
	<div class="row">
		<div class=" col-xs-12 col-sm-8">
		    <div class="row">
			    <div class="alert alert-info col-md-6 col-xs-12">
			    	<strong>Los campos marcados con * son obligatorios</strong>
			    </div>
		    </div>
		    <div class="row col-md-12">
		    	<div class="form-group" >
                    {{Form::label('nombre', 'Nombre del grupo*')}}
                    {{Form::text('nombre', null, ['class' => 'form-control', 'required'])}}
				</div>
				<div class="form-group" >
                    {{Form::label('descripcion', 'Nombre del grupo*')}}
                    {{Form::textArea('descripcion', null, ['class' => 'form-control', 'required' => true, 'rows' => '3'])}}
				</div>
		        <div class="form-group">
                    {{Form::submit('Guardar', ['class' => 'btn btn-success'])}}
			  	</div>
			</div>
		</div>
	</div>
</div>
