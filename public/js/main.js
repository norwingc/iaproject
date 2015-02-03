$(document).ready(main);

function main(){

	$('.mobil').addClass("hidden-sm hidden-md hidden-lg");
	$('.computer').addClass('hidden-xs');

	$('.cedula').mask('000-000000-0000S');	


	$('#prediccion').change(function(){		
		if($(this).attr('checked', true)){
			
		}
	});
	var esta = false;
	$('#mostrarprediccion').click(function(){
		if(esta == false){
			var dato = $('#sintomas_google').val();
			if(dato == ''){
				alert('Debe de escribir los sintomas');
				$('#cuadroprediccion').removeClass('si-visible');
				$('#cuadroprediccion').addClass('no-visible');
				$('#mostrarprediccion').html('Mostrar Ultimas Consultas <i class="fa fa-chevron-circle-right"></i>');
				esta = false;
			}else{
				$('#cuadroprediccion').removeClass('no-visible');
				$('#cuadroprediccion').addClass('si-visible');
				$('#mostrarprediccion').html('<i class="fa fa-chevron-circle-left"></i> Ocultar Consultas');
				esta = true;
				$.ajax({
					type: 'GET',
	            	url: 'consulta/buscar/'+dato,
	            	beforeSend: function(){
		               
		            },
		            success: function (data) {
		            	var consulta = ''; 		            	
		            	for(datos in data.consultas){
		            		var url = 'consulta/search/'+data.consultas[datos].id;
		            		var sintomas = data.consultas[datos].sintomas;
		            		var tratamiento = data.consultas[datos].tratamiento;

		            		 consulta += "<div class='cuadro'>" + 
		            		 				"<p>sintomas: <span>" +  sintomas.slice(0,50) + "...</span></p>" +
		            		 				"<p>tratamiento: <span>" +  tratamiento.slice(0,50) + "...</span></p>" +
		            		 				"<a href='"+ url +"'  target='new'>Leer mas..</a>"
		            		 			 +"</div>";	
		            	}
		            	$('.cuadros').html(consulta)
		            }
				});	
			}

		}else{
			$('#cuadroprediccion').removeClass('si-visible');
			$('#cuadroprediccion').addClass('no-visible');
			$('#mostrarprediccion').html('Mostrar Ultimas Consultas <i class="fa fa-chevron-circle-right"></i>');
			esta = false;
		}
	});

	$('#btn_google').click(function(){	
		$('#busqueda_google').val('tratamiento ' + $('#sintomas_google').val());		
	});
	$('#btn_vertodos').click(function(){	
		$('#input_vertodos').val($('#sintomas_google').val());		
	});
	var tratamiento = '';
	$('#add_tratamiento').click(function(){
		tratamiento = $('#tratamiento_descripcion').val();
		ver(tratamiento);
		close();
	});

	$('#addpaciente').click(addPaciente);	
	$('#uppaciente').click(upPaciente);	

	$('#infopaciente').click(function(){
		if($('#paciente').val() == ''){
			alert('Debe seleccionar un paciente');
		}else{
			var url = "http://localhost/iaproject/public/paciente/search/"+ $('#paciente').val();
			window.open(url, '_blank');			
		}

	});

	
	$('#add_sintoma p').each(function(){
		$(this).click(function(){			
			var sin = $('#sintomas_google').val();			 
			sin += $(this).html()+ ' ';			
			$('#sintomas_google').val(sin);					

			$('#modalsintomas').modal('hide');
		});
	});

	$('#tratamiento_sugerido').click(vertratamiento);
}

function ver(tratamiento){	
	$('#tratamiento').val(tratamiento);	
}

function addPaciente(){	
	var nombre = $('#nombre').val();
	var edad = $('#edad').val();
	var sexo = $('#sexo').val();
	var ocupacion = $('#ocupacion').val();
	var nacionalidad = $('#nacionalidad').val();
	var estado_civil = $('#estado_civil').val();
	var direccion = $('#direccion').val();
	var cedula = $('#cedula').val();
	var responsable = $('#responsable').val();
	var ingreso = $('#ingreso').val();
	var antecedentes_drop = '';
	var antecedentes = $('#antecedentes').val();
	var infancia = $('#infancia').val();
	var intervencion = $('#intervencion').val();
	var traumatismo = $('#traumatismo').val();
	var transfuciones = $('#transfuciones').val();
	var medicamentos = $('#medicamentos').val();
	var personales_patologicos = $('#personales_patologicos').val();
	var habitos = $('#habitos').val();
	var tabaquismo = $('#tabaquismo').val();
	var toxicomanias = $('#toxicomanias').val();
	var deportes = $('#deportes').val();

	$('#sortable2 li').each(function(){
		if($(this).html() == 'Enfermedades'){

		}else{
			antecedentes_drop += $(this).html() + ', ';		
		}		
	});

	var datos = 'nombre='+ nombre + '&edad='+ edad + '&sexo='+ sexo + '&ocupacion='+ ocupacion + '&nacionalidad='+ nacionalidad + '&estado_civil='+ estado_civil + '&direccion='+ direccion + '&cedula='+ cedula + '&responsable='+ responsable + '&ingreso='+ ingreso + '&antecedentes_drop='+ antecedentes_drop + '&antecedentes='+ antecedentes + '&infancia='+ infancia + '&intervencion='+ intervencion + '&traumatismo='+ traumatismo + '&transfuciones='+ transfuciones + '&medicamentos='+ medicamentos + '&personales_patologicos='+ personales_patologicos + '&habitos='+ habitos + '&tabaquismo='+ tabaquismo + '&toxicomanias='+ toxicomanias + '&deportes='+ deportes;
	
	$.ajax({
		type: 'POST',
    	url: 'paciente/save',
    	data: datos,
    	beforeSend: function(){
           
        },
        success: function (data) {
        	if(data.success == false){
        		var errores = '';
                for(datos in data.errors){
                    errores += '<li>' + data.errors[datos] + '</li>' ;
                }
                $('#error').html(errores);
        	}else{
				$('#form_paciente')[0].reset();//limpiamos el formulario
				$('#msj').removeClass('hidden');
				$('#msj').html(data.message);				
        	}
        },
        error: function(errors){
            $('.before').hide();
            $('.errors_form').html('');
            $('.errors_form').html(errors);
        }
	});
}
function upPaciente(){	
	var nombre = $('#nombre').val();
	var edad = $('#edad').val();
	var sexo = $('#sexo').val();
	var ocupacion = $('#ocupacion').val();
	var nacionalidad = $('#nacionalidad').val();
	var estado_civil = $('#estado_civil').val();
	var direccion = $('#direccion').val();
	var cedula = $('#cedula').val();
	var responsable = $('#responsable').val();
	var ingreso = $('#ingreso').val();
	var antecedentes_drop = '';
	var antecedentes = $('#antecedentes').val();
	var infancia = $('#infancia').val();
	var intervencion = $('#intervencion').val();
	var traumatismo = $('#traumatismo').val();
	var transfuciones = $('#transfuciones').val();
	var medicamentos = $('#medicamentos').val();
	var personales_patologicos = $('#personales_patologicos').val();
	var habitos = $('#habitos').val();
	var tabaquismo = $('#tabaquismo').val();
	var toxicomanias = $('#toxicomanias').val();
	var deportes = $('#deportes').val();

	$('#sortable2 li').each(function(){
		if($(this).html() == 'Enfermedades'){

		}else{
			antecedentes_drop += $(this).html() + ',';		
		}		
	});

	var datos = 'nombre='+ nombre + '&edad='+ edad + '&sexo='+ sexo + '&ocupacion='+ ocupacion + '&nacionalidad='+ nacionalidad + '&estado_civil='+ estado_civil + '&direccion='+ direccion + '&cedula='+ cedula + '&responsable='+ responsable + '&ingreso='+ ingreso + '&antecedentes_drop='+ antecedentes_drop + '&antecedentes='+ antecedentes + '&infancia='+ infancia + '&intervencion='+ intervencion + '&traumatismo='+ traumatismo + '&transfuciones='+ transfuciones + '&medicamentos='+ medicamentos + '&personales_patologicos='+ personales_patologicos + '&habitos='+ habitos + '&tabaquismo='+ tabaquismo + '&toxicomanias='+ toxicomanias + '&deportes='+ deportes;
	
	$.ajax({
		type: 'POST',
    	url: 'update/' + $('#id_paciente').val(),
    	data: datos,
    	beforeSend: function(){
           
        },
        success: function (data) {
        	if(data.success == false){
        		var errores = '';
                for(datos in data.errors){
                    errores += '<li>' + data.errors[datos] + '</li>' ;
                }
                console.log(errores);
                $('#error').html(errores);
        	}else{			
				location.reload();				
        	}
        },
        error: function(errors){
            $('.before').hide();
            $('.errors_form').html('');
            $('.errors_form').html(errors);
        }
	});
}

function vertratamiento(){
	var tag = $('#sintomas_google').val();

	if(tag == ''){
		alert('Debe seleccionar los sintomas')
	}else{

		var tag = tag.split(',');
		$('#hola').html('');
		for (var i = 0; i < tag.length; i++) {
			var texto = '';
			$.ajax({
				type: 'GET',
		    	url: 'consulta/tratamiento/'+tag[i],
		    	beforeSend: function(){
		           
		        },
		        success: function (data) {	
	        	
	        		texto = $('#hola').html();

	        		texto += "<div><p>"+ data.tratamiento.descripcion + "</p></div>";

	        		$('#hola').html(texto);

	        		$('#modaltratamiento').modal('show');
		        }
			});

			$.ajax({
				type: 'GET',
		    	url: 'consulta/enfermedad/'+tag[i],
		    	beforeSend: function(){
		           
		        },
		        success: function (data) {        	

		        	$('.enfermedad_posible li').each(function(){ 
		        		
		        		if($(this).html() == data.enfermedad.nombre){

		        		}else{
		        			$('#quitar').remove();
		        			var consulta = $('.enfermedad_posible').html();
		        			consulta += "<li>"+ data.enfermedad.nombre + "</li>";   
		        			$('.enfermedad_posible').html(consulta);  
		        		}        		  		
		        	});         	
		        }
			});
		}
	}	
}

