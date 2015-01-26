<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('doctor_id');
			$table->integer('paciente_id');
			$table->string('sintomas');
			$table->string('tratamiento');
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
		Schema::drop('consultas');
	}

}
