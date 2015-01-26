<?php

class PacientesController extends BaseController {
	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		$paciente = new Paciente();
		$paciente->nombre = Input::get('nombre');
		$paciente->apellido = Input::get('apellido');
		$paciente->direccion = Input::get('direccion');
		$paciente->cedula = Input::get('cedula');

		$paciente->save();

		return Redirect::back();

	}
}
?>