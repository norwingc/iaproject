<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('test', function(){
	$tratamiento = Tratamiento::find(1);
	return $tratamiento->descripcion;
});
Route::group(array('before' => 'auth'), function()
{
	Route::get('/', function(){	
		$consultas = Consulta::where('doctor_id', Auth::user()->id)->orderBy('id','des')->take(3)->get();
		return View::make('inicio')->with('consultas', $consultas);
	});

	Route::group(array('prefix' => 'api'), function () {
		Route::get('doctores',function(){
			return Doctor::all();
			//http://localhost/iaproject/public/api/doctores
		});
	});

	/**
	 * CONSULTAS
	 */

	Route::group(array('prefix' => 'consulta'), function () {
		Route::get('/', function(){
			return View::make('sistem.consulta.addconsulta');
		});
		Route::post('save', 'ConsultasController@save');
		Route::get('buscar/{tag}', function($tag){
		    if(Request::ajax()){
			 	$consultas = DB::table('consultas')->where('sintomas', 'LIKE', '%'.trim($tag).'%')->orderBy('id','des')->take(3)->get();
			 	return Response::json(array(
				 	'consultas' =>     $consultas
		        ));
			}
		});
		Route::get('view', function(){
			$consultas = Consulta::where('doctor_id', Auth::user()->id)->get();
			return View::make('sistem.consulta.consulta')->with('consultas', $consultas);
		});
		Route::post('view/tag', function(){
			$consultas = Consulta::where('sintomas', 'LIKE', '%' .trim(Input::get('q')). '%')->get();
			return View::make('sistem.consulta.view',array('tag'=>Input::get('q'), 'consultas'=>$consultas));
		});
		Route::get('search/{id}', function($id){
			$consulta = Consulta::find($id);
			return View::make('sistem.consulta.search')->with('consulta', $consulta);
		});
		Route::get('tratamiento/{tag}', 'ConsultasController@tratamiento');
		Route::get('enfermedad/{tag}', 'ConsultasController@enfermedad');
	});
	
	/**
	 * PACIENTES
	 */

	Route::group(array('prefix' => 'paciente'), function () {
		Route::get('/', function(){
			return View::make('sistem.paciente.addpaciente');
		});
		Route::get('view', function(){
			$pacientes = Paciente::all();
			return View::make('sistem.paciente.view')->with('pacientes', $pacientes);
		});		
		Route::get('search/{id}', function($id){
			$paciente = Paciente::find($id);
			return View::make('sistem.paciente.search')->with('paciente', $paciente);
		});
		Route::post('search/update/{id}', 'PacientesController@update');

		Route::get('expediente/{id}', function($id){
			$paciente = Paciente::find($id);
			$html = View::make("expediente")->with('paciente', $paciente);
		    return PDF::load($html, 'carta', 'portrait')->show();
		});
		Route::post('save', 'PacientesController@save');
	});

	/**
	 * ESTADISTICAS
	 */

	Route::group(array('prefix' => 'estadisticas'), function () {
		Route::get('/', function(){
			return View::make('sistem.estadisticas.estadisticas');
		});
	});

	/**
	 * USUARIOS	
	 */

	Route::group(array('prefix' => 'usuarios'), function () {
		Route::get('/', function(){
			return View::make('sistem.usuarios.addusuarios');
		});
		Route::get('view', function(){
			$user = User::all();
			return View::make('sistem.usuarios.view')->with('user', $user);
		});
		Route::get('cuenta', function(){
			$user = User::where('id', Auth::user()->id)->first();
			return View::make('sistem.usuarios.cuenta')->with('user', $user);
		});
		Route::post('save','UsuariosController@save');
		Route::post('update','UsuariosController@update');
	});

	/**
	 * ADMINISTRADOR	
	 */

	Route::group(array('prefix' => 'administrador'), function () {
		Route::get('/', function(){
			return View::make('sistem.admin.admin');
		});
		Route::post('enfermedades/save','AdministradorController@save_enfermedad');
		Route::post('sintomas/save','AdministradorController@save_sintomas');
	});	

});	

Route::get('login', function(){
	return View::make('login');
});

Route::post('login', function(){

	$rules = array(
		'username' => 'required',
		'password' => 'required',
		);
	$message = array(
			'required' => 'El campo :attribute es requerido',
			);

	$validate = Validator::make(Input::all(), $rules, $message);

	if($validate->fails()){
		return Redirect::back()->withErrors($validate)->withInput();
	}else{

		$userdata = array(
			'username' =>Input::get('username'),
			'password' =>Input::get('password')
		);
		if(Auth::attempt($userdata)){
			return Redirect::to('/');
		}else{
			Session::flash('message', 'Error al iniciar session');
			return Redirect::to('login');
		}
	}	
});

Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('/');
});
