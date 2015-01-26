<?php

class ConsultasController extends BaseController {

	public function save(){

		$rules	= array(
			'paciente' => 'required',
			'sintomas' => 'required',
			'tratamiento' => 'required',	
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',				
		);


		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$consulta = new Consulta();
			$consulta->doctor_id = Auth::user()->id;
			$consulta->paciente_id = Input::get('paciente');
			$consulta->sintomas = Input::get('sintomas');
			$consulta->tratamiento = Input::get('tratamiento');

			$consulta_conocimiento = new ConsultaConocimiento();
			$consulta_conocimiento->doctor_id = Auth::user()->id;
			$consulta_conocimiento->paciente_id = Input::get('paciente');
			$consulta_conocimiento->sintomas = Input::get('sintomas');
			$consulta_conocimiento->tratamiento = Input::get('tratamiento');

			$consulta->save();
			$consulta_conocimiento->save();
			Session::flash('message', 'Consulta agregada');
			return Redirect::back();
		}	
	}
}
?>
