$(document).ready(function(){
    var idciudad = document.dato.idciudad.value;
    

    load_data(idciudad,1);

    function load_data(idciudad,page, query = '')
    {
      $.ajax({
        url:"../../../Controller/estado_evento/fetch.php",
        method:"POST",
        data:{idciudad,page:page, query:query},
        success:function(data)
        {

          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(idciudad,page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(idciudad,1, query);
    });

    $(document).on('click', '.action', function(){
       var user_id = $(this).data('user_id');
       var user_status = $(this).data('user_status');
       var action = 'change_status';
      

       $('#message').html('');
       if(confirm("Está seguro de cambiar el estado del Evento?"))
       {
        $.ajax({
         url:'../../../Controller/estado_evento/action.php',
         method:'POST',
         data:{user_id:user_id, user_status:user_status, action:action,idciudad:idciudad},
         success:function(data)
         {
          if(data != '')
          {
            
           load_data(idciudad,1);
           
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

    $(document).on('click', '.registro', function(){
       var user_id = $(this).data('user_id');
       $('#message').html('');
       if(confirm("Está seguro de cambiar el estado de todos los eventos?"))
       {
        $.ajax({
         url:'../../../Controller/estado_evento/modificar.php',
         method:'POST',
         data:{user_id:user_id},
         success:function(data)
         {
          if(data != '')
          {
           
           load_data(idciudad,1);
           
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