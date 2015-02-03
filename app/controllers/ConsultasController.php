<?php

class ConsultasController extends BaseController {
	
	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){

		$rules	= array(
			'paciente' => 'required',
			'sintomas' => 'required',
			'descripcion' => 'required',
			'tratamiento' => 'required',
			'receta' => 'required',	
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
			$consulta->descripcion = Input::get('descripcion');
			$consulta->tratamiento = Input::get('tratamiento');
			$consulta->receta = Input::get('receta');

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

	/**
	 * [tratamiento description]
	 * @param  [type] $tag [description]
	 * @return [type]      [description]
	 */
	public function tratamiento($tag){
		if(Request::ajax()){	
			$sintomas = Sintoma::where('sintoma', 'LIKE', '%'.trim($tag).'%')->first();

			$tratamiento = Tratamiento::where('sintoma_id', $sintomas->id)->first();	

		 	return Response::json(array(
			 	'tratamiento' => $tratamiento
	        ));
		} 	
	}

	/**
	 * [enfermedad description]
	 * @param  [type] $tag [description]
	 * @return [type]      [description]
	 */
	public function enfermedad($tag){
		 if(Request::ajax()){	
			$sintomas = Sintoma::where('sintoma', 'LIKE', '%'.trim($tag).'%')->first();

			$enfermedad = Enfermedad::where('id', $sintomas->enfermedad_id)->first();	

		 	return Response::json(array(
			 	'enfermedad' => $enfermedad
	        ));
		} 	
	}

	/**
	 * [multiexplode description]
	 * @param  [type] $delimiters [description]
	 * @param  [type] $string     [description]
	 * @return [type]             [description]
	 */
	private function multiexplode ($delimiters,$string) {    
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}
}
?>
