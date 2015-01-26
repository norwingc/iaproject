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
Route::group(array('before' => 'auth'), function()
{
	Route::get('/', function()
	{
		return View::make('inicio');
	});

	Route::group(array('prefix' => 'api'), function () {
		Route::get('doctores',function(){
			return Doctor::all();
			//http://localhost/iaproject/public/api/doctores
		});
	});

	Route::group(array('prefix' => 'consulta'), function () {
		Route::get('/', function(){
			return View::make('sistem.consulta.addconsulta');
		});
		Route::post('save', 'ConsultasController@save');
		Route::get('buscar/{tag}', function($tag){
		    if(Request::ajax()){
			 	$consultas = DB::table('consultas')->where('sintomas', 'LIKE', '%'.$tag.'%')->get();
			 	return Response::json(array(
				 	'consultas' =>     $consultas
		        ));
			}
		});
	});
	
	Route::group(array('prefix' => 'paciente'), function () {
		Route::post('save', 'PacientesController@save');
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
