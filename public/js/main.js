$(document).ready(main);

function main(){
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
				$('#mostrarprediccion').html('Mostrar Preddiccion <i class="fa fa-chevron-circle-right"></i>');
				esta = false;
			}else{
				$('#cuadroprediccion').removeClass('no-visible');
				$('#cuadroprediccion').addClass('si-visible');
				$('#mostrarprediccion').html('<i class="fa fa-chevron-circle-left"></i> Ocultar Prediccion');
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
		            		 				"<p>sintomas: " +  sintomas.slice(0,50) + "...</p>" +
		            		 				"<p>tratamiento: " +  tratamiento.slice(0,50) + "...</p>" +
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
			$('#mostrarprediccion').html('Mostrar Preddiccion <i class="fa fa-chevron-circle-right"></i>');
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
}

function ver(tratamiento){	
	$('#tratamiento').val(tratamiento);
	console.log(tratamiento);
}

