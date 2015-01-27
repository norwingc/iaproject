@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">  
<section class="wrapper">
	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<h3><i class="fa fa-angle-right"></i>Estadisticas</h3> 

	<!-- page start-->
	<div id="morris">
		<div class="row mt">
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i>Enfermedades</h4>
					<div class="panel-body">
						<div id="enfermedades" class="graph"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i> Pacientes Atendidos</h4>
					<div class="panel-body">
						<div id="hero-bar" class="graph"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt">
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i> Enfermedades Con respecto al año pasado</h4>
					<div class="panel-body">
						<div id="hero-area" class="graph"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="content-panel">
					<h4><i class="fa fa-angle-right"></i> Consultas atendidas por doctores</h4>
					<div class="panel-body">
						<div id="hero-donut" class="graph"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page end-->
</section>
@stop	

@section('js')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
	{{ HTML::script('js/morris-conf.js') }}

@stop