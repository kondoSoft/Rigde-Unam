
	<div class="row">
		<div class="col-md-12">
			<h3>Registro de Indicadores</h3>
			<form  name="indicadorForm">
			<div ng-show="formIndi">
				<div class="row">
				  <div class="form-group col-md-4{{ $errors->has('nombre') ? ' has-error' : '' }}">
                      {{Form::label('nombre', 'Nombre del indicador *')}}
                      {{Form::text('nombre', null, ['class' => 'form-control', 'required'])}}
                      @if ($errors->has('nombre'))
                          <span class="help-block">
                              <strong>{{ $errors->first('nombre') }}</strong>
                          </span>
                      @endif
				  </div>
				  <div class="form-group col-md-4{{ $errors->has('clave') ? 'has-error' : '' }}">
                      {{Form::label('clave', 'Clave *')}}
                      {{Form::text('clave', null, ['class' => 'form-control', 'required'])}}
                      @if ($errors->has('clave'))
                          <span class="help-block">
                              <strong>{{ $errors->first('clave') }}</strong>
                          </span>
                      @endif
                  </div>
				  <div class="form-group col-md-4{{ $errors->has('tipo') ? 'has-error' : '' }}">
                      {{ Form::label('tipo', 'Tipo de indicador *')}}
                      {{ Form::text('tipo', null, ['class' => 'form-control', 'required'])}}
                      @if ($errors->has('tipo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('tipo')}}</strong>
                          </span>
                      @endif
				  </div>
				</div>
			<div class="row">
				<div class="form-group col-md-4{{ $errors->has('origen') ? 'has-error' : '' }}">
                    {{ Form::label('origen', 'Origen del indicador *') }}
                    {{ Form::textArea('origen', null, ['class' => 'form-control', 'style' => 'resize : none', 'rows' => '3', 'required']) }}
                    @if ($errors->has('origen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('origen') }}</strong>
                        </span>
                    @endif
				</div>
				<div class="form-group col-md-4{{ $errors->has('objetivo') ? 'has-error' : '' }}">
                    {{ Form::label('objetivo', 'Objetivo *')}}
                    {{ Form::textArea('objetivo', null, ['class' => 'form-control', 'style' => 'resize : none', 'rows' => '3', 'required']) }}
                    @if ($errors->has('objetivo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('objetivo')}} </strong>
                        </span>
                    @endif
				</div>
				<div class="form-group col-md-4{{ $errors->has('pertinencia') ? 'has-error' : '' }} ">
                    {{ Form::label('pertinencia', 'Pertinencia *')}}
                    {{ Form::textArea('pertinencia', null, ['class' => 'form-control', 'style' => 'resize : none', 'rows' => '3', 'required']) }}
                    @if ($errors->has('pertinencia'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pertinencia')}} </strong>
                        </span>
                    @endif
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6" show-errors>
				   	<label for="resseg">Responsable del Seguimiento</label>
				   	<select  required id="resseg" name ="resseg" multiple ng-model="user.resseg" ng-options="item.rincargo for item in respseg track by item.rinid" class="form-control">
				    	 	      <option value="">-- Selecciona un responsable --</option>
				   	</select>
				</div>
				<div class="form-group col-md-6" show-errors>
				   	<label for="reseje">Responsable de la Ejecución </label>
				   	<select required id="reseje" name="reseje" multiple ng-model="user.reseje" ng-options="item.rincargo for item in respeje track by item.rinid" class="form-control">
				    	 	      <option value="">-- Selecciona un responsable --</option>
				   	</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4" show-errors>
				   	<label for="periodicidad">Periodicidad / Fechas de medición *</label>
				   	<input required type="text" class="form-control" id="periodicidad" name="periodicidad" placeholder="" ng-model="periodicidad">
				</div>
				<div class="form-group col-md-4" show-errors>
				   	<label for="dimension">Dimensión*</label>
				   	<select required id="dimension" name="dimension" ng-model="user.dimension" ng-options="item.dimnombre for item in dimension track by item.dimid" class="form-control">
				    	 	      <option value="">-- Selecciona una dimensión --</option>
				   	</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
				   	<label for="extra">Información extra</label>
				   	<textarea  class="form-control" rows="3" id="extra" name="extra" ng-model="extra"></textarea>
				</div>

			</div>

			<!--
			<div class="row">
				<div class="col-md-3">
					<label for="planestudios">Plan de estudios*</label>
				</div>
			</div>-->
			<!--<div class="row">

				<div class="form-group col-md-6" >
				   	-->
				   	<!--<select required id="planestudios" name="planestudios" multiple ng-model="user.planestudios" ng-options="item.descplanestudio for item in planes track by item.idcplanestudio" class="form-control">
				    	 	      <option value="">--Selecciona los planes de estudio--</option>
				   	</select>-->
				   	 <!--<input class="form-control" ng-model="selectedState" bs-options="item.descplanestudio for item in planes" placeholder="Clave Plantel-Clave Plan" data-limit="10" data-placement="auto top" bs-typeahead type="text">
				   	 <input class="btn btn-success" ng-click="agregarPlan(selectedState);" type="button" value="Agregar">
				</div>
				<div class="form-group col-md-6">
				 	<input type="hidden" id="planestudios" name="planestudios" ng-model="plan.gclaveisi">
				   	<span>plan.gclaveisi</span>
				</div>

			</div>-->

			<button type="submit" class="btn btn-primary" ng-click="saveIndicador()">Guardar</button>

			</div>
			</form>
			<form name="formForm">
				<div ng-show="formuFormula">
					<h4>Fórmula del indicador</h4>
					<span class="label label-info" ng-show="textinfoform">textinfoform</span>
					<div class="row">
						<div class="form-group col-md-4" show-errors>
							<label for="porcentual">Fórmula porcentual*</label>
							<input type="checkbox" class="form-control" id="porcentual" name="porcentual" ng-model="porcentual" ng-change="changePorcentual();">
						</div>
					</div>
					<div class="row">
						<input type="hidden" class="form-control" name="idindicador" ng-model="idindicador" >
						<div class="form-group col-md-4" show-errors>
					   		<label for="formulacalculo">Fórmula para su cálculo</label>
					   		<textarea required ng-change="parserFormula();" name="textFormula" ng-model="textFormula" class="form-control" rows="3" id="formulacalculo"></textarea>
					   		<span class="text-info">Variables encontradas : variablesform</span>
						</div>

						<div class="form-group col-md-4" show-errors>
						   	<label for="variablesformula">Variables de la fórmula</label>
						   	<textarea required class="form-control" rows="3" name="textVariables" ng-model="textVariables" id="variablesformula"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4" ng-repeat="item in inputsformula" show-errors>
							  <label for="var">Variable item.label</label>
							  <input required  type="text" class="form-control" name="var" ng-model="item.name">
						</div>
						<div class="col-md-12">
							<button type="submit" ng-click="saveFormula();" class="btn btn-primary">Agregar Fórmula</button>
						</div>
						<div class="col-md-12" ng-show="textinfoform">
							<a href="#/listaindicadores">Lista de Indicadores</a>
						</div>

					</div>
				</div>

			</form>
		</div>
	</div>
