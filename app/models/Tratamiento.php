<?php 
	class Tratamiento extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'tratamientos';
  		protected $connection = 'datos';

  		public function enfermedad(){
			return $this->belongsTo('Sintoma');
		}
	}
?>
