<?php 
	class Paciente extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $connection = 'datos';
		protected $table = 'pacientes';
	}
?>
