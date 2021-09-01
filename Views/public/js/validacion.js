function printError(elemId, hintMsg) {
  document.getElementById(elemId).innerHTML = hintMsg;
}
function validateForm() {
  var name = document.contactForm.name.value;
  var idasistente = document.contactForm.idasistente.value;
  var mobile = document.contactForm.mobile.value;
  var email = document.contactForm.email.value;
  var gender = document.contactForm.gender.value;
  var cual = document.contactForm.cual.value;

  var nameErr = true;
  var idasistenteErr = true;
  var mobileErr = emailErr = genderErr = cualErr = true;

  // Validate name
  if (name == "") {
    printError("nameErr", "Por favor ingrese su nombre");
  } else {
    var regex =
      /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{8,50}$/;
    //[a-zA-Z\s]

    if (regex.test(name) === false) {
      printError(
        "nameErr",
        "Por favor ingrese su Nombre Completo valido y con Max 50 letras"
      );
    } else {
      printError("nameErr", "");
      nameErr = false;
    }
  }

  if (cual == "") {
    //printError("cualErr", "Por favor ingrese un Correo");
    printError("cualErr", "");
    cualErr = false;
  } else {
    var regex = /^[a-zA-Z\s]{5,50}$/;
    if (regex.test(cual) === false) {
      printError(
        "cualErr",
        "Por favor ingrese una Entidad o Institución valida"
      );
      cualErr = true;
    } else {
      printError("cualErr", "");
      cualErr = false;
    }
  }
  a = gender.charAt(0);
  //alert(a);
  if (a === "F" || a === "M" || a === "N") {
    //printError("genderErr", "Por favor seleccione tu Genero");
    genderErr = false;
  }

  if (gender == "") {
    printError("genderErr", "Por favor selecciona tu Genero");
  } else {
    printError("genderErr", "");
    genderErr = false;
  }

  if (idasistente == "") {
    printError(
      "idasistenteErr",
      "Por favor ingrese un Numero de identificación"
    );
  } else {
    var regex = /^[1-9]\d{4,9}$/;
    if (regex.test(idasistente) === false) {
      printError(
        "idasistenteErr",
        "Por favor ingrese un Numero de identificación valido de 10 digitos"
      );
    } else {
      printError("idasistenteErr", "");
      idasistenteErr = false;
    }
  }

  if (email == "") {
    printError("emailErr", "Por favor ingrese un Correo");
  } else {
    // Regular expression for basic email validation
    var regex =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,15}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,20}[a-zA-Z0-9])?)*$/;
    if (regex.test(email) === false) {
      printError("emailErr", "Por favor ingrese un Correo Valido");
    } else {
      printError("emailErr", "");
      emailErr = false;
    }
  }

  if (mobile == "") {
    printError("mobileErr", "Por favor ingrese un numero telefonico");
  } else {
    var regex = /^[0-9]\d{9}$/;
    if (regex.test(mobile) === false) {
      printError(
        "mobileErr",
        "por favor ingrese un numero telefonico de 10 numeros"
      );
    } else {
      printError("mobileErr", "");
      mobileErr = false;
    }
  }

  if (
    (nameErr ||
      idasistenteErr ||
      mobileErr ||
      emailErr ||
      genderErr ||
      cualErr) == true
  ) {
    return false;
  } else {
    if (tipoevento != 1 && tipoevento != 5) {
      document.getElementById("submit").disabled = true;
      
      $.ajax({
        method: "POST",
        url: "Controller/evento/mensaje.php",
        data: {},
        dataType: "json",
        success: function (response) {
          if (response.error) {
            $("#alert").show();
            $("#alert_message").html(response.message);
          } else {
            $("#alert").show();
            $("#alert_message").html(response.message);
          }
        },
      });
    }
  }
}
