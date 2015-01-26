@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<section class="wrapper site-min-height">
	<h3><i class="fa fa-angle-right"></i>Agregar Consulta</h3>  
		
	<div class="row mt">
  		<div class="col-lg-8" style="z-index: 9">
         	<div class="form-panel">
         		{{ Form::open(array('url' => 'consulta/save', 'class' => 'form-horizontal style-form')) }}             	
                  	<div class="form-group addpaciente">
	                	<label class="col-sm-2 col-sm-2 control-label">Paciente</label>
	                  	<div class="col-sm-10" style="z-index: 9">
	                  		<?php $pacientes = Paciente::all(); ?>
	                    	<select name="paciente" id="paciente" class="form-control" data-placeholder="Seleccionar Paciente...">
	                    		<option value=""></option>
	                    		@foreach($pacientes as $value)
	                    			<option value="{{ $value->id }}">{{ $value->nombre . ' ' . $value->apellido }}</option>
	                    		@endforeach
	                    	</select>
						</div>
						<div class="icoaddpaciente">
							<a href="#" data-toggle="modal" data-target="#modaladdpaciente">Agregar Paciente<i class="fa fa-chevron-circle-right"></i></a>
						</div>
                  	</div> 
                  	<div class="form-group">
                  		<label class="col-sm-2 col-sm-2 control-label">Sintomas</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('sintomas', Input::old('sintomas'), array('class' => 'form-control', 'placeholder'=> 'Sintomas del Paciente', 'id' =>'sintomas_google')) }}  	
              			</div>
                  	</div>
                  	<div class="form-group">
                  		<label class="col-sm-2 col-sm-2 control-label">Tratamiento</label>
              			<div class="col-sm-10">
              				{{ Form::textarea('tratamiento', Input::old('tratamiento'), array('class' => 'form-control', 'placeholder'=> 'Tratamiento del Paciente')) }}  	
              			</div>
                  	</div>
                  	<div class="form-group">
                  		{{ Form::submit('Realizar Consulta' , array('class'=> 'btn btn-primary col-sm-offset-2')) }}
                  	</div>  
              {{ Form::close() }}
          </div>
  		</div><!-- col-lg-8 --> 
  		<div class="col-lg-4">  			
			<div class="row mt prediccion">
				<div class="col-sm-12 text-center">
					<label class="control-label">Activar Predicciones</label>
					<div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>" data-off-label="<i class='fa fa-times'></i>">
						<input type="checkbox" id="prediccion" checked/>
					</div>
				</div>
			</div>  
			<div class="row mt">
				<div class="form-panel no-visible" id="cuadroprediccion">
					<div class="cuadros">
						
					</div>

					<div class="cuadro vertodos">
						<a href="" target="new">Ver todos...</a>
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
				<button type="button" class="btn btn-primary" id="mostrarprediccion">Mostrar Preddiccion <i class="fa fa-chevron-circle-right"></i></button>
			</div>	
			
  		</div>     	
  	</div><!-- /row -->

</section>


<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modaladdpaciente">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Agregar Paciente</h4>
      		</div>
      		<div class="modal-body">
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
				    	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				    	{{ Form::submit('Agregar Paciente' , array('class'=> 'btn btn-primary')) }}
				    </div>
		   		{{ Form::close() }} 		   	
		    </div>
		</div>
	</div>
</div>

@stop
@section('js')
{{ HTML::script('js/chosen.jquery.min.js') }}
{{ HTML::script('js/bootstrap-switch.js') }}

<script type="text/javascript">
	$("#paciente").chosen()
</script>
@stop