<?php

class PacientesController extends BaseController {
	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		$rules	= array(
			'nombre' => 'required',
			'apellido' => 'required',
			'direccion' => 'required',	
			'cedula' => 'required|unique:pacientes',	
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',				
		);


		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$paciente = new Paciente();
			$paciente->nombre = Input::get('nombre');
			$paciente->apellido = Input::get('apellido');
			$paciente->direccion = Input::get('direccion');
			$paciente->cedula = Input::get('cedula');

			$paciente->save();

			return Redirect::back();
		}
	}
}
?>