function CargarDatosGraficosPie(){idciudad=$("#idciudad").val(),programa=$("#programa").val(),$.ajax({url:"../../../Controller/diagrama/controlador_grafico_programa_estado.php",data:{idciudad:idciudad,programa:programa},type:"POST"}).done(function(a){if(0<a.length){for(var r=[],o=[],e=[],t=JSON.parse(a),n=0;n<t.length;n++)r.push(t[n][0]),o.push(t[n][1]),e.push(colorRGB());CrearGrafico2(r,o,e,"doughnut","Genero","estado")}})}function CrearGrafico2(a,r,o,e,t,n){n=document.getElementById(n),new Chart(n,{type:e,data:{labels:a,datasets:[{label:t,data:r,backgroundColor:o}]},options:{responsive:!0,legend:{position:"top"},animation:{animateScale:!0,animateRotate:!0}}})}function generarNumero(a){return(Math.random()*a).toFixed(0)}function colorRGB(){return"rgb"+("("+generarNumero(200,255)+","+generarNumero(255)+","+generarNumero(255)+")")}CargarDatosGraficosPie();