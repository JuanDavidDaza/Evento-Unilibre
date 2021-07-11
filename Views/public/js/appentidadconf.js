$(document).ready(function () {
  //----------------------------------ENTIDAD--------------------------------------------------------

  fetch();
  //add
  $("#addnew").click(function () {
    $("#add").modal("show");
  });
  $("#addForm").submit(function (e) {
    e.preventDefault();
    var addform = $(this).serialize();
    //console.log(addform);
    $.ajax({
      method: "POST",
      url: "../../../Controller/crud_conferencista/funcmodal/entidad/add.php",
      data: addform,
      dataType: "json",
      success: function (response) {
        $("#add").modal("hide"); //add1
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
    $("#delete").modal("show");
  });

  $(".id").click(function () {
    var id = $(this).val();
    $.ajax({
      method: "POST",
      url: "../../../Controller/crud_conferencista/funcmodal/entidad/delete.php",
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

//______________Entidad______________________
function fetch() {
  $.ajax({
    method: "POST",
    url: "../../../Controller/crud_conferencista/funcmodal/entidad/fetch.php",
    data: "idevento=" + $("#idevento").val(),
    success: function (response) {
      $("#tbody").html(response);
    },
  });
}
function getDetails(id) {
  $.ajax({
    method: "POST",
    url: "../../../Controller/crud_conferencista/funcmodal/entidad/fetch_row.php",
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
        $(".entidad").val(response.data.entidad);
        $(".idevento").val(response.data.idevento);
      }
    },
  });
}
