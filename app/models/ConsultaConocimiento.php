<?php 
	class ConsultaConocimiento extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $connection = 'conocimiento';
		protected $table = 'consultas_conocimiento';

		public $timestamps = false; 
	}
?>

