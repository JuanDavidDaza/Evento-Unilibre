CargarDatosGraficosPie();



function CargarDatosGraficosPie(){
	idciudad=$("#idciudad").val();
	entidad=$("#entidad").val();

  $.ajax({
      url:'../../../Controller/diagrama/controlador_grafico_entidad_estado.php',
      data:{idciudad: idciudad ,entidad: entidad },
      type: 'POST',
  }).done(function(resp){
    if (resp.length>0) {
        var titulo=[];
        var cantidad=[];
        var colores=[];
        var data=JSON.parse(resp);
        
        //alert(resp);
        
        for(var i=0;i<data.length;i++){
           titulo.push(data[i][0]);
           cantidad.push(data[i][1]);
           colores.push(colorRGB());
        }
        CrearGrafico2(titulo,cantidad,colores,'doughnut','Genero','estado');
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
