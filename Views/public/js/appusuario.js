function fetch(){$.ajax({method:"POST",url:"../../../Controller/funcmodal/colaborador/fetch.php",data:"idevento="+$("#idevento").val(),success:function(e){$("#tbody").html(e)}})}function getDetails(e){$.ajax({method:"POST",url:"../../../Controller/funcmodal/colaborador/fetch_row.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#edit").modal("hide"),$("#delete").modal("hide"),$("#alert").show(),$("#alert_message").html(e.message)):$(".id").val(e.data.id)}})}$(document).ready(function(){fetch(),$("#addnew").click(function(){$("#addusuario").modal("show")}),$("#addFormuser").submit(function(e){e.preventDefault();e=$(this).serialize();$("#addusuario").modal("hide"),$("#cargando").modal("show"),$.ajax({method:"POST",url:"../../../Controller/funcmodal/colaborador/add.php",data:e,dataType:"json",success:function(e){$("#cargando").modal("hide"),e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch())}})}),$(document).on("click",".delete",function(){getDetails($(this).data("id")),$("#detalles_eliminar").modal("show")}),$(".id").click(function(){var e=$(this).val();$.ajax({method:"POST",url:"../../../Controller/funcmodal/colaborador/delete.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch()),$("#detalles_eliminar").modal("hide")}})}),$(document).on("click",".close",function(){$("#alert").hide()})});