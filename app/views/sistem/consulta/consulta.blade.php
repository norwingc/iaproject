@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<h3><i class="fa fa-angle-right"></i>Consulta Realizadas por Dr. {{ Auth::user()->usuariodoctor->nombre .' '. Auth::user()->usuariodoctor->apellido }}</h3>  

	<div class="row">
		<div class="col-md-12">
	  	 	<div class="content-panel">
	  	  		<h4><i class="fa fa-angle-right"></i>Consultas</h4>
	  	  	 	<hr>
	  	  	 	<table class="table table-hover" id="consultas">
					<thead>
			            <tr>
			                <th>Paciente</th>
			                <th>Apellido</th>
			                <th>Cedula</th>			               	
			               	<th>Sintomas</th>
			               	<th>Tratamiento</th>
			               	<th>Acciones</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($consultas as $value)
				        	<?php 
								$paciente = Paciente::where('id', $value->paciente_id)->first();
								$doctor = Doctor::where('id', $value->doctor_id)->first(); 
							?>
							<tr>
								<td><a href="{{ URL::to('paciente/search/'. $paciente->id)}}" target="new">{{ $paciente->nombre }}</a> </td>
								<td>{{ $paciente->apellido }}</td>
								<td>{{ $paciente->cedula }}</td>
								<td>{{ $value->sintomas }}</td>
								<td>{{ $value->tratamiento }}</td>
								<td><a href="{{ URL::to('consulta/search/'.$value->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Ver</a></td>
							</tr>
			        	@endforeach
			        </tbody>    
	  	  	 	</table>
	  	  	</div>
	  	</div>  
  	</div>	 	
</section>
@stop
@section('js')
<script type="text/javascript">	
    $('#consultas').dataTable({
    	"language": {
            "url": "http://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Spanish.json"
        }
    });	
</script>
@stop