$(document).ready(function () {
  //----------------------------------PROGRAMA--------------------------------------------------------

  fetch();
  //add
  $("#addnew").click(function () {
    $("#add3").modal("show");
  });
  $("#addForm3").submit(function (e) {
    e.preventDefault();
    var addform = $(this).serialize();
    //console.log(addform);
    $.ajax({
      method: "POST",
      url: "funcmodal/sesiones/add.php",
      data: addform,
      dataType: "json",
      success: function (response) {
        $("#add3").modal("hide");
        if (response.error) {
          $("#alert").show();
          $("#alert_message").html(response.message);
        } else {
          $("#alert").show();
          $("#alert_message").html(response.message);
          fetch();
        }
      },
    });
  });

  //delete
  $(document).on("click", ".delete", function () {
    var id = $(this).data("id");
    getDetails(id);
    $("#delete3").modal("show");
  });

  $(".id").click(function () {
    var id = $(this).val();
    $.ajax({
      method: "POST",
      url: "funcmodal/sesiones/delete.php",
      data: { id: id },
      dataType: "json",
      success: function (response) {
        if (response.error) {
          $("#alert").show();
          $("#alert_message").html(response.message);
        } else {
          $("#alert").show();
          $("#alert_message").html(response.message);
          fetch();
        }

        $("#delete").modal("hide");
      },
    });
  });
  //

  //hide message
  $(document).on("click", ".close", function () {
    $("#alert").hide();
  });
}); // hasta aqui

$(document).on("click", ".edit", function () {
  var id = $(this).data("id");
  getDetails(id);
  $("#edit").modal("show");
});
$("#editForm").submit(function (e) {
  e.preventDefault();
  var editform = $(this).serialize();
  $.ajax({
    method: "POST",
    url: "funcmodal/sesiones/edit.php",
    data: editform,
    dataType: "json",
    success: function (response) {
      if (response.error) {
        $("#alert").show();
        $("#alert_message").html(response.message);
      } else {
        $("#alert").show();
        $("#alert_message").html(response.message);
        fetch();
      }

      $("#edit").modal("hide");
    },
  });
});
//______________PROGRAMA______________________
function fetch() {
  $.ajax({
    method: "POST",
    url: "funcmodal/sesiones/fetch.php",
    data: "idevento=" + $("#idevento").val(),
    success: function (response) {
      $("#tbody").html(response);
    },
  });
}
function getDetails(id) {
  $.ajax({
    method: "POST",
    url: "funcmodal/sesiones/fetch_row.php",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      if (response.error) {
        $("#edit").modal("hide");
        $("#delete").modal("hide");
        $("#alert").show();
        $("#alert_message").html(response.message);
      } else {
        $(".id").val(response.data.id);
        $(".idevento").val(response.data.idevento);
        $(".idsesion").val(response.data.idsesion);
        $(".nombresesion").val(response.data.nombresesion);
        $(".audsalon").val(response.data.audsalon);
        $(".horainicio").val(response.data.horainicio);
        $(".horafin").val(response.data.horafin);
        $(".fechainicio").val(response.data.fechainicio);
        $(".fechafin").val(response.data.fechafin);
        $(".observacion").val(response.data.observacion);
        $(".posicion").val(response.data.posicion);
      }
    },
  });
}
