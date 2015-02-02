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

class UserTableSeeder extends Seeder {
	DB::table('enfermedades')->insert(array(//1
        'nombre' => 'Alergias'           
    ));
	DB::table('enfermedades')->insert(array(//2
	    'nombre' => 'Cáncer'           
	));
	DB::table('enfermedades')->insert(array(//3
	    'nombre' => 'Diabetes'           
	));
    DB::table('enfermedades')->insert(array(//4
        'nombre' => 'Drogadicción'           
    ));
	DB::table('enfermedades')->insert(array(//5
	    'nombre' => 'Enfermedades Comunes'           
	));
	DB::table('enfermedades')->insert(array(//6
		'nombre' => 'Enfermedades de la Piel'           
	));
	DB::table('enfermedades')->insert(array(//7
		'nombre' => 'Enfermedades de Transmisión Sexual'           
	));
    DB::table('enfermedades')->insert(array(//8
    	'nombre' => 'Enfermedades Del Aparato Digestivo'           
    ));
    DB::table('enfermedades')->insert(array(//9
    	'nombre' => 'Enfermedades pulmonares'           
    ));
    DB::table('enfermedades')->insert(array(//10
    	'nombre' => 'Lesiones Deportivas'           
    ));	
	DB::table('enfermedades')->insert(array(//11
		'nombre' => 'Problemas Psicólogicos'           
    ));	
	DB::table('enfermedades')->insert(array(//12
		'nombre' => 'Salud dental'           
    ));
}
class SintomaTableSeeder extends Seeder {
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
    DB::table('sintomas')->insert(array(//10
		'sintoma'		=> 'Pie Diabético',
		'enfermedad_id' => 3,        
    ));
    DB::table('sintomas')->insert(array(
		'sintoma'		=> 'Retinopatía Diabética',
		'enfermedad_id' => 3,        
    ));
    DB::table('sintomas')->insert(array(//12
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
    DB::table('sintomas')->insert(array(//15
		'sintoma'		=> 'Laringitis',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//16
		'sintoma'		=> 'Deshidratación',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//17
		'sintoma'		=> 'Estreñimiento',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//18
		'sintoma'		=> 'Hemorroides',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//19
		'sintoma'		=> 'Varices',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//20
		'sintoma'		=> 'Mareo',
		'enfermedad_id' => 5,        
    ));
    DB::table('sintomas')->insert(array(//21
		'sintoma'		=> 'Acné',
		'enfermedad_id' => 6,        
    ));
    DB::table('sintomas')->insert(array(//22
		'sintoma'		=> 'Ampollas',
		'enfermedad_id' => 6,        
    ));
    DB::table('sintomas')->insert(array(//23
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
class TratamientoTableSeeder extends Seeder {
	DB::table('sintomas')->insert(array(
		'descripcion'	=> 'En la alergia alimentaria se debe de hacer una dieta de exclusión del alimento implicado.

							Si en un momento dado el alimento no se ha podido evitar por error:

							En un cuadro leve se puede tomar un antihistamínico por boca como Xaxal, Aerrius, Ebastel , cetiricina , Loratadina, etc..
							Si el cuadro es más intenso se debe asociar la toma de un esteroide por boca como Dacortin 30 mg o en niños Estilsona gotas, además del antihistamínico.
							En caso de una alergia de tipo anafiláctico a proteínas de alimentos, debería llevar Altellus® 0,30 (Adultos) o Altellus® 0,10.(niños de < 35 Kg).

							En caso de reacción alérgica por la ingesta accidental de proteínas de alimentos se debe administrar Altellus® a dosis de 0,30 cc/0,10 cc.',
		'sintoma_id' 	=> 1,        
    ));
    DB::table('sintomas')->insert(array(
		'descripcion'	=> 'La terapéutica médica actual se dirige a tratar la infección y a lograr el drenaje de los senos.

							Los antibióticos de elección en la sinusitis, tanto aguda como crónica, son la ampicilina y la amoxicilina; sin embargo, las bacterias productoras de B-lactamasa son un problema constante.

							Son alternativas válidas la amoxicilina-clavulámico, el cefaclor, el trimetoprim-sulfametoxazol, la cefuroxima, la eritromicina-sulfizoxazol y clindamicina.

							La duración del tratamiento de la sinusitis aguda debe ser de al menos diez-catorce días y la de la sinusitis crónica de tres-cuatro semanas.

							Los tratamientos de apoyo para reducir el edema tisular y aliviar la obstrucción de los orificios sinusales comprenden la administración de descongestivos orales y corticosteroides tópicos.

							En los pacientes con rinitis alérgica, la combinación de descongestivos y antihistamínicos puede contribuir a reducir las secreciones. En algunos casos, se usan descongestivos nasales tópicos durante dos-tres días, seguidos de esteroides nasales tópicos, ya que los descongestivos tópicos a largo plazo pueden originar rinitis medicamentosa. En algunos pacientes con obstrucción nasal significativa y pólipos nasales, se requiere un breve ciclo de prednisona de siete-diez días.

							Se necesita consulta quirúrgica en los casos de sinusitis aguda complicada, sinusitis insensible a la terapéutica médica enérgica y sinusitis crónica recidivante (más de cuatro episodios al año). Las intervenciones quirúrgicas deben ir seguidas de tratamiento médico, que comprende el uso de corticosteroides tópicos para minimizar la reaparición de pólipos nasales. Las intervenciones quirúrgicas comprenden el lavado sinusal, la creación de un orificio ensanchado para proporcionar drenaje efectivo y aireación, y la resección del tejido enfermo.',
		'sintoma_id' 	=> 2,        
    ));
	DB::table('sintomas')->insert(array(
		'descripcion'	=> 'En el tratamiento del cáncer de mama se utilizan cuatro tipos de tratamiento:
		
							cirugía
							radioterapia
							quimioterapia
							terapia hormonal
							Se están realizando estudios clínicos con terapia biológica y con el trasplante de medula ósea.

							En primer lugar se utiliza la cirugía para extraer el nódulo canceroso de la mama, también se extraen los ganglios linfáticos axilares para su análisis en el microscopio y detectar la extensión de células cancerosas.',
		'sintoma_id' 	=> 7,        
	));
	DB::table('sintomas')->insert(array(
		'descripcion'	=> '',
		'sintoma_id' 	=> 2,        
	));
	DB::table('sintomas')->insert(array(
		'descripcion'	=> '',
		'sintoma_id' 	=> 2,        
	));
	DB::table('sintomas')->insert(array(
		'descripcion'	=> '',
		'sintoma_id' 	=> 2,        
	));
	DB::table('sintomas')->insert(array(
		'descripcion'	=> '',
		'sintoma_id' 	=> 2,        
	));




}

