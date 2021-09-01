function fetch() {
  $.ajax({
    method: "POST",
    url: "../../../Controller/funcmodal/entidad/fetch.php",
    data: "idevento=" + $("#idevento").val(),
    success: function (e) {
      $("#tbody").html(e);
    },
  });
}
function getDetails(e) {
  $.ajax({
    method: "POST",
    url: "../../../Controller/funcmodal/entidad/fetch_row.php",
    data: { id: e },
    dataType: "json",
    success: function (e) {
      e.error
        ? ($("#edit").modal("hide"),
          $("#delete").modal("hide"),
          $("#alert").show(),
          $("#alert_message").html(e.message))
        : ($(".id").val(e.data.id),
          $(".entidad").val(e.data.entidad),
          $(".idevento").val(e.data.idevento));
    },
  });
}
$(document).ready(function () {
  fetch(),
    $("#addnew").click(function () {
      $("#add").modal("show");
    }),
    $("#addForm").submit(function (e) {
      e.preventDefault();
      e = $(this).serialize();
      $.ajax({
        method: "POST",
        url: "../../../Controller/funcmodal/entidad/add.php",
        data: e,
        dataType: "json",
        success: function (e) {
          $("#add").modal("hide"),
            e.error
              ? ($("#alert").show(), $("#alert_message").html(e.message))
              : ($("#alert").show(),
                $("#alert_message").html(e.message),
                fetch());
        },
      });
    }),
    $(document).on("click", ".delete", function () {
      getDetails($(this).data("id")), $("#delete").modal("show");
    }),
    $(".id").click(function () {
      var e = $(this).val();
      $.ajax({
        method: "POST",
        url: "../../../Controller/funcmodal/entidad/delete.php",
        data: { id: e },
        dataType: "json",
        success: function (e) {
          e.error
            ? ($("#alert").show(), $("#alert_message").html(e.message))
            : ($("#alert").show(),
              $("#alert_message").html(e.message),
              fetch()),
            $("#delete").modal("hide");
        },
      });
    }),
    $(document).on("click", ".close", function () {
      $("#alert").hide();
    });
});
