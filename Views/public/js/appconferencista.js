function fetch(){$.ajax({method:"POST",url:"../../../Controller/funcmodal/conferencista/fetch.php",data:"idevento="+$("#idevento").val(),success:function(e){$("#tbody").html(e)}})}function getDetails(e){$.ajax({method:"POST",url:"../../../Controller/funcmodal/conferencista/fetch_row.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#delete").modal("hide"),$("#alert").show(),$("#alert_message").html(e.message)):($(".id").val(e.data.id),$(".nombre").val(e.data.nombre),$(".idevento").val(e.data.idevento),$(".conferencia").val(e.data.conferencia),$(".duracion").val(e.data.duracion))}})}$(document).ready(function(){fetch(),$("#addnew").click(function(){$("#add1").modal("show")}),$("#addForm1").submit(function(e){e.preventDefault();e=$(this).serialize();$.ajax({method:"POST",url:"../../../Controller/funcmodal/conferencista/add.php",data:e,dataType:"json",success:function(e){$("#add1").modal("hide"),e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch())}})}),$(document).on("click",".delete",function(){getDetails($(this).data("id")),$("#delete1").modal("show")}),$(".id").click(function(){var e=$(this).val();$.ajax({method:"POST",url:"../../../Controller/funcmodal/conferencista/delete.php",data:{id:e},dataType:"json",success:function(e){e.error?($("#alert").show(),$("#alert_message").html(e.message)):($("#alert").show(),$("#alert_message").html(e.message),fetch()),$("#delete1").modal("hide")}})}),$(document).on("click",".close",function(){$("#alert").hide()})});
