<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<title>Expediente</title>

	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Ruda', sans-serif;			
			color: #797979;
			font-size: 15px;
		}
		.titul{
			font-size: 1.2em;
			color: #2b82ad;
			text-align: center;
		}
		.titul img{
			width: 100px
		}
		.border{
			border-bottom: 3px solid #eff2f7;
		}
		.consulta{
			border-bottom: 3px solid #eff2f7;
		}
		.consulta .subtitul{
			color: #2b82ad;
		}
		.consulta .subtitul span{
			color:  #797979;
		}
		.fecha{
			text-align: right;
		}
		footer{
			text-align:  center;
			color: #83b81a  ;
			position: absolute;
			bottom: 0;
			margin: 0;
			display: block;
		}
	</style>
</head>
<body>
	<div>
		<h2 class="titul "><img src="{{ asset('img/logo_hospital.jpg') }}" alt="">Hospital Central</h2>	
	 	<p class="titul border">Expediente Paciente: {{ $paciente->nombre .' '. $paciente->apellido }}</p>
	 	
	 	<p>Consultas:</p>

	 	<div class="consultas">
	 		<?php $consultas = Consulta::where('paciente_id', $paciente->id)->get(); ?>
	 		@foreach($consultas as $value)
	 			<?php $doctor = Doctor::where('id', $value->doctor_id)->first(); ?>
	 			<div class="consulta">
	 				<p class="subtitul">Atendido por el doctor: <span>{{ $doctor->nombre .' '. $doctor->apellido }} </span></p>		
	 				<p class="subtitul">Sintomas</p>
	 				<p>{{ $value->sintomas }}</p>
	 				<p class="subtitul">Descripcion</p>
	 				<p>{{ $value->descripcion }}</p>
	 				<p class="subtitul">Tratamiento</p>
	 				<p>{{ $value->tratamiento }}</p>
	 				<p class="subtitul">Receta</p>
	 				<p>{{ $value->receta }}</p>
	 				<?php 
						$fecha = $value->created_at;									
					?> 
	 				<p class="fecha">Fecha: <muted>{{ date_format($fecha, 'd-m-Y'); }}</muted></p>
	 			</div>
	 		@endforeach
	 	</div>
	</div>
	<footer>
		 <p>2015 - Norwin Guerrero</p>
	</footer>
	
</body>
</html>