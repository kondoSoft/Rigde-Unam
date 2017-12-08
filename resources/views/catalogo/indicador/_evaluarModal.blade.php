<div class="modal-header">
    <h4 class="modal-title">Evaluar</h4>
</div>
<div class="modal-body">
    <div class="panel panel-default">
      <div class="panel-body">
          <form class="" action="index.html" method="post">
              <div class="form-group">
                  {{ Form::label('formula', '¿La ISI cuente con los documentos relativos a la seguridad del inmueble, requeridos por las normas federales y municipales?') }}
                  <div class="radio">
                    <label>{{ Form::radio('existe', 'si', false)}}Cumple / Existe</label>
                  </div>
                  <div class="radio">
                    <label>{{ Form::radio('existe', 'No', false)}}No cumple / No existe</label>
                  </div>
              </div>
          </form>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="" action="index.html" method="post">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('im', '¿Cumple con la imagen urbana adecuada?') }}
                        <div class="checkbox">
                            <label>{{ Form::checkbox('im', '35', false)}}Cumple / Existe</label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('id', '¿Cumple con una identidad arquitectónica?') }}
                        <div class="checkbox">
                            <label>{{ Form::checkbox('id', '35', false)}}Cumple / Existe</label>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('m', '¿Cumple con el mantenimiento adecuado?') }}
                        <div class="checkbox">
                            <label>{{ Form::checkbox('m', '30', false)}}Cumple / Existe</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group square tile">
                        {{ Form::label('formula', 'Fórmula') }}
                        <p class="form-control-static">
                            F = IM(35%) + ID(35%) + M(30%) = 100%
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-footer">
    {{ Form::button('Guardar', ['class' => 'btn btn-success'])}}
    <a class="btn btn-warning" data-dismiss="modal">Cerrar</a>
</div>
