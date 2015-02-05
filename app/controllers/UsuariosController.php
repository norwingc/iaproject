<?php

class UsuariosController extends BaseController {
	
	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		$rules	= array(
			'username' => 'required|unique:usuarios',
			'password' => 'required',
			'email' => 'required|unique:usuarios',	
			'nombre' => 'required',
			'apellido' => 'required',
			'direccion' => 'required',
			'cargo' => 'required',
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',	
			'unique' => 'El :attribute ya esta en uso'			
		);

		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{

			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');

			$doctor = new Doctor();
			$doctor->nombre = Input::get('nombre');
			$doctor->apellido = Input::get('apellido');
			$doctor->direccion = Input::get('direccion');
			$doctor->cargo = Input::get('cargo');

			$user->save();
			$user->usuariodoctor()->save($doctor);

			Session::flash('message', 'Usuario agregado');
			return Redirect::back();

		}
	}

	/**
	 * [update description]
	 * @return [type] [description]
	 */
	public function update(){
		$rules	= array(
			'username' => 'required',
			'password' => 'required',
			'email' => 'required',	
			'nombre' => 'required',
			'apellido' => 'required',
			'direccion' => 'required',
			'cargo' => 'required',
			'g-recaptcha-response' => 'required|recaptcha',
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',	
			'unique' => 'El :attribute ya esta en uso'			
		);

		$validate = Validator::make(Input::all(), $rules, $message);

		if($validate->fails()){
			return Redirect::back()->withErrors($validate)->withInput();
		}else{
		

			$user = User::where('id', Auth::user()->id)->first();

			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');

			$doctor = Doctor::where('usuario_id', $user->id)->first();
			$doctor->nombre = Input::get('nombre');
			$doctor->apellido = Input::get('apellido');
			$doctor->direccion = Input::get('direccion');
			$doctor->cargo = Input::get('cargo');

			$user->save();
			$user->usuariodoctor()->save($doctor);

			Session::flash('message', 'Usuario Modificado');
			return Redirect::back();
		}	

	}
}
?>

