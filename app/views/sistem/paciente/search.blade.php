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
	  	</div>  
  	</div>

</section>
@stop