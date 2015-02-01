<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pacientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('edad');
			$table->string('sexo');
			$table->string('ocupacion');
			$table->string('nacionalidad');
			$table->string('estado_civil');
			$table->string('direccion');
			$table->string('cedula');
			$table->string('responsable');
			$table->string('ingreso');
			$table->string('antecedentes_drop');
			$table->string('antecedentes');
			$table->string('infancia');
			$table->string('intervencion');
			$table->string('traumatismo');
			$table->string('transfuciones');
			$table->string('medicamentos');
			$table->string('personales_patologicos');
			$table->string('habitos');
			$table->string('tabaquismo');
			$table->string('toxicomanias');
			$table->string('deportes');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pacientes');
	}

}
