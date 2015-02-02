@extends('templates.maintemplate')
@section('titulo')
  Pacientes - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<h3><i class="fa fa-angle-right"></i>Historial del paciente {{ $paciente->nombre .' '. $paciente->apellido }}</h3>  
	<?php $consultas = Consulta::where('paciente_id', $paciente->id)->get() ?>


	<div class="row">
		<div class="col-md-12">
	  	 	<div class="content-panel">
	  	  		<h4><i class="fa fa-angle-right"></i>Consultas</h4>
	  	  	 	<hr>
	  	  	 	<table class="table table-hover" id="consultas">
					<thead>
			            <tr>
			                <th>Doctor</th>
			                <th>Sintomas</th>
			                <th>Tratamiento</th>
			               	<th>Acciones</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($consultas as $value)
			        	<?php $doctor = Doctor::where('id', $value->doctor_id)->first() ?>
							<tr>
								<td>{{ $doctor->nombre }}</td>
								<td>{{ $value->sintomas }}</td>
								<td>{{ $value->tratamiento }}</td>
								<td><a href="{{ URL::to('consulta/search/'.$value->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Ver Consulta</a></td>
							</tr>
			        	@endforeach
			        </tbody>    
	  	  	 	</table>
	  	  	</div>
	  	  	<a href="{{ URL::to('paciente/expediente/'. $paciente->id) }}" class="btn btn-primary" style="margin-top:1em" target="new">Descargar Expediente del Paciente</a>
	  	</div>  
  	</div>

  	<h3><i class="fa fa-angle-right"></i>Modificar paciente</h3>
  	<div class="alert alert-info hidden" id="msj"></div>
  	<div class="row">
		<div class="col-md-12">
	  	 	<div class="content-panel">
	  	 		<ul class="bg-danger" id="error"></ul>    
	  	 		{{ Form::open(array('url' => 'paciente/save', 'class' => 'form-horizontal style-form', 'id'=>'form_paciente')) }}
					<h4><i class="fa fa-angle-right"></i>Ficha de Identificacion</h4>  
					<input type="hidden" id="id_paciente" value="{{ $paciente->id }}">
         	 		<div class="form-group">
		    			<label class="col-sm-1 control-label">Nombres</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('nombre', Input::old('nombre') ? Input::old(): $paciente->nombre, array('class' => 'form-control', 'placeholder'=> 'Nombre del Paciente', 'id'=>'nombre')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Edad</label>
		    			<div class="col-sm-2">
		    				{{ Form::number('edad', Input::old('edad') ? Input::old(): $paciente->edad, array('class' => 'form-control', 'placeholder'=> 'Edad del Paciente','min' => '1', 'max' => '120', 'id'=>'edad')) }}  
		    			</div>	
		    			<label class="col-sm-1 control-label">Sexo</label>
		    			<div class="col-sm-2">		    				
		    				<select name="sexo" class="form-control" id="sexo">
		    					<option value="Masculino">Masculino</option>
		    					<option value="Femenino">Femenino</option>
		    				</select>		    				
		    			</div>		
		       		</div>		       		
		       		<div class="form-group">
		       			<label class="col-sm-1 control-label">Ocupacion</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('ocupacion', Input::old('ocupacion')? Input::old(): $paciente->ocupacion, array('class' => 'form-control', 'placeholder'=> 'Ocupacion del Paciente','id'=>'ocupacion')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Nacionalidad</label>
		    			<div class="col-sm-2">
		    				{{ Form::text('nacionalidad', Input::old('nacionalidad')? Input::old(): $paciente->nacionalidad, array('class' => 'form-control', 'placeholder'=> 'Nacionalidad del Paciente', 'id'=>'nacionalidad')) }}  
		    			</div>	
		    			<label class="col-sm-1 control-label">Estado Civil</label>
		    			<div class="col-sm-2">
		    				<select name="sexo" class="form-control" id="estado_civil">
		    					<option value="Soltero">Soltero</option>
		    					<option value="Casado">Casado</option>
		    				</select>
		    			</div>	
		    			
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-1 control-label">Direccion</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('direccion', Input::old('direccion')? Input::old(): $paciente->direccion, array('class' => 'form-control', 'placeholder'=> 'Direccion del Paciente', 'id'=>'direccion')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-1 control-label">Cedula</label>
		    			<div class="col-sm-2">
		    				{{ Form::text('cedula', Input::old('cedula')? Input::old(): $paciente->cedula, array('class' => 'form-control cedula', 'placeholder'=> 'Cedula del Paciente', 'id'=>'cedula')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Persona Responsable</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('responsable', Input::old('responsable')? Input::old(): $paciente->responsable, array('class' => 'form-control', 'placeholder'=> 'Persona Responsable', 'id'=>'responsable')) }}  
		    			</div>	
		    			<label class="col-sm-1 control-label" style="padding: 7px 0px">Fecha Ingreso</label>
		    			<div class="col-sm-2">
		    				{{ Form::input('date', 'ingreso', Input::old('ingreso')? Input::old(): $paciente->ingreso, array('class' => 'form-control', 'placeholder'=> 'Fecha de Ingreso', 'id'=>'ingreso')) }}  
		    			</div>	
		       		</div>
		       		<h4><i class="fa fa-angle-right"></i>Antecedentes</h4>  


		       		{{--  Heredero --}}
		       		<h4 class="subtitul"><i class="fa fa-angle-right"></i>Heredero Familiares</h4> 
		       		<div class="form-group">
		       			<div class="col-sm-3" style="border-right:1px solid #062f3c">
		       				<ul id="sortable1" class="connectedSortable">		       					
		       					<li>Tuberculosis</li>
		       					<li>Diabetes</li>
		       					<li>Asma</li>
		       					<li>Cardiopatias</li>
		       					<li>Enf. Ematologicas</li>
		       					<li>Enf. Mentales</li>
		       					<li>Acrodisostosis</li>
		       					<li>Síndrome de Allgrove</li>
		       					<li>Daltonismo</li>
		       					<li>Ectrodactilia</li>
		       					<li>Distrofia muscular</li>
		       				</ul>
		       			</div>
		       			<div class="col-sm-4" style="border-right:1px solid #062f3c">
		       				<ul id="sortable2" class="connectedSortable">
		       					<?php 
		       						$datos = $paciente->antecedentes_drop; 
		       						$datos = explode(",", $datos);
		       					?>
		       					@foreach($datos as $value)
		       						<li>{{ $value }}</li>
		       					@endforeach	

		       				</ul>
		       			</div>
		       			<div class="col-sm-5">
		       				{{ Form::textarea('antecedentes', Input::old('antecedentes')? Input::old(): $paciente->antecedentes, array('class' => 'form-control', 'placeholder'=> 'Antecedentes', 'id'=>'antecedentes')) }}  	
		       			</div>
		       		</div>

		       		{{--  patologicos --}}
		       		<h4 class="subtitul"><i class="fa fa-angle-right"></i>Personales Patologicos</h4> 
		       		<div class="form-group">
		       			<div class="col-sm-8" style="border-right:1px solid #062f3c">
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Enf. Infecciosas de la infancia</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('infancia', Input::old('infancia')? Input::old(): $paciente->infancia, array('class' => 'form-control', 'placeholder'=> 'Enf. Infecciosas de la infancia', 'id'=>'infancia')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Intervenciones Quirurjigas</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('intervencion', Input::old('intervencion')? Input::old(): $paciente->intervencion, array('class' => 'form-control', 'placeholder'=> 'Intervenciones Quirurjigas', 'id'=>'intervencion')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Traumatismo</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('traumatismo', Input::old('traumatismo')? Input::old(): $paciente->traumatismo, array('class' => 'form-control', 'placeholder'=> 'Traumatismo', 'id'=>'traumatismo')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Transfuciones</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('transfuciones', Input::old('transfuciones')? Input::old(): $paciente->transfuciones, array('class' => 'form-control', 'placeholder'=> 'Transfuciones', 'id'=>'transfuciones')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Intolerancia a medicamentos</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('medicamentos', Input::old('medicamentos')? Input::old(): $paciente->medicamentos, array('class' => 'form-control', 'placeholder'=> 'Intolerancia a medicamentos', 'id'=>'medicamentos')) }}  
				    			</div>
		       				</div>
		       			</div>
		       			<dvi class="col-sm-4">
		       				{{ Form::textarea('personales_patologicos', Input::old('personales_patologicos')? Input::old(): $paciente->personales_patologicos, array('class' => 'form-control', 'placeholder'=> 'Enfermedades Personales Patologicos', 'id'=>'personales_patologicos')) }}  		
		       			</dvi>	
		       		</div>

		       		{{--  No patologicos --}}
		       		<h4 class="subtitul"><i class="fa fa-angle-right"></i>Personales No Patologicos</h4> 
		       		<div class="form-group">
		       			<label class="col-sm-2 control-label">Habitos Personales</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('habitos', Input::old('habitos')? Input::old(): $paciente->habitos, array('class' => 'form-control', 'placeholder'=> 'Habitos Personales','id'=>'habitos')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Tabaquismo (dias/años)</label>
		    			<div class="col-sm-4">
		    				{{ Form::text('tabaquismo', Input::old('tabaquismo')? Input::old(): $paciente->tabaquismo, array('class' => 'form-control', 'placeholder'=> 'Tabaquismo','id'=>'tabaquismo')) }}  
		    			</div>
		       		</div>
		       		<div class="form-group">
		       			<label class="col-sm-1 control-label">Toxicomanias</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('toxicomanias', Input::old('toxicomanias')? Input::old(): $paciente->toxicomanias, array('class' => 'form-control', 'placeholder'=> 'Toxicomanias','id'=>'toxicomanias')) }}  
		    			</div>
		    			<label class="col-sm-2 control-label">Deportes (accion fisica)</label>
		    			<div class="col-sm-4">
		    				{{ Form::text('deportes', Input::old('deportes')? Input::old(): $paciente->deportes, array('class' => 'form-control', 'placeholder'=> 'Deportes', 'id'=>'deportes')) }}  
		    			</div>
		       		</div>

		       		<div class="form-group" style="text-align:right; margin:0">
				    	{{ Form::button('Modificar Paciente' , array('class'=> 'btn btn-primary', 'id'=>'uppaciente')) }}
				    </div>
		   		{{ Form::close() }} 
	  	 	</div>
	  	</div>
	</div> 	  

</section>
@stop
@section('js')

{{ HTML::script('js/jquery.textcomplete.min.js') }}
{{ HTML::script('js/chosen.jquery.min.js') }}
{{ HTML::script('js/bootstrap-switch.js') }}

<script type="text/javascript">
	$("#paciente").chosen()

	$('#antecedentes').textcomplete([{
	    match: /(^|\s)(\w{2,})$/,
	    search: function (term, callback) {
	        var words = ['tuberculosis', 'diabetes', 'asma', 'cardiopatias', 'tuberculosis','ematologicas', 'mentales', 'acrodisostosis', 'allgrove', 'sindrome', 'daltonismo', 'ectrodactilia', 'muscular'];
	        callback($.map(words, function (word) {
	            return word.indexOf(term) === 0 ? word : null;
	        }));
	    },
	    replace: function (word) {
	        return ' '+ word + ' ';
	    }
	}]);
</script> 

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#sortable1, #sortable2" ).sortable({
	      connectWith: ".connectedSortable"
	    }).disableSelection();
	  });
</script>
@stop