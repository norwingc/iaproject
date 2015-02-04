@extends('templates.maintemplate')
@section('titulo')
  Administrador - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">
@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
	<h3><i class="fa fa-angle-right"></i>Agregar Enfermedades</h3>  
		
	<div class="row mt">
  		<div class="col-lg-12" style="z-index: 9">
         	<div class="form-panel addpaciente">
         		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
				{{ Form::open(array('url' => 'administrador/enfermedades/save', 'class' => 'form-horizontal style-form')) }} 
				 	<div class="form-group">
	                	<label class="col-sm-2 control-label">Nombre de la enfermedad</label>
	                  	<div class="col-sm-8">	
							{{ Form::text('nombre_enfermedad', Input::old('nombre_enfermedad'), array('class' => 'form-control', 'placeholder'=> 'Nombre de la enfermedad',)) }}  	
						</div>						
                  	</div> 
                  	<div class="form-group">
                  		{{ Form::submit('Agregar Enfermedad' , array('class'=> 'btn btn-primary')) }}
                  	</div>  
				{{ Form::close() }}           	
			</div>
		</div>
	</div>
	<h3><i class="fa fa-angle-right"></i>Agregar Sintomas</h3>  
	<div class="row mt">
  		<div class="col-lg-12" style="z-index: 9">
         	<div class="form-panel addpaciente">
         		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
				{{ Form::open(array('url' => 'administrador/sintomas/save', 'class' => 'form-horizontal style-form')) }} 
				 	<div class="form-group">
	                	<label class="col-sm-2 control-label">Enfermedad</label>
	                  	<div class="col-sm-8">
	                  		<select name="enfermedad_id" id="enfermedad_id" class="form-control" data-placeholder="Seleccionar Enfermedad...">
	                  			<?php $enfermedades = Enfermedad::all(); ?>
	                    		<option value=""></option>								
	                    		@foreach($enfermedades as $value)
	                    			<option value="{{ $value->id }}">{{ $value->nombre }}</option>
	                    		@endforeach
	                    	</select>						
						</div>						
                  	</div> 	
				 	<div class="form-group">
	                	<label class="col-sm-2 control-label">Nombre del sintoma</label>
	                  	<div class="col-sm-8">	
							{{ Form::text('sintoma', Input::old('sintoma'), array('class' => 'form-control', 'placeholder'=> 'Nombre del sintoma',)) }}  	
						</div>						
                  	</div> 
                  	<div class="form-group">
              			<label class="col-sm-2 control-label">Tratamiento del Sintoma</label>
	                  	<div class="col-sm-8">	
							{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'placeholder'=> 'Tratamiento del sintoma',)) }}  	
						</div>						
                  	</div> 
                  	<div class="form-group">
                  		{{ Form::submit('Agregar Sintoma' , array('class'=> 'btn btn-primary')) }}
                  	</div>  
				{{ Form::close() }}           	
			</div>
		</div>
	</div>

</section>
@stop	
@section('js')

{{ HTML::script('js/chosen.jquery.min.js') }}

<script type="text/javascript">
	$("#enfermedad_id").chosen()		
</script>
@stop	