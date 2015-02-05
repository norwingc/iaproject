@extends('templates.maintemplate')
@section('titulo')
  Inicio - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<section class="wrapper">
	<div class="row">
		<div class="col-lg-9 main-chart">
	       	<h3>
				<i class="fa fa-angle-right"></i>
				Bienvenido {{ Auth::user()->usuariodoctor->nombre .' '. Auth::user()->usuariodoctor->apellido }}
			</h3>  
	   				
					
			<div class="row mt">
				<!--CUSTOM CHART START -->
				<div class="border-head">
					<h3>Pacientes</h3>
				</div>
				<div class="custom-bar-chart">
					<ul class="y-axis">
						<li><span>10.000</span></li>
						<li><span>8.000</span></li>
						<li><span>6.000</span></li>
						<li><span>4.000</span></li>
						<li><span>2.000</span></li>
						<li><span>0</span></li>
					</ul>
					<div class="bar">
						<div class="title">Enero</div>
						<div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
					</div>
					<div class="bar ">
						<div class="title">Febrero</div>
						<div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
					</div>
					<div class="bar ">
						<div class="title">Marzo</div>
						<div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
					</div>
					<div class="bar ">
						<div class="title">Abril</div>
						<div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
					</div>
					<div class="bar">
						<div class="title">Mayo</div>
						<div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
					</div>
					<div class="bar ">
						<div class="title">Junio</div>
						<div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
					</div>
					<div class="bar">
						<div class="title">Julio</div>
						<div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
					</div>
				</div>
				<div class="border-head">
					<h3>Proximas Consultas</h3>
					<?php 
						$hoy = getdate(); 
						$hoy = date("Y/m/d"); 
						$consultas = Consulta::all();						
					?>	
					<style type="text/css">
						.white-panel{
							color: #2b82ad;
						}
					</style>		
					@foreach($consultas as $value)	
						<?php	
							$fecha = $hoy > $value->proxima;							
						?>	
						@if($fecha == true)					
							<div class="col-md-4 mb">					
								<div class="white-panel pn">
									<div class="white-header">
							   			<h5 style="color:#424a5d">Consulta</h5>
							 		</div>							 		
							 		<p><b>Paciente</b></p>
							 		<?php $paciente = Paciente::where('id', $value->paciente_id)->first() ?>
							 		<p><b><a href="{{ URL::to('paciente/search/'. $paciente->id) }}">{{ $paciente->nombre }}</a></b></p>
									<div class="row">
										<div class="col-md-6">
										    <p class="small mt" style="color:#424a5d">Ultima Consulta</p>
										    <p><?php $ultima = $value->created_at; $ultima = date('Y-m-d')?>{{ $ultima }}</p>
										</div>
										<div class="col-md-6">
									    	<p class="small mt" style="color:#424a5d">Proxima Consulta</p>
									    	<p>{{ $value->proxima }}</p>
									  	</div>
									</div>
								</div>
							</div><!-- /col-md-4 -->
						@endif	
					@endforeach
				</div>				
			</div><!-- /row -->
		</div><!-- /col-lg-9 END SECTION MIDDLE -->
	              
	                 
		<div class="col-lg-3 ds">
	        <!--COMPLETED ACTIONS DONUTS CHART-->
			<h3>Ultimas Consultas</h3>
                            
         	<!-- First Action -->
          	@foreach($consultas as $value)
          		<?php $paciente = Paciente::where('id', $value->paciente_id)->first(); ?>
				<div class="desc">
					<a href="{{ URL::to('consulta/search/'. $value->id) }}">
					  	<div class="thumb">
					  		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
					  	</div>
					  	<div class="details">
					  		<?php 
								$fecha = $value->created_at;									
							?>  
					  		<p><muted>{{ date_format($fecha, 'd-m-Y'); }}</muted><br/>
					  		   <a href="{{ URL::to('paciente/search/'. $paciente->id) }}">{{ $paciente->nombre }}</a> {{ substr($value->sintomas, 0, 30); }}... <br/>
					  		</p>
					  	</div>
					</a>  	
				</div>
			@endforeach
          
            <div id="calendar" class="mb">
                <div class="panel green-panel no-margin">
                    <div class="panel-body">
                        <div id="my-calendar"></div>
                    </div>
                </div>
            </div>
	                  
		</div><!-- /col-lg-3 -->
	</div><!-- /row -->
</section>


	 


@stop
@section('js')
{{ HTML::script('js/zabuto_calendar.js') }}
<script type="application/javascript">	
var eventData = [
   {
     "date": "2015-01-01",
     "badge": false,
     "title": "Example 1"
   },
   {
     "date": "2015-01-02",
     "badge": true,
     "title": "Example 2"
   }
];
    $(document).ready(function () {  
	      
    	$("#my-calendar").zabuto_calendar({
    		data: eventData,
       		language: "es",
			year: 2015,
			today: true,
			
    	});
     });	
</script>
@stop
