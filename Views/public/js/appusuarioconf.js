
$(document).ready(function(){

fetch();
	//add
	$('#addnew').click(function(){
		$('#addusuario').modal('show');
	});
	 
	$('#addFormuser').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		$('#addusuario').modal('hide');
		$('#cargando').modal('show');
		//console.log(addform);
		$.ajax({
			method: 'POST',
			url: '../../../Controller/crud_conferencista/funcmodal/colaborador/add.php',
			data: addform, 
			dataType: 'json',
			success: function(response){
				$('#cargando').modal('hide'); //add1
				if(response.error){
					$('#alert').show();
					$('#alert_message').html(response.message);
				}
				else{
					$('#alert').show();
					$('#alert_message').html(response.message);
					fetch();
				}
			}
		});
	});


	//delete
	$(document).on('click', '.delete', function(){
		var id = $(this).data('id');
		getDetails(id);
		$('#detalles_eliminar').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: '../../../Controller/crud_conferencista/funcmodal/colaborador/delete.php',
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
					fetch();
				}
				
				$('#detalles_eliminar').modal('hide');
			}
		});
	});
	//

	//hide message
	$(document).on('click', '.close', function(){
		$('#alert').hide();
	});


});// hasta aqui 


//______________PROGRAMA______________________
function fetch(){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_conferencista/funcmodal/colaborador/fetch.php',
		data: "idevento=" + $("#idevento").val(),
		success: function(response){
			$('#tbody').html(response);
		}
	});
}
function getDetails(id){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_conferencista/funcmodal/colaborador/fetch_row.php',
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
