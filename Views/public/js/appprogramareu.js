$(document).ready(function(){
	//$('#programa').select2({ allowClear:true, placeholder: 'Escoge una' });

//----------------------------------PROGRAMA--------------------------------------------------------

fetch();
	//add
	$('#addnew').click(function(){
		$('#add2').modal('show');
	});
	$('#addForm2').submit(function(e){
		e.preventDefault();
		var addform = $(this).serialize();
		//console.log(addform);
		$.ajax({
			method: 'POST',
			url: '../../../Controller/crud_reunion/funcmodal/programa/add.php',
			data: addform,
			dataType: 'json',
			success: function(response){
				$('#add2').modal('hide'); //add1
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
		$('#delete').modal('show');
	});

	$('.id').click(function(){
		var id = $(this).val();
		$.ajax({
			method: 'POST', 
			url: '../../../Controller/crud_reunion/funcmodal/programa/delete.php',
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
				
				$('#delete').modal('hide');
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
		url: '../../../Controller/crud_reunion/funcmodal/programa/fetch.php',
		data: "idevento=" + $("#idevento").val(),
		success: function(response){
			$('#tbody').html(response);
		}
	});
}
function getDetails(id){
	$.ajax({
		method: 'POST',
		url: '../../../Controller/crud_reunion/funcmodal/programa/fetch_row.php',
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
				$('.programa').val(response.data.programa);
				$('.idevento').val(response.data.idevento);
			}
		}
	});
}
