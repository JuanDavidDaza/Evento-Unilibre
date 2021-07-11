$(document).ready(function () {
  //$('#nombre').select2({ allowClear:true, placeholder: 'Escoge una' });

  fetch();
  //add
  $("#addnew").click(function () {
    $("#addFoto").modal("show");
  });
  $("#addFotoForm").submit(function (e) {
    e.preventDefault();
    var addFotoForm = $(this).FormData();
    //console.log(addFotoForm);
    $.ajax({
      method: "POST",
      url: "funcmodal/foto/add.php",
      data: addFotoForm,
      dataType: "json",
      success: function (response) {
        $("#addFoto").modal("hide");
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
    $("#deleteFoto").modal("show");
  });

  $(".id").click(function () {
    var id = $(this).val();
    $.ajax({
      method: "POST",
      url: "funcmodal/foto/delete.php",
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

        $("#deleteFoto").modal("hide");
      },
    });
  });
  //

  //hide message
  $(document).on("click", ".close", function () {
    $("#alert").hide();
  });
}); // hasta aqui

function fetch() {
  $.ajax({
    method: "POST",
    url: "funcmodal/foto/fetch.php",
    data: "idevento=" + $("#idevento").val(),
    success: function (response) {
      $("#tbody").html(response);
    },
  });
}

function getDetails(id) {
  $.ajax({
    method: "POST",
    url: "funcmodal/foto/fetch_row.php",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      if (response.error) {
        $("#delete").modal("hide");
        $("#alert").show();
        $("#alert_message").html(response.message);
      } else {
        $(".id").val(response.data.id);
      }
    },
  });
}
