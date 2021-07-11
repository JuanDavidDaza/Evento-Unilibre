$(document).ready(function () {
  //$('#nombre').select2({ allowClear:true, placeholder: 'Escoge una' });

  fetch();
  //add
  $("#addnew").click(function () {
    $("#add1").modal("show");
  });
  $("#addForm1").submit(function (e) {
    e.preventDefault();
    var addform = $(this).serialize();
    //console.log(addform);
    $.ajax({
      method: "POST",
      url: "../../../Controller/crud_congreso/funcmodal/conferencista/add.php",
      data: addform,
      dataType: "json",
      success: function (response) {
        $("#add1").modal("hide");
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
    $("#delete1").modal("show");
  });

  $(".id").click(function () {
    var id = $(this).val();
    $.ajax({
      method: "POST",
      url: "../../../Controller/crud_conferencista/funcmodal/conferencista/delete.php",
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

        $("#delete1").modal("hide");
      },
    });
  });
  //

  //hide message
  $(document).on("click", ".close", function () {
    $("#alert").hide();
  });
}); // hasta aqui
//Conferencia___________________________________________________________________________________________
function fetch() {
  $.ajax({
    method: "POST",
    url: "../../../Controller/crud_conferencista/funcmodal/conferencista/fetch.php",
    data: "idevento=" + $("#idevento").val(),
    success: function (response) {
      $("#tbody").html(response);
    },
  });
}

function getDetails(id) {
  $.ajax({
    method: "POST",
    url: "../../../Controller/crud_conferencista/funcmodal/conferencista/fetch_row.php",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      if (response.error) {
        $("#delete").modal("hide");
        $("#alert").show();
        $("#alert_message").html(response.message);
      } else {
        $(".id").val(response.data.id);
        $(".nombre").val(response.data.nombre);
        $(".idevento").val(response.data.idevento);
        $(".conferencia").val(response.data.conferencia);
        $(".duracion").val(response.data.duracion);
      }
    },
  });
}
