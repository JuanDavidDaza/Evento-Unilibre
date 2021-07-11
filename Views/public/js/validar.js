function printError(elemId, hintMsg) {
  document.getElementById(elemId).innerHTML = hintMsg;
}

function isValidDate(day, month, year) {
  var dteDate;
  month = month - 1;
  dteDate = new Date(year, month, day);

  //Devuelva true o false...
  return (
    day == dteDate.getDate() &&
    month == dteDate.getMonth() &&
    year == dteDate.getFullYear()
  );
}

function validate_fecha(fecha) {
  var patron = new RegExp(
    "^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$"
  );

  if (fecha.search(patron) == 0) {
    var values = fecha.split("-");
    if (isValidDate(values[2], values[1], values[0])) {
      return true;
    }
  }
  return false;
}

function validateForm() {
  var nombreevento = document.contactForm.nombreevento.value;
  var generalinfo = document.contactForm.generalinfo.value;
  var tematica = document.contactForm.tematica.value;
  var responsable = document.contactForm.responsable.value;
  var audsalon = document.contactForm.audsalon.value;
  //var horainicio = document.contactForm.horainicio.value;
  // var horafin = document.contactForm.horafin.value; horainicioErr=horafinErr=
  var fechainicio = document.contactForm.fechainicio.value;
  var fechafin = document.contactForm.fechafin.value;

  var nombreeventoErr =
    (generalinfoErr =
    tematicaErr =
    responsableErr =
    audsalonErr =
    fechainicioErr =
    fechafinErr =
      true);

  // Validate nombre
  if (nombreevento == "") {
    printError("nombreeventoErr", "Por favor ingrese el Nombre del Evento");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(nombreevento) === false) {
      printError(
        "nombreeventoErr",
        "Por favor ingrese su Nombre Completo valido y con Max 100 letras"
      );
    } else {
      printError("nombreeventoErr", "");
      nombreeventoErr = false;
    }
  }
  if (generalinfo == "") {
    printError("generalinfoErr", "Por favor ingrese la Descripción");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,800}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(generalinfo) === false) {
      printError(
        "generalinfoErr",
        "Por favor ingrese una Descripción valida y con Max 800"
      );
    } else {
      printError("generalinfoErr", "");
      generalinfoErr = false;
    }
  }

  if (tematica == "") {
    printError("tematicaErr", "Por favor ingrese la Tematica");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(tematica) === false) {
      printError(
        "tematicaErr",
        "Por favor ingrese una Tematica valida y con Max 100 letras"
      );
    } else {
      printError("tematicaErr", "");
      tematicaErr = false;
    }
  }

  if (responsable == "") {
    printError("responsableErr", "Por favor ingrese el Responsable");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(responsable) === false) {
      printError(
        "responsableErr",
        "Por favor ingrese un Responsable valido y con Max 100 letras"
      );
    } else {
      printError("responsableErr", "");
      responsableErr = false;
    }
  }

  if (audsalon == "") {
    printError("audsalonErr", "Por favor ingrese el Lugar");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.:/,-]{5,70}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(audsalon) === false) {
      printError(
        "audsalonErr",
        "Por favor ingrese un lugar valido y con Max 50 letras"
      );
    } else {
      printError("audsalonErr", "");
      audsalonErr = false;
    }
  }

  if (fechainicio === "") {
    printError("fechainicioErr", "Por favor ingrese una Fecha de Inicio");
  } else {
    if (validate_fecha(fechainicio) == false) {
      printError("fechainicioErr", "Por favor ingrese una Fecha Valida");
    } else {
      printError("fechainicioErr", "");
      fechainicioErr = false;
    }
  }

  if (fechafin == "") {
    printError("fechafinErr", "Por favor ingrese una Fecha de Finalización");
  } else {
    if (validate_fecha(fechafin) == false) {
      printError("fechafinErr", "Por favor ingrese una Fecha Valida");
    } else {
      printError("fechafinErr", "");
      fechafinErr = false;
    }
  }

  /*

        if (horainicio==="") {
            printError("horainicioErr", "Por favor ingrese una Hora Inicio");
        }else{
                if (horainicio.length>8) {
                    printError("horainicioErr", "Introdujo una cadena mayor a 8 caracteres");
                    horainicioErr = false;
                }
                a=horainicio.charAt(0) //<=2
                b=horainicio.charAt(1) //<4
                c=horainicio.charAt(2) //:
                d=horainicio.charAt(3) //<=5
                e=horainicio.charAt(5) //:     5
                //f=horainicio.charAt(6) //<=5
                if ((a==2 && b>3) || (a>2)) {
                    printError("horainicioErr", "El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23");
                    horainicioErr = false;
                }
                if (d>5) {
                    printError("horainicioErr", "El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
                    horainicioErr = false;
                }
                if (e>5) {
                    printError("horainicioErr", "El valor que introdujo en los segundos no corresponde");
                    horainicioErr = false;
                }
                if (c!=':') {
                    printError("horainicioErr", "Introducir HH:MM:SS");
                    horainicioErr = false;
                }

        }

        if (horafin=="") {
            printError("horafinErr", "Por favor ingrese una Hora de Finalización");
        }else{
                if (horafin.length>8) {
                    printError("horafinErr", "Introdujo una cadena mayor a 8 caracteres");
                    horafinErr = false;
                }
                
                a=horafin.charAt(0) //<=2
                b=horafin.charAt(1) //<4
                c=horafin.charAt(2) //:
                d=horafin.charAt(3) //<=5
                e=horafin.charAt(5) //:     5
                //f=horafin.charAt(6) //<=5
                if ((a==2 && b>3) || (a>2)) {
                    printError("horafinErr", "El valor que introdujo en la Hora no corresponde, introduzca un digito entre 00 y 23");
                    horafinErr = false;
                }
                if (d>5) {
                    printError("horafinErr", "El valor que introdujo en los minutos no corresponde, introduzca un digito entre 00 y 59");
                    horafinErr = false;
                }
                if (e>5) {
                    printError("horafinErr", "El valor que introdujo en los segundos no corresponde");
                    horafinErr = false;
                }
                if (c!=':') {
                    printError("horafinErr", "Introducir HH:MM");
                    horainicioErr = false;
                }

        }|| horainicioErr || horafinErr
       
*/

  if (
    (nombreeventoErr ||
      generalinfoErr ||
      tematicaErr ||
      responsableErr ||
      audsalonErr ||
      fechainicioErr ||
      fechafinErr) == true
  ) {
    return false;
  } else {
    //var dataPreview = "Validación Correcta";
    //alert(dataPreview);
  }
}
