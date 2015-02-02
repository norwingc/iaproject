<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('EnfermedadTableSeeder');
		$this->call('SintomaTableSeeder');
		$this->call('TratamientoTableSeeder');
	}
}

class EnfermedadTableSeeder extends Seeder {
	 public function run(){
		DB::table('enfermedades')->insert(array(//1
	        'nombre' => 'Alergias',
	        'sintomas' => 'Alergia a Alimentos, Alergia a Frutas, Alergia a Frutos Secos, Sinusitis'           
	    ));
		DB::table('enfermedades')->insert(array(//2
		    'nombre' => 'Cáncer',
		    'sintomas' => 'Alfafetoproteína, Calcitonina, Cáncer de Mama, Melanoma'           
		));
		DB::table('enfermedades')->insert(array(//3
		    'nombre' => 'Diabetes',
		    'sintomas' => 'Insulinas, Pie Diabético, Retinopatía Diabética'           
		));
	    DB::table('enfermedades')->insert(array(//4
	        'nombre' => 'Drogadicción',
	        'sintomas' => 'Cocaína, Actitud inicial de los padres, Sospecha de problemas con drogas'           
	    ));
		DB::table('enfermedades')->insert(array(//5
		    'nombre' => 'Enfermedades Comunes',
		    'sintomas' => 'Laringitis, Deshidratación, Estreñimiento, Hemorroides, Varices, Mareo'           
		));
		DB::table('enfermedades')->insert(array(//6
			'nombre' => 'Enfermedades de la Piel',
			'sintomas' => 'Acné, Ampollas, Pecas, Quemaduras'           
		));
		DB::table('enfermedades')->insert(array(//7
			'nombre' => 'Enfermedades de Transmisión Sexual',
			'sintomas' => 'Candidiasis, Ladillas, Sífilis'
		));
	    DB::table('enfermedades')->insert(array(//8
	    	'nombre' => 'Enfermedades Del Aparato Digestivo',
	    	'sintomas' => 'Diarrea, Dolor abdominal, Estreñimiento, Gastritis'           
	    ));
	    DB::table('enfermedades')->insert(array(//9
	    	'nombre' => 'Enfermedades pulmonares',
	    	'sintomas'=> 'Neumonía, Asma Bronquial, Bronquitis'           
	    ));
	    DB::table('enfermedades')->insert(array(//10
	    	'nombre' => 'Lesiones Deportivas',
	    	'sintomas' => 'Lesiones en el Deporte, Dolor de Rodilla, Pubalgia'           
	    ));	
		DB::table('enfermedades')->insert(array(//11
			'nombre' => 'Problemas Psicólogicos',
			'sintomas' => 'Afasia, Angustia, Bulimia'           
	    ));	
		DB::table('enfermedades')->insert(array(//12
			'nombre' => 'Salud dental',
			'sintomas' => 'Endodoncia, Odontología estética, Periodoncia, Cirugía dental preprotésica'           
	    ));
	}    
}
class SintomaTableSeeder extends Seeder {
	 public function run(){
		DB::table('sintomas')->insert(array(//1
			'sintoma'		=> 'Alergia a Alimentos',
			'enfermedad_id' => 1,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Alergia a Frutas',
			'enfermedad_id' => 1,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Alergia a Frutos Secos',
			'enfermedad_id' => 1,        
	    ));
	    DB::table('sintomas')->insert(array(//4
			'sintoma'		=> 'Sinusitis',
			'enfermedad_id' => 1,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Alfafetoproteína',
			'enfermedad_id' => 2,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Calcitonina',
			'enfermedad_id' => 2,        
	    ));
	    DB::table('sintomas')->insert(array(//7
			'sintoma'		=> 'Cáncer de Mama',
			'enfermedad_id' => 2,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Melanoma',
			'enfermedad_id' => 2,        
	    ));    
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Insulinas',
			'enfermedad_id' => 3,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Pie Diabético',
			'enfermedad_id' => 3,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Retinopatía Diabética',
			'enfermedad_id' => 3,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Cocaína',
			'enfermedad_id' => 4,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Actitud inicial de los padres',
			'enfermedad_id' => 4,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Sospecha de problemas con drogas',
			'enfermedad_id' => 4,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Laringitis',
			'enfermedad_id' => 5,        
	    ));
	    DB::table('sintomas')->insert(array(//16
			'sintoma'		=> 'Deshidratación',
			'enfermedad_id' => 5,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Estreñimiento',
			'enfermedad_id' => 5,        
	    ));
    	DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Hemorroides',
			'enfermedad_id' => 5,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Varices',
			'enfermedad_id' => 5,        
	    ));
	    DB::table('sintomas')->insert(array(//20
			'sintoma'		=> 'Mareo',
			'enfermedad_id' => 5,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Acné',
			'enfermedad_id' => 6,        
	    ));
	    DB::table('sintomas')->insert(array(//22
			'sintoma'		=> 'Ampollas',
			'enfermedad_id' => 6,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Pecas',
			'enfermedad_id' => 6,        
	    ));
	    DB::table('sintomas')->insert(array(//24
			'sintoma'		=> 'Quemaduras',
			'enfermedad_id' => 6,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Candidiasis',
			'enfermedad_id' => 7,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Ladillas',
			'enfermedad_id' => 7,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Sífilis',
			'enfermedad_id' => 7,        
	    ));
	    DB::table('sintomas')->insert(array(//28
			'sintoma'		=> 'Diarrea',
			'enfermedad_id' => 8,        
	    ));
	    DB::table('sintomas')->insert(array(//29
			'sintoma'		=> 'Dolor abdominal',
			'enfermedad_id' => 8,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Estreñimiento',
			'enfermedad_id' => 8,        
	    ));
	    DB::table('sintomas')->insert(array(//31
			'sintoma'		=> 'Gastritis',
			'enfermedad_id' => 8,        
	    ));
	    DB::table('sintomas')->insert(array(//32
			'sintoma'		=> 'Neumonía',
			'enfermedad_id' => 9,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Asma Bronquial',
			'enfermedad_id' => 9,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Bronquitis',
			'enfermedad_id' => 9,        
	    ));
	    DB::table('sintomas')->insert(array(//35
			'sintoma'		=> 'Lesiones en el Deporte',
			'enfermedad_id' => 10,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Dolor de Rodilla',
			'enfermedad_id' => 10,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Pubalgia',
			'enfermedad_id' => 10,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Afasia',
			'enfermedad_id' => 11,        
	    ));
	    DB::table('sintomas')->insert(array(//39
			'sintoma'		=> 'Angustia',
			'enfermedad_id' => 11,        
	    ));
	    DB::table('sintomas')->insert(array(//40
			'sintoma'		=> 'Bulimia',
			'enfermedad_id' => 11,        
	    ));
	    DB::table('sintomas')->insert(array(//41
			'sintoma'		=> 'Endodoncia',
			'enfermedad_id' => 12,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Odontología estética',
			'enfermedad_id' => 12,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Periodoncia',
			'enfermedad_id' => 12,        
	    ));
	    DB::table('sintomas')->insert(array(
			'sintoma'		=> 'Cirugía dental preprotésica',
			'enfermedad_id' => 12,        
	    ));
	}
}
class TratamientoTableSeeder extends Seeder {
	public function run()    {
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'En la alergia alimentaria se debe de hacer una dieta de exclusión del alimento implicado.

								Si en un momento dado el alimento no se ha podido evitar por error:

								En un cuadro leve se puede tomar un antihistamínico por boca como Xaxal, Aerrius, Ebastel , cetiricina , Loratadina, etc..
								Si el cuadro es más intenso se debe asociar la toma de un esteroide por boca como Dacortin 30 mg o en niños Estilsona gotas, además del antihistamínico.
								En caso de una alergia de tipo anafiláctico a proteínas de alimentos, debería llevar Altellus® 0,30 (Adultos) o Altellus® 0,10.(niños de < 35 Kg).

								En caso de reacción alérgica por la ingesta accidental de proteínas de alimentos se debe administrar Altellus® a dosis de 0,30 cc/0,10 cc.',
			'sintoma_id' 	=> 1,        
	    ));
	    DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'Los antibióticos de elección en la sinusitis, tanto aguda como crónica, son la ampicilina y la amoxicilina; sin embargo, las bacterias productoras de B-lactamasa son un problema constante.

								Son alternativas válidas la amoxicilina-clavulámico, el cefaclor, el trimetoprim-sulfametoxazol, la cefuroxima, la eritromicina-sulfizoxazol y clindamicina.

								La duración del tratamiento de la sinusitis aguda debe ser de al menos diez-catorce días y la de la sinusitis crónica de tres-cuatro semanas.

								Los tratamientos de apoyo para reducir el edema tisular y aliviar la obstrucción de los orificios sinusales comprenden la administración de descongestivos orales y corticosteroides tópicos.

								En los pacientes con rinitis alérgica, la combinación de descongestivos y antihistamínicos puede contribuir a reducir las secreciones. En algunos casos, se usan descongestivos nasales tópicos durante dos-tres días, seguidos de esteroides nasales tópicos, ya que los descongestivos tópicos a largo plazo pueden originar rinitis medicamentosa. En algunos pacientes con obstrucción nasal significativa y pólipos nasales, se requiere un breve ciclo de prednisona de siete-diez días.

								Se necesita consulta quirúrgica en los casos de sinusitis aguda complicada, sinusitis insensible a la terapéutica médica enérgica y sinusitis crónica recidivante (más de cuatro episodios al año). Las intervenciones quirúrgicas deben ir seguidas de tratamiento médico, que comprende el uso de corticosteroides tópicos para minimizar la reaparición de pólipos nasales. Las intervenciones quirúrgicas comprenden el lavado sinusal, la creación de un orificio ensanchado para proporcionar drenaje efectivo y aireación, y la resección del tejido enfermo.',
			'sintoma_id' 	=> 4,        
	    ));
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'En el tratamiento del cáncer de mama se utilizan cuatro tipos de tratamiento:

								cirugía
								radioterapia
								quimioterapia
								terapia hormonal
								Se están realizando estudios clínicos con terapia biológica y con el trasplante de medula ósea.

								En primer lugar se utiliza la cirugía para extraer el nódulo canceroso de la mama, también se extraen los ganglios linfáticos axilares para su análisis en el microscopio y detectar la extensión de células cancerosas.',
			'sintoma_id' 	=> 7,        
		));
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'La deshidratación leve se trata con reposición oral de líquidos y sales (iones), utilizando cuando es posible soluciones de rehidratación comerciales (tipo Sueroral, Bebesales, etc) o caseras, como la llamada "Limonada alcalina". Ésta se prepara disolviendo en 1 litro de agua el zumo de 2 limones, una cucharada de bicarbonato sódico y azúcar al gusto.

								La deshidratación grave precisa líquidos intravenosos, y generalmente, hospitalización.',
			'sintoma_id' 	=> 16,        
		));
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'En mareos por hipotensión se debe de tener en cuenta que al levantarse debe de hacerlo poco a poco, evitando los cambios de postura rápidos.
								Si ya se ha producido debe de tumbarse (con cuidado para no tener traumatismos al caerse) o mantenerse tumbado un rato con loas piernas elevadas, hasta que el riego sanguíneo llegue bien al cerebro y se recupere el color rosado de piel y mucosas.
								Luego, levantarse poco a poco.

								El tomar bebidas estimulantes como el café o el thé suele tener efectos beneficiosos.

								Si se nota con sed se debe de tomar agua o líquidos, si es por un cuadro de vómitos o diarreas con más necesidad y si no se toleran por boca será necesario ponerlos mediante la aplicación de sueros.

								Si el mareo es de posible origen cardiaco habrá que hacer un estudio en profundidad.

								Si es un accidente cerebro vascular esto es una urgencia médica y hay que acudir a un servicio de urgencias.',
			'sintoma_id' 	=> 20,        
		));
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'No rompa las ampollas, pues esto aumenta la posibilidad de infección.

								Atraviese la ampolla con aguja e hilo para evacuar el líquido. A continuación lave la zona con agua y jabón antiséptico. Secar bien la zona, aplicar antiséptico tipo Betadine, secar y colocar un apósito.

								Si la ampolla se rompe accidentalmente, recorte la piel suelta, lave con agua y jabón antiséptico, aplique antiséptico tipo Betadine y coloque un apósito.

								Las ampollas se secarán y la piel se desprenderá en un tiempo de una a dos semanas.',
			'sintoma_id' 	=> 22,        
		));
		DB::table('tratamientos')->insert(array(
			'descripcion'	=> 'Las quemaduras de primer grado pueden tratarse sin trasladar a un centro sanitario, mediante una crema hidratante. No es necesario taparla.

								Si es una quemadura generalizada, primero, se debe estar en agua templada durante largo tiempo, para bajar la temperatura de la piel, pero sin quedarnos helados (hipotermia).

								Se deben trasladar a un centro sanitario a las quemaduras de segundo y tercer grado, las de cara, manos, cuello o zonas de pliegues. También si son ancianos o niños, ya que son más sensibles a sus efectos.

								En todo caso, el centro de coordinación de emergencias de tu población (teléfonos 061 ó 112) están disponibles las 24 h. del día para asesorarte y sacarte de dudas.',
			'sintoma_id' 	=> 24,        
		));
	}
}

