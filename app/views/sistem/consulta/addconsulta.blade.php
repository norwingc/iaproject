@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">
@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
	<h3><i class="fa fa-angle-right"></i>Agregar Consulta</h3>  
		
	<div class="row mt">
  		<div class="col-lg-8" style="z-index: 9">
         	<div class="form-panel addpaciente">
         	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

         		{{ Form::open(array('url' => 'consulta/save', 'class' => 'form-horizontal style-form')) }}             	
                  	<div class="form-group">
	                	<label class="col-sm-2 col-sm-2 control-label">Paciente</label>
	                  	<div class="col-sm-10" style="z-index: 9">
	                  		<?php $pacientes = Paciente::all(); ?>
	                    	<select name="paciente" id="paciente" class="form-control" data-placeholder="Seleccionar Paciente...">
	                    		<option value=""></option>
	                    		@foreach($pacientes as $value)
	                    			<option value="{{ $value->id }}">{{ $value->nombre . ' ' . $value->apellido }}</option>
	                    		@endforeach
	                    	</select>
	                    	<div style="text-align:right; margin-top: 10px">
	                    		<a class="btn btn-primary" href="#" id="infopaciente">Ver Informacion De Paciente</a>
	                    	</div>	
						</div>
						<div class="icoaddpaciente">
							<a href="#" data-toggle="modal" data-target="#modaladdpaciente">Agregar Paciente<i class="fa fa-chevron-circle-right"></i></a>
						</div>
                  	</div> 
                  	<div class="form-group">
                  		<label class="col-sm-2 control-label">Sintomas</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('sintomas', Input::old('sintomas'), array('class' => 'form-control', 'placeholder'=> 'Sintomas del Paciente', 'id' =>'sintomas_google')) }}  	
              				<div style="text-align:right; margin-top: 10px">
	                    		<a class="btn btn-primary" href="#" id="ver_sintomas">Ver Todos Los sintomas</a>
	                    	</div>	
              			</div>              			
                  	</div>
                  	<div class="form-group">
                  		<label class="col-sm-2 control-label">Descripcion</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=> 'Descripcion de los sintomas')) }}  	
              			</div>              			
                  	</div>
                  	<div class="form-group">
                  		<label class="col-sm-2 control-label">Tratamiento</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('tratamiento', Input::old('tratamiento'), array('class' => 'form-control', 'placeholder'=> 'Tratamiento del Paciente', 'id' => 'tratamiento')) }}  	
              				<div style="text-align:right; margin-top: 10px">
	                    		<a class="btn btn-primary" data-toggle="modal" href="#" id="tratamiento_sugerido">Ver Tratamiento sugerido</a>
	                    	</div>	 
              			</div> 
                  	</div>                  	
                  	<div class="form-group">
                  		<label class="col-sm-2 control-label">Receta</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('receta', Input::old('receta'), array('class' => 'form-control', 'placeholder'=> 'Receta del Paciente')) }}  	
              			</div> 
                  	</div>  
                  	<div class="form-group">
                  		<label class="col-sm-12  control-label">Posibles enfermedades</label><br>
                  		<ul class="enfermedad_posible">
                  			<li class="hidden" id="quitar">nada</li>
                  		</ul>           			
                  	</div>                	
                  	<div class="form-group">
                  		{{ Form::submit('Realizar Consulta' , array('class'=> 'btn btn-primary col-sm-offset-2')) }}
                  	</div>  
              {{ Form::close() }}
          </div>
  		</div><!-- col-lg-8 --> 
  		<div class="col-lg-4 computer">  			
			<div class="row mt prediccion">
				<div class="col-sm-12 text-center">
					<label class="control-label">Activar Predicción de tratamiento</label>
					<div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
						<input type="checkbox" id="prediccion" checked/>
					</div>
				</div>
			</div>  
			<div class="row mt computer">
				<div class="form-panel no-visible" id="cuadroprediccion">
					<div class="cuadros">
						
					</div>

					<div class="cuadro vertodos">
						{{ Form::open(array('url' => 'consulta/view/tag', 'class' => 'form-horizontal style-form', 'target' => '_blank')) }}             							
							<input type="hidden" name="q" id="input_vertodos" /> 							 
							<input name="btnG" value="Ver Todos..." class="btn_google"  id="btn_vertodos" type="submit" />
						{{ Form::close() }}
					</div>
					<div class="cuadro vertodos">
						<form method="get" action="http://www.google.com/search" target="_blank">
							<input type="hidden" name="q" id="busqueda_google" /> 
							<input type="hidden" name="hl" value="es" /> 
							<input name="btnG" value="Buscar en google..." class="btn_google"  id="btn_google" type="submit" />
						</form>
					</div>
				</div>	
			</div>	
			<div class="boton_prediccion">
				<button type="button" class="btn btn-primary" id="mostrarprediccion">Mostrar Ultimas Consultas <i class="fa fa-chevron-circle-right"></i></button>
			</div>	
			
  		</div>     	
  	</div><!-- /row -->

</section>

{{-- MODAL  --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modaladdpaciente">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar Paciente</h4>
      		</div>
      		<div class="modal-body">
      			{{ Form::open(array('url' => 'paciente/save', 'class' => 'form-horizontal style-form', 'id'=>'form_paciente')) }}
					<h4><i class="fa fa-angle-right"></i>Ficha de Identificacion</h4>  
         	 		<div class="form-group">
		    			<label class="col-sm-1 control-label">Nombres</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre del Paciente', 'id'=>'nombre')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Edad</label>
		    			<div class="col-sm-2">
		    				{{ Form::number('edad', Input::old('edad'), array('class' => 'form-control', 'placeholder'=> 'Edad del Paciente','min' => '1', 'max' => '120', 'id'=>'edad')) }}  
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
		    				{{ Form::text('ocupacion', Input::old('ocupacion'), array('class' => 'form-control', 'placeholder'=> 'Ocupacion del Paciente','id'=>'ocupacion')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Nacionalidad</label>
		    			<div class="col-sm-2">
		    				{{ Form::text('nacionalidad', Input::old('nacionalidad'), array('class' => 'form-control', 'placeholder'=> 'Nacionalidad del Paciente', 'id'=>'nacionalidad')) }}  
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
		    				{{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control', 'placeholder'=> 'Direccion del Paciente', 'id'=>'direccion')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-1 control-label">Cedula</label>
		    			<div class="col-sm-2">
		    				{{ Form::text('cedula', Input::old('cedula'), array('class' => 'form-control cedula', 'placeholder'=> 'Cedula del Paciente', 'id'=>'cedula')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Persona Responsable</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('responsable', Input::old('responsable'), array('class' => 'form-control', 'placeholder'=> 'Persona Responsable', 'id'=>'responsable')) }}  
		    			</div>	
		    			<label class="col-sm-1 control-label" style="padding: 7px 0px">Fecha Ingreso</label>
		    			<div class="col-sm-2">
		    				{{ Form::input('date', 'ingreso', Input::old('ingreso'), array('class' => 'form-control', 'placeholder'=> 'Fecha de Ingreso', 'id'=>'ingreso')) }}  
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
		       					<li>Enfermedades</li>
		       				</ul>
		       			</div>
		       			<div class="col-sm-5">
		       				{{ Form::textarea('antecedentes', Input::old('antecedentes'), array('class' => 'form-control', 'placeholder'=> 'Antecedentes', 'id'=>'antecedentes')) }}  	
		       			</div>
		       		</div>

		       		{{--  patologicos --}}
		       		<h4 class="subtitul"><i class="fa fa-angle-right"></i>Personales Patologicos</h4> 
		       		<div class="form-group">
		       			<div class="col-sm-8" style="border-right:1px solid #062f3c">
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Enf. Infecciosas de la infancia</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('infancia', Input::old('infancia'), array('class' => 'form-control', 'placeholder'=> 'Enf. Infecciosas de la infancia', 'id'=>'infancia')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Intervenciones Quirurjigas</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('intervenciones', Input::old('intervenciones'), array('class' => 'form-control', 'placeholder'=> 'Intervenciones Quirurjigas', 'id'=>'intervencion')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Traumatismo</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('traumatismo', Input::old('traumatismo'), array('class' => 'form-control', 'placeholder'=> 'Traumatismo', 'id'=>'traumatismo')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Transfuciones</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('transfuciones', Input::old('transfuciones'), array('class' => 'form-control', 'placeholder'=> 'Transfuciones', 'id'=>'transfuciones')) }}  
				    			</div>
		       				</div>
		       				<div class="form-group">
			       				<label class="col-sm-4 control-label">Intolerancia a medicamentos</label>
				    			<div class="col-sm-8">
				    				{{ Form::text('intolerancia', Input::old('intolerancia'), array('class' => 'form-control', 'placeholder'=> 'Intolerancia a medicamentos', 'id'=>'medicamentos')) }}  
				    			</div>
		       				</div>
		       			</div>
		       			<dvi class="col-sm-4">
		       				{{ Form::textarea('patologicos', Input::old('patologicos'), array('class' => 'form-control', 'placeholder'=> 'Enfermedades Personales Patologicos', 'id'=>'personales_patologicos')) }}  		
		       			</dvi>	
		       		</div>

		       		{{--  No patologicos --}}
		       		<h4 class="subtitul"><i class="fa fa-angle-right"></i>Personales No Patologicos</h4> 
		       		<div class="form-group">
		       			<label class="col-sm-2 control-label">Habitos Personales</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('habitos', Input::old('habitos'), array('class' => 'form-control', 'placeholder'=> 'Habitos Personales','id'=>'habitos')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Tabaquismo (dias/años)</label>
		    			<div class="col-sm-4">
		    				{{ Form::text('tabaquismo', Input::old('tabaquismo'), array('class' => 'form-control', 'placeholder'=> 'Tabaquismo','id'=>'tabaquismo')) }}  
		    			</div>
		       		</div>
		       		<div class="form-group">
		       			<label class="col-sm-1 control-label">Toxicomanias</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('toxicomanias', Input::old('toxicomanias'), array('class' => 'form-control', 'placeholder'=> 'Toxicomanias','id'=>'toxicomanias')) }}  
		    			</div>
		    			<label class="col-sm-2 control-label">Deportes (accion fisica)</label>
		    			<div class="col-sm-4">
		    				{{ Form::text('deportes', Input::old('deportes'), array('class' => 'form-control', 'placeholder'=> 'Deportes', 'id'=>'deportes')) }}  
		    			</div>
		       		</div>
		       		<div class="form-group" style="text-align:right; margin:0">
				    	{{ Form::button('Agregar Paciente' , array('class'=> 'btn btn-primary', 'id'=>'addpaciente')) }}
				    </div>
		   		{{ Form::close() }} 		      	   	
		    </div>
		</div>
	</div>
</div> 

{{-- modal sintomas --}}   		
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalsintomas">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar Sintomas</h4>
      		</div>
      		<div class="modal-body">
      			<h3><i class="fa fa-angle-right"></i>Agregar Sintomas</h3>  
      			<?php $sintomas = Sintoma::all() ?>
				<div class="form-panel">
	      			<div class="row" id="add_sintoma">
	      				@foreach($sintomas as $value)
	      					<div class="col-md-4">
	      						<input type="checkbox" value="{{ $value->sintoma }}">{{ $value->sintoma }}	      					
	      					</div>
	      				@endforeach
	      			</div>				
      			</div>
      			<div class="form-group" style="text-align:right; margin:0">
      				<a href="#" class="btn btn-primary" id="addsintomas">Agregar sintomas</a>		    		
			   	</div>
      		</div>
      	</div>
    </div>
</div>

{{-- Modal tratamiento  --}}
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modaltratamiento">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Tratamiento para pacientes</h4>
      		</div>
      		<div class="modal-body">
      			<div class="hola form-panel" id="hola">
      				
      				
      			</div>      			
      		</div>
      	</div>
    </div>
</div>
@stop
@section('js')

{{ HTML::script('js/jquery.textcomplete.min.js') }}
{{ HTML::script('js/chosen.jquery.min.js') }}
{{ HTML::script('js/bootstrap-switch.js') }}

<script type="text/javascript">
	$("#paciente").chosen()
	
	$('#sintomas_google').textcomplete([{
	    match: /(^|\s)(\w{2,})$/,
	    search: function (term, callback) {
	        var words = ['dolor','sindrome','alergia a alimentos', 'alergia a frutas', 'alergia a frutos secos', 'sinusitis', 'alfafetoproteína','calcitonina', 'cancer de Mama', 'melanoma', 'insulinas', 'pie diabético', 'Retinopatía Diabética', 'cocaína', 'actitud inicial de los padres', 'sospecha de problemas con drogas', 'laringitis', 'deshidratación', 'estreñimiento', 'hemorroides', 'varices', 'mareo', 'acné', 'ampollas', 'pecas', 'quemaduras', 'candidiasis', 'ladillas', 'sífilis', 'diarrea', 'dolor abdominal', 'estreñimiento', 'gastritis', 'neumonía', 'asma Bronquial', 'bronquitis','lesiones en el Deporte', 'dolor de Rodilla', 'pubalgia', 'afasia', 'angustia', 'bulimia', 'endodoncia', 'odontología estética', 'periodoncia', 'cirugía dental preprotésica'];
	        callback($.map(words, function (word) {
	            return word.indexOf(term) === 0 ? word : null;
	        }));
	    },
	    replace: function (word) {
	    	enfermedad(word);
	        return ' '+ word + ' ';
	    }
	}]);

	function enfermedad(word){
		//ajax
	}
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