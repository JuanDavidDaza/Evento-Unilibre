CargarDatosGraficosBar1();
CargarDatosGraficosPie();


function CargarDatosGraficosBar1(){
  $.ajax({
      url:'../../../Controller/diagrama/controlador_grafico1.php',
      data:"idevento=" + $("#idevento").val(),
      type: 'POST',
  }).done(function(resp){
    var titulo=[];
    var cantidad=[];
    var colores=[];
    var data=JSON.parse(resp);
    //alert(resp);
    for(var i=0;i<data.length;i++){

       titulo.push(data[i][1]);
       cantidad.push(data[i][2]);
       colores.push(colorRGB());
    }
    CrearGrafico(titulo,cantidad,colores,'bar','Personas Registradas','myChart');
    
  })
}

function CrearGrafico(titulo,cantidad,colores,tipo,emcabezado,id){
   var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
    type: tipo,
    data: {
        labels: titulo,
        datasets: [{
            label: emcabezado,
            data: cantidad, 
            backgroundColor: colores,
            borderColor:colores,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}

function CargarDatosGraficosPie(){
  $.ajax({
      url:'../../../Controller/diagrama/controlador_graficogenero.php',
      data:"idevento=" + $("#idevento").val(),
      type: 'POST',
  }).done(function(resp){
    if (resp.length>0) {
        var titulo=[];
        var cantidad=[];
        var colores=[];
        var data=JSON.parse(resp);
        
        //alert(resp);
        if (data == "") {
          alert('Ninguna Persona registrada a este Evento, por favor ingresa mas tarde');
        }
        
        for(var i=0;i<data.length;i++){
           titulo.push(data[i][0]);
           cantidad.push(data[i][1]);
           colores.push(colorRGB());
        }
        CrearGrafico2(titulo,cantidad,colores,'doughnut','Genero','sexo');
        //document.getElementById("grafico").style.display = "none";
        //document.getElementById("grafico2").style.display = "block";

    } 
  })
}

function CrearGrafico2(titulo,cantidad,colores,tipo,emcabezado,id){
var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
    type: tipo,
    data: {
        labels: titulo,
        datasets: [{
            label: emcabezado,
            data: cantidad, 
            backgroundColor: colores
        }]
    },
    options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        animation: {
          animateScale: true,
          animateRotate: true
        }
      }
    });
}

function generarNumero(numero){
  return (Math.random()*numero).toFixed(0);
}

function colorRGB(){
    var coolor = "("+generarNumero(200,255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
    return "rgb" + coolor;
}
