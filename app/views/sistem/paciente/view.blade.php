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
			                <th>Nombre</th>
			                <th>Apellido</th>
			                <th>Cedula</th>
			               	<th>Acciones</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($pacientes as $value)
							<tr>
								<td>{{ $value->nombre }}</td>
								<td>{{ $value->apellido }}</td>
								<td>{{ $value->cedula }}</td>
								<td><a href="{{ URL::to('paciente/search/'.$value->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Ver</a></td>
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