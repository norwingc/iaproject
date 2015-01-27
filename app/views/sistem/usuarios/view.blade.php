@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper site-min-height">

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<h3><i class="fa fa-angle-right"></i>usuarios Registrados</h3>  

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
			                <th>Cargo</th>			               	
			                <th>Email</th>			               	
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach($user as $value)
							<tr>
								<td>{{ $value->usuariodoctor->nombre }}</td>
								<td>{{ $value->usuariodoctor->apellido }}</td>
								<td>{{ $value->usuariodoctor->cargo }}</td>
								<td>{{ $value->email }}</td>
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