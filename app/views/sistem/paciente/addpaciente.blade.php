@extends('templates.maintemplate')
@section('titulo')
  Pacientes - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<h3><i class="fa fa-angle-right"></i>Agregar Paciente</h3>  

	<div class="row mt">
  		<div class="col-lg-12" style="z-index: 9">
         	<div class="form-panel">
         	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
         	 	{{ Form::open(array('url' => 'paciente/save', 'class' => 'form-horizontal style-form')) }}
		    		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Nombres</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre del Paciente')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Apellidos</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control', 'placeholder'=> 'Apellidos del Paciente')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Direccion</label>
		    			<div class="col-sm-10">
		    				{{ Form::textarea('direccion', Input::old('direccion'), array('class' => 'form-control', 'placeholder'=> 'Direccion del Paciente')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Cedula</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('cedula', Input::old('cedula'), array('class' => 'form-control cedula', 'placeholder'=> 'Cedula del Paciente')) }}  
		    			</div>	
		       		</div>
		       		<div class="modal-footer">
				    	{{ Form::submit('Agregar Paciente' , array('class'=> 'btn btn-primary')) }}
				    </div>
		   		{{ Form::close() }} 		
         	</div>
        </div>
    </div>     		
</section>	
@stop
		