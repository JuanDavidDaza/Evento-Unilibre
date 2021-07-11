<!DOCTYPE html>
<html>
  <head>
    <title>Live Data Search with Pagination in PHP using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon"  href = "../../images/favicon.ico" type="image/x-icon" > 

    <!--<link rel="stylesheet" href="../../componentes/css/main.css"> -->
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../componentes/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../../componentes/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  </head>
  <body>
    <br />
    <div class="container">
      
      <br />
      <div class="card">
        <form id="dato" name="dato">
           <input type="number" name="idevento" hidden id="idevento" value="23">
           <input type="number" name="id" id="id"  hidden value="50">
         </form>
        <span id="message"></span>
        <div class="card-body">
          <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></span>
              <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Buscar" />
              
          </div><br>
          

          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(document).ready(function(){
    var idevento = document.dato.idevento.value;
    var id = document.dato.id.value;

    load_data(idevento,id,1);

    function load_data(idevento,id,page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{idevento,id,page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(idevento,id,page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(idevento,id,1, query);
    });

    $(document).on('click', '.action', function(){
       var user_id = $(this).data('user_id');
       var user_status = $(this).data('user_status');
       var action = 'change_status';
      

       $('#message').html('');
       if(confirm("Está seguro de cambiar el estado del Asistente?"))
       {
        $.ajax({
         url:'PHP/action.php',
         method:'POST',
         data:{user_id:user_id, user_status:user_status, action:action,id:id,idevento:idevento},
         success:function(data)
         {
          if(data != '')
          {
            
           load_data(idevento,id,1);
           
           $('#message').html(data);
          }
         }
        });
       }
       else
       {
        return false;
       }
      });

  });
</script>