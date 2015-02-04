<?php

class AdministradorController extends BaseController {

	/**
	 * [save_enfermedad description]
	 * @return [type] [description]
	 */
	public function save_enfermedad(){
		$rules	= array(
			'nombre_enfermedad' => 'required',			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',				
		);


		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{
			$enfermedad = new Enfermedad();
			$enfermedad->nombre = Input::get('nombre_enfermedad');


			$enfermedad->save();

			Session::flash('message', 'Enfermedad agregada');
			return Redirect::back();
		}
	}

	public function save_sintomas(){

		$rules	= array(
			'sintoma' => 'required',			
			'enfermedad_id' => 'required',			
			'descripcion' => 'required',			
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',				
		);
		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$sintoma = new Sintoma();
			$tratamiento = new Tratamiento();

			$sintoma->sintoma = Input::get('sintoma');
			$sintoma->enfermedad_id = Input::get('enfermedad_id');

			$tratamiento->descripcion = Input::get('descripcion');


			$sintoma->save();
			$sintoma->tratamiento()->save($tratamiento);

			Session::flash('message', 'Sintoma agregado');
			return Redirect::back();
		}
	}	
}
?>