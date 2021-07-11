$(document).ready(function(){

    filterSearch(1);	
   
    $('.productDetail').click(function(){
    	var page = $(this).data('page_number');
        filterSearch(page);

    });	
	
});


function buscar_ajax(cadena){
var cadena = $('#buscar').val();
//var page = $(this).data('page_number');
//alert(cadena);
	filterSearch(1);
		
	}



   

$(document).on('click', '.page-link', function(){
	var page = $(this).data('page_number');
      filterSearch(page);
    });



function filterSearch(page) {
	//$('.searchResult').html('<div id="loading">Cargando .....</div>');
	var action = 'fetch_data';
	var buscar = $('#buscar').val();
	//var maxPrice = $('#maxPrice').val();
	var brand = getFilterData('brand');
	var ram = getFilterData('ram');
	
	$.ajax({
		url:"Controller/evento/action.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, buscar:buscar, brand:brand, ram:ram, page:page},
		success:function(data){
			$('.searchResult').html(data.html);

		}
	});
}
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}