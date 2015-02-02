<?php 
	class Sintoma extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $table = 'sintomas';
  		protected $connection = 'datos';

  		public function enfermedad(){
			return $this->belongsTo('Enfermedad');
		}

		/**
		 * relacion uno a uno	
		 */
		public function tratamiento(){
			return $this->hasOne('Tratamiento', 'sintoma_id');
		}
	}
?>


