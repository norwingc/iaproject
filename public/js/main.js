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
		            	var url = '#';
		            	for(datos in data.consultas){

		            		 consulta += "<div class='cuadro'>" + 
		            		 				"<p>sintomas: " +  data.consultas[datos].sintomas + "</p>" +
		            		 				"<p>tratamiento: " +  data.consultas[datos].tratamiento + "</p>" +
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
}

