@extends('templates.maintemplate')
@section('titulo')
  Pacientes - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height addpaciente">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<h3><i class="fa fa-angle-right"></i>Agregar Paciente</h3>  
	<div class="alert alert-info hidden" id="msj"></div>

	<div class="row mt">
  		<div class="col-lg-12" style="z-index: 9">
         	<div class="form-panel">
         	<ul class="bg-danger" id="error"></ul>         	
         	 	{{ Form::open(array('url' => 'paciente/save', 'class' => 'form-horizontal style-form', 'id'=>'form_paciente')) }}
					<h4><i class="fa fa-angle-right"></i>Ficha de Identificacion</h4>  
         	 		<div class="form-group">
		    			<label class="col-sm-1 control-label">Nombres</label>
		    			<div class="col-sm-5">
		    				{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre del Paciente', 'id'=>'nombre')) }}  
		    			</div>
		    			<label class="col-sm-1 control-label">Edad</label>
		    			<div class="col-sm-2">
		    				{{ Form::text('edad', Input::old('edad'), array('class' => 'form-control numero', 'placeholder'=> 'Edad del Paciente', 'id'=>'edad')) }}  
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
</section>	
@stop
@section('js')	
	{{ HTML::script('js/jquery.textcomplete.min.js') }}
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
	  $(function() {
	    $( "#sortable1, #sortable2" ).sortable({
	      connectWith: ".connectedSortable"
	    }).disableSelection();
	  });
  </script>
  <script type="text/javascript">
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
@stop