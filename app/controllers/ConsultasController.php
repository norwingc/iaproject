<?php

class ConsultasController extends BaseController {

	public function save(){
		$consulta = new Consulta();
		$consulta->doctor_id = Auth::user()->id;
		$consulta->paciente_id = Input::get('paciente');
		$consulta->sintomas = Input::get('sintomas');
		$consulta->tratamiento = Input::get('tratamiento');

		$consulta->save();
		Session::flash('message', 'Consulta agregada');
		return Redirect::back();
	}
}
?>
