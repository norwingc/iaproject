@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<section class="wrapper site-min-height">
	
	<h3><i class="fa fa-angle-right"></i>Busqueda relacionada con: {{ substr($tag, 0, 30); }}...</h3> 
	
	<div class="row mt">
		@foreach($consultas as $value)
			<?php 
				$paciente = Paciente::where('id', $value->paciente_id)->first();
				$doctor = Doctor::where('id', $value->doctor_id)->first(); 
			?>
			<div class="col-lg-4 col-md-4 col-sm-4 mb">
				<div class="weather-2 pn">
					<div class="weather-2-header">
						<div class="row">
							<div class="col-sm-6 col-xs-6">
								<p>Paciente: {{ $paciente->nombre . ' ' . $paciente->apellido }}</p>
							</div>
							<div class="col-sm-6 col-xs-6 goright">
								<?php 
									$fecha = $value->created_at;									
								 ?>                    			
								<p class="small">{{ date_format($fecha, 'd-m-Y'); }}</p>
							</div>
						</div>
					</div><!-- /weather-2 header -->
					<div class="row centered">
						<p>Doctor que realizo la consulta: {{ $doctor->nombre .' '. $doctor->apellido }}</p>
						<p>Sintomas: {{ substr($value->sintomas, 0, 30); }}... </p>	
						<p>Tratamiento: {{ substr($value->tratamiento, 0, 30); }}... </p>		
					</div>	
					<div class="row data">
						<a href="{{ URL::to('consulta/search/'. $value->id) }}">Ver mas</a>
					</div>				
				</div>
			</div>
		@endforeach	
	</div>	 
</section>	

@stop