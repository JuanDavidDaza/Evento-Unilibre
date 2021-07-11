$(document).ready(function(){

//----------------------------------ENTIDAD--------------------------------------------------------

fetch();
fetch1();



//eliminar

	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		getDetails1(id);
		$('#detalles_eliminar').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: '../../../Controller/crud_asistencia/funcmodal/delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch1();
				}
				
				$('#detalles_eliminar').modal('hide');
			}
		});
	});
	

	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});

//agregar
	$(document).on('click', '.agregar', function(){
		var id = $(this).data('id');
		//var idasistente = $("#idevento").val();
		getDetails(id);
		$('#detalles1').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		//var idasistente=document.getElementById("idevento1").value;
		$.ajax({
			method: 'POST', 
			url: '../../../Controller/crud_asistencia/funcmodal/agregar.php',
			data: {id:id,  idasistente:idasistente},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch1();
					fetch();

					
				}
				
				$('#detalles1').modal('hide');
			}
		});
	});
	//

	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});


});// hasta aqui 

function fetch(){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_asistencia/funcmodal/fetch.php',
		data:{idasistente:idasistente,idevento: $("#idevento").val()},
		//data: "idevento=" + $("#idevento").val(),
		success: function(response){
			$('#tbody').html(response);
		}
	});
}

function getDetails(id){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_asistencia/funcmodal/fetch_row.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.id').val(response.data.id);
				$('.entidad').val(response.data.entidad);
				$('.idevento').val(response.data.idevento);
			}
		}
	});
}



function fetch1(){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_asistencia/funcmodal/fetch1.php',
		data:{idasistente:idasistente,idevento: $("#idevento").val()},
		success: function(response){
			$('#tbody1').html(response);
		}
	});
}

function getDetails1(id){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_asistencia/funcmodal/fetch_row1.php',
		data: {id:id},
		dataType: 'json',
		success: function(response){
			if(response.error){
				$('#edit').modal('hide');
				$('#delete').modal('hide');
				$('#alert').show();
				$('#alert_message').html(response.message);
			}
			else{
				$('.id').val(response.data.id);
				
			}
		}
	});
}

