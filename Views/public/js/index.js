
$(document).ready(function() {
  $('#idciudad').select2();
  $('#idciudad').val('<?php echo $idciudad; ?>').trigger('change.select2');
  $('#eventotipo').select2();
  $('#eventotipo').val('<?php echo $eventotipo; ?>').trigger('change.select2');

$("#calendar").evoCalendar({
        theme: 'Orange Coral',
        format: "MM dd, yyyy",
        titleFormat: "MM",
        language: 'es',
        calendarEvents: <?php echo '[';
        for ($i=0; $i < $n1 ; $i++) { 
           echo $datos[$i];
         } 
         echo ']';
        ?>
    });
  
});
