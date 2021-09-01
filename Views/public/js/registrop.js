window.onload = function() {
    var recaptcha = document.forms["contactForm"]["g-recaptcha-response"];
    recaptcha.required = true;
    recaptcha.oninvalid = function(e) {
        alertify.notify('Favor confirmar el captcha', 'warning', 5);
    }
}


function seleccionado() {
    var opt = $('select[name="idinstitucion"] option:selected').val();
    //alert(opt);
    if (
      opt == "0" ||
      opt == "7" ||
      opt == "8" ||
      opt == "9" ||
      opt == "10" ||
      opt == "11" ||
      opt == "12"
    ) {
      $("#otro").show();
    } else {
      $("#otro").hide();
    }
  }
  
  $(document).ready(function () {
    // $('#idinstitucion').select2();
    //$('#idinstitucion').val('2').trigger('change.select2');
  
    //alert($('select[name="idinstitucion"] option:selected').text());
  
    momentoActual = new Date();
    hora_actual = parseInt(momentoActual.getHours());
    minuto_actual = parseInt(momentoActual.getMinutes());
    segundo_actual = parseInt(momentoActual.getSeconds());
  
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();
  
    //alert(mm);
  
    var hora_evento_inicio = document.contactForm.hora_inicio.value;
    var hora_evento_fin = document.contactForm.hora_fin.value;
    var fecha_evento_inicio = document.contactForm.fecha_inicio.value;
    //alert(hora_actual);
  
    //alert(minuto_actual);
  
    //var estado=<?php echo $hora; ?>;
    tipoevento = $("#tipoevento").val();
  
    //inicio
    var horas_evento_inicio1 = parseInt(hora_evento_inicio.split(":")[0]);
    var minutos_evento_inicio = parseInt(hora_evento_inicio.split(":")[1]);
  
    var año_evento_inicio = parseInt(fecha_evento_inicio.split("-")[0]);
    var mes_evento_inicio = parseInt(fecha_evento_inicio.split("-")[1]);
    var dia_evento_inicio = parseInt(fecha_evento_inicio.split("-")[2]);
    //fin
    var horas_evento_fin = parseInt(hora_evento_fin.split(":")[0]);
    var minutos_evento_fin = parseInt(hora_evento_fin.split(":")[1]);
  
    //alert(minutos_evento_inicio);
  
    var horas_evento_inicio = horas_evento_inicio1 - 1;
    //alert(horas_evento_inicio);
  
    if (tipoevento == 5 || tipoevento == 1) {
      if (
        dd == dia_evento_inicio &&
        mm == mes_evento_inicio &&
        yyyy == año_evento_inicio
      ) {
        if (
          hora_actual >= horas_evento_inicio &&
          hora_actual <= horas_evento_fin
        ) {
          if (
            hora_actual >= horas_evento_inicio &&
            minuto_actual >= minutos_evento_inicio
          ) {
            alert("Ya puedes registrarte");
            document.contactForm.submit.disabled = false;
          }
          if (hora_actual > horas_evento_inicio) {
            alert("Ya puedes registrarte");
            document.contactForm.submit.disabled = false;
          }
        } else {
          alert(
            "Esta Reunión todavía no empieza o ya se terminó. Sólo admite inscripción el mismo día desde una hora antes, hasta la hora de finalización"
          );
          document.contactForm.submit.disabled = true;
        }
      } else {
        alert(
          "Hoy no es la Reunión. Sólo admite inscripción el mismo día desde una hora antes, hasta la hora de finalización"
        );
        document.contactForm.submit.disabled = true;
      }
    } else {
      // alert("No es una Reunión");
    }
  });

