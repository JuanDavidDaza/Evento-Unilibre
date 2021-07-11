Conferencista();
function Conferencista() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_conferencista.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      //alert(titulo);
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "Conferencista"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}

Programas();
function Programas() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_programa.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "Programas"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}
Entidades();
function Entidades() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_entidad.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "Entidades"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}
CargarDatosGraficosPie();
function CargarDatosGraficosPie() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "graficopie"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}

CargarDatosGraficosPie1();
function CargarDatosGraficosPie1() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_activo.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "graficopie1"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}
CargarDatosGraficosPie2();
function CargarDatosGraficosPie2() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_cerrado.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "graficopie2"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}
CargarDatosGraficosPie3();
function CargarDatosGraficosPie3() {
  $.ajax({
    url: "../../Controller/diagrama/controlador_grafico_inactivo.php",
    data: "idciudad=" + $("#idciudad").val(),
    type: "POST",
  }).done(function (resp) {
    if (resp.length > 0) {
      var titulo = [];
      var cantidad = [];
      var colores = [];
      var data = JSON.parse(resp);
      //alert(resp);
      for (var i = 0; i < data.length; i++) {
        titulo.push(data[i][0]);
        cantidad.push(data[i][1]);
        colores.push(colorRGB());
      }
      CrearGrafico2(
        titulo,
        cantidad,
        colores,
        "doughnut",
        "Grafico",
        "graficopie3"
      );
      //document.getElementById("grafico").style.display = "none";
      //document.getElementById("grafico2").style.display = "block";
    }
  });
}
function CrearGrafico2(titulo, cantidad, colores, tipo, emcabezado, id) {
  var ctx = document.getElementById(id);
  var myChart = new Chart(ctx, {
    type: tipo,
    data: {
      labels: titulo,
      datasets: [
        {
          label: emcabezado,
          data: cantidad,
          backgroundColor: colores,
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        position: "top",
      },
      animation: {
        animateScale: true,
        animateRotate: true,
      },
    },
  });
}

function generarNumero(numero) {
  return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
  var coolor =
    "(" +
    generarNumero(200, 255) +
    "," +
    generarNumero(255) +
    "," +
    generarNumero(255) +
    ")";
  return "rgb" + coolor;
}
