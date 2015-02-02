<?php

class PacientesController extends BaseController {
	/**
	 * [save description]
	 * @return [type] [description]
	 */
	public function save(){
		 if(Request::ajax()){

		 	$registerData = array(
			            'nombre'    				=>    Input::get('nombre'),
			            'edad' 						=>    Input::get('edad'),
			            'sexo'   	 				=>    Input::get('sexo'),
			            'ocupacion'    				=>    Input::get('ocupacion'),
			            'nacionalidad'    			=>    Input::get('nacionalidad'),
			            'estado_civil'   			=>    Input::get('estado_civil'),
			            'direccion'    				=>    Input::get('direccion'),
			            'cedula'    				=>    Input::get('cedula'),
			            'responsable'    			=>    Input::get('responsable'),
			            'ingreso'    				=>    Input::get('ingreso'),
			            'antecedentes_drop'    		=>    Input::get('antecedentes_drop'),
			            'antecedentes'				=>    Input::get('antecedentes'),
			            'infancia'   				=>    Input::get('infancia'),
			            'intervencion'    			=>    Input::get('intervencion'),
			            'traumatismo'    			=>    Input::get('traumatismo'),
			            'transfuciones'   		 	=>    Input::get('transfuciones'),
			            'medicamentos'    			=>    Input::get('medicamentos'),
			            'personales_patologicos'    =>    Input::get('personales_patologicos'),
			            'habitos'    				=>    Input::get('habitos'),
			            'tabaquismo'    			=>    Input::get('tabaquismo'),
			            'toxicomanias'   			=>    Input::get('toxicomanias'),
			            'deportes'    				=>    Input::get('deportes'),
			        );

			$rules	= array(
						'nombre'    				=>    'required',
			            'edad' 						=>    'required',
			            'sexo'   	 				=>    'required',
			            'ocupacion'    				=>    'required',
			            'nacionalidad'    			=>    'required',
			            'estado_civil'   			=>    'required',
			            'direccion'    				=>    'required',
			            'cedula'    				=>    'required|unique:pacientes',
			            'responsable'    			=>    'required',
			            'ingreso'    				=>    'required',
			            'antecedentes_drop'    		=>    'required',
			            'antecedentes'				=>    'required',
			            'infancia'   				=>    'required',
			            'intervencion'    			=>    'required',
			            'traumatismo'    			=>    'required',
			            'transfuciones'   		 	=>    'required',
			            'medicamentos'    			=>    'required',
			            'personales_patologicos'    =>    'required',			          
			            'tabaquismo'    			=>    'required',
			            'toxicomanias'   			=>    'required',
			            'deportes'    				=>    'required',
						);
			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);


			$validate = Validator::make(Input::all(), $rules, $message);

			if($validate->fails()){
				 return Response::json(array(
	                'success' => false,
	                'errors' => $validate->getMessageBag()->toArray()
	            )); 
			}else{
				$paciente = new Paciente($registerData);
				$paciente->save();

				if($paciente){
					 return Response::json(array(
	                    'success'         =>     true,
	                    'message'         =>     'Te has registrado correctamente'
	                ));
				}				
			}
		}
	}
	public function update($id){
		$paciente = Paciente::find($id);

		 if(Request::ajax()){
		 	$registerData = array(
			            'nombre'    				=>    Input::get('nombre'),
			            'edad' 						=>    Input::get('edad'),
			            'sexo'   	 				=>    Input::get('sexo'),
			            'ocupacion'    				=>    Input::get('ocupacion'),
			            'nacionalidad'    			=>    Input::get('nacionalidad'),
			            'estado_civil'   			=>    Input::get('estado_civil'),
			            'direccion'    				=>    Input::get('direccion'),
			            'cedula'    				=>    Input::get('cedula'),
			            'responsable'    			=>    Input::get('responsable'),
			            'ingreso'    				=>    Input::get('ingreso'),
			            'antecedentes_drop'    		=>    Input::get('antecedentes_drop'),
			            'antecedentes'				=>    Input::get('antecedentes'),
			            'infancia'   				=>    Input::get('infancia'),
			            'intervencion'    			=>    Input::get('intervencion'),
			            'traumatismo'    			=>    Input::get('traumatismo'),
			            'transfuciones'   		 	=>    Input::get('transfuciones'),
			            'medicamentos'    			=>    Input::get('medicamentos'),
			            'personales_patologicos'    =>    Input::get('personales_patologicos'),
			            'habitos'    				=>    Input::get('habitos'),
			            'tabaquismo'    			=>    Input::get('tabaquismo'),
			            'toxicomanias'   			=>    Input::get('toxicomanias'),
			            'deportes'    				=>    Input::get('deportes'),
			        );
			$rules	= array(
						'nombre'    				=>    'required',
			            'edad' 						=>    'required',
			            'sexo'   	 				=>    'required',
			            'ocupacion'    				=>    'required',
			            'nacionalidad'    			=>    'required',
			            'estado_civil'   			=>    'required',
			            'direccion'    				=>    'required',			            
			            'responsable'    			=>    'required',
			            'ingreso'    				=>    'required',
			            'antecedentes_drop'    		=>    'required',
			            'antecedentes'				=>    'required',
			            'infancia'   				=>    'required',
			            'intervencion'    			=>    'required',
			            'traumatismo'    			=>    'required',
			            'transfuciones'   		 	=>    'required',
			            'medicamentos'    			=>    'required',
			            'personales_patologicos'    =>    'required',			          
			            'tabaquismo'    			=>    'required',
			            'toxicomanias'   			=>    'required',
			            'deportes'    				=>    'required',
						);

			$message = array(
				'required' => 'El campo :attribute es requerido',				
			);

			$validate = Validator::make(Input::all(), $rules, $message);

			if($validate->fails()){
				 return Response::json(array(
	                'success' => false,
	                'errors' => $validate->getMessageBag()->toArray()
	            )); 
			}else{
				$paciente->update($registerData);

				if($paciente){
					 return Response::json(array(
	                    'success'         =>     true,
	                    'message'         =>     'Te has registrado correctamente'
	                ));
				}		
			}			
		 }
	}
}
?>