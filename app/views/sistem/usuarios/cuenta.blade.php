@extends('templates.maintemplate')
@section('titulo')
  Usuarios - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif

	<h3><i class="fa fa-angle-right"></i>Modificar Usuario {{ $user->usuariodoctor->nombre .' '. $user->usuariodoctor->apellido }}</h3> 

	<div class="row mt">
  		<div class="col-lg-12" style="z-index: 9">
         	<div class="form-panel">
         	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}
         	 	{{ Form::open(array('url' => 'usuarios/update', 'class' => 'form-horizontal style-form')) }}
		    		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Nombre de usuario</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('username', Input::old('username') ? input::old() : $user->username, array('class' => 'form-control', 'placeholder'=> 'Nombre de usuario')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Contraseña</label>
		    			<div class="col-sm-10">
		    				{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'Contraseña')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Email</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('email', Input::old('email') ? input::old() : $user->email, array('class' => 'form-control', 'placeholder'=> 'Email')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Nombres</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('nombre', Input::old('nombre') ? input::old() : $user->usuariodoctor->nombre, array('class' => 'form-control', 'placeholder'=> 'Nombres')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Apallido</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('apellido', Input::old('apellido') ? input::old() : $user->usuariodoctor->apellido, array('class' => 'form-control', 'placeholder'=> 'Apallido')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Direccion</label>
		    			<div class="col-sm-10">
		    				{{ Form::textarea('direccion', Input::old('direccion') ? input::old() : $user->usuariodoctor->direccion, array('class' => 'form-control', 'placeholder'=> 'Direccion')) }}  
		    			</div>	
		       		</div>
		       		<div class="form-group">
		    			<label class="col-sm-2 col-sm-2 control-label">Cargo</label>
		    			<div class="col-sm-10">
		    				{{ Form::text('cargo', Input::old('cargo') ? input::old() : $user->usuariodoctor->cargo, array('class' => 'form-control', 'placeholder'=> 'Cargo')) }}  
		    			</div>	
		       		</div>
		       		<div class="modal-footer">
				    	{{ Form::submit('Modificar Usuario' , array('class'=> 'btn btn-primary')) }}
				    </div>
		   		{{ Form::close() }} 		
         	</div>
        </div>
    </div>      
</section>
@stop