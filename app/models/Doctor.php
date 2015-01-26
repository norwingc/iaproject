<?php 
	class Doctor extends Eloquent {
		protected $guarded = array();
		public static $rules = array();
		protected $connection = 'datos';
		protected $table = 'doctores';

		public function usuario(){
			return $this->belongsTo('User');
		}
	}
?>
