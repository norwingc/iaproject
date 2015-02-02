<?php 
	class Enfermedad extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $connection = 'datos';
		protected $table = 'enfermedades';

	/**
	* relacion uno a mucho	
	*/	
		public function enfermedadessintomas(){
			return $this->hasMany('Sintomas', 'enfermedad_id');
		}	
		
	}
?>

