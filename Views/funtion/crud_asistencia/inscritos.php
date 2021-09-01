<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container">
  <div class="text-center card border-bottom-danger">

    <div class="text-center">
      <img src="../../../Content/logopequeño.png" width="150" class="logo">
      <h2 class="display-4 font-weight-bold"><STRONG>Gestión de Asistencia al Evento</STRONG></h2><br>
      <h2 class="display-4 font-weight-bold"><strong>Evento:</strong> <?php echo $row1['nombreevento']; ?></h2>
      <h2 class="display-4 font-weight-bold"><strong>Nombre de la Sesión:</strong> <?php echo $row2['nombresesion']; ?></h2>

      <nav>
        <ul class="pagination">
          <li class="page-item "><a href="sesion.php?idevento=<?php echo $idevento; ?>" class="page-link">&larr; Regresar</a></li>
        </ul>
      </nav>

    </div>
    <br>
    <br>
  </div>

  <form id="dato" name="dato">
    <input type="number" name="idevento" hidden id="idevento" value="<?php echo $idevento; ?>">
    <input type="number" name="id" id="id" hidden value="<?php echo $id; ?>">
  </form>

  <div class="card">

    <span id="message"></span>
    <div class="card-body">
      <div class="input-group">
        <span class="input-group-addon"><span class="fas fa-search" aria-hidden="true"></span></span>
        <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Buscar" />

      </div><br>


      <div class="table-responsive" id="dynamic_content">

      </div>
    </div>
  </div>





  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
        </div>

        <div class="modal-body">
          ¿Desea eliminar este Pre-Inscrito de este Evento?
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

      $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
  </script>
  <div class="row mt-3">
    <div class="col">
      <nav>
        <ul class="pagination">
          <li class="page-item "><a href="sesion.php?idevento=<?php echo $idevento; ?>" class="page-link">&larr; Regresar</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>





<script>
  $(document).ready(function() {
    var idevento = document.dato.idevento.value;
    var id = document.dato.id.value;
    //alert(id);

    load_data(idevento, id, 1);

    function load_data(idevento, id, page, query = '') {
      $.ajax({
        url: "../../../Controller/crud_asistencia/fetch.php",
        method: "POST",
        data: {
          idevento,
          id,
          page: page,
          query: query
        },
        success: function(data) {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function() {
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(idevento, id, page, query);
      //alert(page);
    });

    $('#search_box').keyup(function() {
      var query = $('#search_box').val();
      load_data(idevento, id, 1, query);
    });

    $(document).on('click', '.action', function() {
      var user_id = $(this).data('user_id');
      var user_status = $(this).data('user_status');
      var action = 'change_status';


      $('#message').html('');
      if (confirm("Está seguro de cambiar el estado del Asistente?")) {
        $.ajax({
          url: '../../../Controller/crud_asistencia/action.php',
          method: 'POST',
          data: {
            user_id: user_id,
            user_status: user_status,
            action: action,
            id: id,
            idevento: idevento
          },
          success: function(data) {
            if (data != '') {
              load_data(idevento, id, 1);

              $('#message').html(data);
            }
          }
        });
      } else {
        return false;
      }
    });

  });
</script>
