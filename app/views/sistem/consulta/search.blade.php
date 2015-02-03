@extends('templates.maintemplate')
@section('titulo')
  Consultas - Sistema de consulta a pasientes - SCP
@stop
@section('contenido')
@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<section class="wrapper site-min-height">
	<?php 
		$paciente = Paciente::where('id', $consulta->paciente_id)->first();
		$doctor = Doctor::where('id', $consulta->doctor_id)->first(); 
	?>
	<h3><i class="fa fa-angle-right"></i>Consulta del Paciente {{ $paciente->nombre . ' ' . $paciente->apellido }} # {{ $consulta->id }}</h3> 
	
	<div class="row mt">
  		<div class="col-lg-12" >
         	<div class="form-panel descripcion_consulta">
         		<p>Paciente Atendido por: <span>{{ $doctor->nombre . ' ' . $doctor->apellido }}</span></p>
         		<p>Sintomas presentado por el paciente: <span>{{ $consulta->sintomas }}</span></p>
                <p>Descripcion de la consulta: <span>{{ $consulta->descripcion }}</span></p>
         		<p>Tratamiento brindado: <span>{{ $consulta->tratamiento }}</span></p>
                <p>Receta: <span>{{ $consulta->receta }}</span></p>
         		<input type="hidden" value="{{ $consulta->tratamiento }}" id="tratamiento_descripcion">
         	</div>
         	<button class="btn btn-primary" id="add_tratamiento">Agregar tratamiento a la consulta actual</button>
        </div>
    </div>     	
	 
</section>	

@stop