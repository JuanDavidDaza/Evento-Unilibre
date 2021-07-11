function printError(elemId, hintMsg) {
  document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm() {
  var cedula = document.contactForm.cedula.value;
  var nombre = document.contactForm.nombre.value;
  var celular1 = document.contactForm.celular1.value;
  var celular2 = document.contactForm.celular2.value;
  var correo = document.contactForm.correo.value;
  var perfil = document.contactForm.perfil.value;
  var linkedin = document.contactForm.linkedin.value;
  var pais = document.contactForm.pais.value;

  var cedulaErr =
    (nombreErr =
    celular1Err =
    celular2Err =
    correoErr =
    perfilErr =
    linkedinErr =
    paisErr =
      true);

  if (cedula == "") {
    printError("cedulaErr", "Por favor ingrese un Numero de identificación");
  } else {
    var regex = /^[1-9]\d{3,9}$/;
    if (regex.test(cedula) === false) {
      printError(
        "cedulaErr",
        "Por favor ingrese un Numero de identificación valido de 10 digitos"
      );
    } else {
      printError("cedulaErr", "");
      cedulaErr = false;
    }
  }

  // Validate nombre
  if (nombre == "") {
    printError("nombreErr", "Por favor ingrese su nombre");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]{8,70}$/;
    //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
    if (regex.test(nombre) === false) {
      printError(
        "nombreErr",
        "Por favor ingrese su Nombre Completo valido y con Max 70 letras"
      );
    } else {
      printError("nombreErr", "");
      nombreErr = false;
    }
  }

  if (celular1 == "") {
    printError("celular1Err", "Por favor ingrese un Numero telefonico");
  } else {
    var regex = /^[1-9]\d{9}$/;
    if (regex.test(celular1) === false) {
      printError(
        "celular1Err",
        "Por favor ingrese un Numero de Telefono valido de 10 digitos"
      );
    } else {
      printError("celular1Err", "");
      celular1Err = false;
    }
  }

  if (celular2 == "") {
    //printError("celular2Err", "Por favor ingrese un Numero de telefonico");
    celular2Err = false;
  } else {
    var regex = /^[1-9]\d{9}$/;
    if (regex.test(celular2) === false) {
      printError(
        "celular2Err",
        "Por favor ingrese un Numero de telefonico valido de 10 digitos"
      );
      celular2Err = true;
    } else {
      printError("celular2Err", "");
      celular2Err = false;
    }
  }

  if (correo == "") {
    printError("correoErr", "Por favor ingrese un Correo");
  } else {
    // Regular expression for basic correo validation
    var regex =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,15}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,20}[a-zA-Z0-9])?)*$/;
    if (regex.test(correo) === false) {
      printError("correoErr", "Por favor ingrese un Correo Valido");
    } else {
      printError("correoErr", "");
      correoErr = false;
    }
  }

  // Validate nombre
  if (perfil == "") {
    printError("perfilErr", "Por favor ingrese su perfil");
  } else {
    var transformed = perfil.replace(/\s/g, "");

    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.,:;!#$%&'*+/=?^_`{|}~1234567890-]{10,400}$/;
    //var regex = /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]{10,110}$/;
    if (regex.test(transformed) === false) {
      printError(
        "perfilErr",
        "Por favor ingrese una descripción valida y con Max 400 letras"
      );
    } else {
      printError("perfilErr", "");
      perfilErr = false;
    }
  }

  if (linkedin == "") {
    //printError("linkedinErr", "Por favor ingrese un Correo");
    linkedinErr = false;
  } else {
    // Regular expression for basic linkedin validation
    var regex =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,15}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,20}[a-zA-Z0-9])?)*$/;
    if (regex.test(linkedin) === false) {
      printError("linkedinErr", "Por favor ingrese un Correo Valido");
      linkedinErr = true;
    } else {
      printError("linkedinErr", "");
      linkedinErr = false;
    }
  }

  // Validate nombre
  if (pais == "") {
    printError("paisErr", "Por favor ingrese su pais");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ.-]{1,50}$/;
    if (regex.test(pais) === false) {
      printError(
        "paisErr",
        "Por favor ingrese su Nombre Completo valido y con Max 50 letras"
      );
    } else {
      printError("paisErr", "");
      paisErr = false;
    }
  }

  if (
    (cedulaErr ||
      nombreErr ||
      celular1Err ||
      celular2Err ||
      correoErr ||
      perfilErr ||
      linkedinErr ||
      paisErr) == true
  ) {
    return false;
  } else {
    //var dataPreview = "Validación Correcta";
    //alert(dataPreview);
  }
}
