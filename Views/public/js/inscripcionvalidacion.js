function printError(r, e) {
  document.getElementById(r).innerHTML = e;
}
function validateForm() {
  var r = document.contactForm.name.value,
    e = document.contactForm.idasistente.value,
    o = document.contactForm.mobile.value,
    n = document.contactForm.email.value,
    i = document.contactForm.gender.value,
    t = !0,
    E = !0,
    m = (emailErr = genderErr = !0);
  if (
    ("" == r
      ? printError("nameErr", "Por favor ingrese su nombre")
      : !1 ===
        /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙñÑ.-]{10,50}$/.test(
          r
        )
      ? printError(
          "nameErr",
          "Por favor ingrese su Nombre Completo valido y con Max 50 letras"
        )
      : (printError("nameErr", ""), (t = !1)),
    "" == i
      ? printError("genderErr", "Por favor selecciona tu Genero")
      : (printError("genderErr", ""), (genderErr = !1)),
    (a = i.charAt(0)),
    ("F" !== a && "M" !== a && "N" !== a) ||
      (printError("genderErr", "Por favor seleccione tu Genero"),
      (genderErr = !1)),
    "" == e
      ? printError(
          "idasistenteErr",
          "Por favor ingrese un Numero de identificación"
        )
      : !1 === /^[1-9]\d{6,9}$/.test(e)
      ? printError(
          "idasistenteErr",
          "Por favor ingrese un Numero de identificación valido de 10 digitos"
        )
      : (printError("idasistenteErr", ""), (E = !1)),
    "" == n
      ? printError("emailErr", "Por favor ingrese un Correo")
      : !1 ===
        /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,15}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,20}[a-zA-Z0-9])?)*$/.test(
          n
        )
      ? printError("emailErr", "Por favor ingrese un Correo Valido")
      : (printError("emailErr", ""), (emailErr = !1)),
    "" == o
      ? printError("mobileErr", "Por favor ingrese un numero telefonico")
      : !1 === /^[0-9]\d{9}$/.test(o)
      ? printError(
          "mobileErr",
          "por favor ingrese un numero telefonico de 10 numeros"
        )
      : (printError("mobileErr", ""), (m = !1)),
    1 == (t || E || m || emailErr || genderErr))
  )
    return !1;
}
