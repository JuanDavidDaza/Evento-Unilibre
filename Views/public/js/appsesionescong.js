function fetch(){$.ajax({method:"POST",url:"../../../Controller/crud_congreso/funcmodal/sesiones/fetch.php",data:"idevento="+$("#idevento").val(),success:function(e){$("#tbody").html(e)}})}function getDetails(e){$.ajax({method:"POST",url:"../../../Controller/crud_congreso/funcmodal/sesiones/fetch_row.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#edit").modal("hide"),$("#delete").modal("hide"),$("#alert").show(),$("#alert_message").html(e.message)):($(".id").val(e.data.id),$(".idevento").val(e.data.idevento),$(".idsesion").val(e.data.idsesion),$(".nombresesion").val(e.data.nombresesion),$(".audsalon").val(e.data.audsalon),$(".horainicio").val(e.data.horainicio),$(".horafin").val(e.data.horafin),$(".fechainicio").val(e.data.fechainicio),$(".fechafin").val(e.data.fechafin),$(".observacion").val(e.data.observacion),$(".posicion").val(e.data.posicion))}})}$(document).ready(function(){fetch(),$("#addnew").click(function(){$("#add3").modal("show")}),$("#addForm3").submit(function(e){e.preventDefault();e=$(this).serialize();$.ajax({method:"POST",url:"../../../Controller/crud_congreso/funcmodal/sesiones/add.php",data:e,dataType:"json",success:function(e){$("#add3").modal("hide"),e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch())}})}),$(document).on("click",".delete",function(){getDetails($(this).data("id")),$("#delete3").modal("show")}),$(".id").click(function(){var e=$(this).val();$.ajax({method:"POST",url:"../../../Controller/crud_congreso/funcmodal/sesiones/delete.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch()),$("#delete").modal("hide")}})}),$(document).on("click",".close",function(){$("#alert").hide()})}),$(document).on("click",".edit",function(){getDetails($(this).data("id")),$("#edit").modal("show")}),$("#editForm").submit(function(e){e.preventDefault();e=$(this).serialize();$.ajax({method:"POST",url:"../../../Controller/crud_congreso/funcmodal/sesiones/edit.php",data:e,dataType:"json",success:function(e){e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch()),$("#edit").modal("hide")}})});