<?php 
	class Paciente extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'pacientes';
	}
?>
