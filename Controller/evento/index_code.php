<?php
require_once "./Model/BD.php";

$eventotipo = 0;

$nombreciudad = "";

//eventos
$acentos = $link->query("SET NAMES 'utf8'");
$sql = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo'  AND evento_tipo.idtipoeve != 7 ";


$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

//$nombretipo= $row['nombretipo'];
//$ciudad= $row['nombre'];

$img = array();
$cont = 0;
foreach ($resultado as $row2) {
	$idevento3 = $row2['idevento'];

	$sql2 = "SELECT * FROM evento_foto WHERE idevento='$idevento3' and tipo='Principal'";
	$resultado3 = $link->query($sql2);
	$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);

	if ($sql2 = mysqli_prepare($link, $sql2)) {
		if (mysqli_stmt_execute($sql2)) {
			mysqli_stmt_store_result($sql2);

			if (mysqli_stmt_num_rows($sql2) == 1) {
				$img[$cont] = $row3['foto'];
				$nombre[$cont] = $row3['nombre'];
				$detalles[$cont] = $row3['detalles'];
				$cont = $cont + 1;
			} else {
				$img[$cont] = 'logopequeño.jpg';
				$nombre[$cont] = "Universidad Libre";
				$detalles[$cont] = "Evento";
				$cont = $cont + 1;
			}
		}
	}
}

//Calendario
$datos = [];
$idciudad = 0;
$n1 = 0;
$sqls = "SELECT evento.idevento,evento_tipo.nombretipo,evento.nombreevento,evento.generalinfo,evento_sesion.fechainicio, ciudad.nombre AS Ciudad FROM evento  INNER JOIN evento_sesion ON evento_sesion.idevento=evento.idevento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo'  AND evento_tipo.idtipoeve != 7  GROUP BY evento_sesion.idevento";
$resp = $link->query($sqls);
foreach ($resp as $rowevento) {

	$fecha1 = $rowevento['fechainicio'];
	//echo $fecha1. ', ';
	$fecha2 = date("Y-m-d", strtotime($fecha1 . "+ 1 days"));
	//echo $fecha2. ', ';

	$datos[$n1] = '{ id:"' . $rowevento['idevento'] . '", name:"' . $rowevento['nombretipo'] . '", badge: "Activo", description:  "' . $rowevento['nombreevento'] . ' <br><strong>Ciudad: ' . $rowevento['Ciudad'] . '</strong> <a href=http://eventos.unilibre.edu.co/detalles.php?idevento=' . $rowevento['idevento'] . '>- Ver Detalles</a>  ", date:"' . $fecha2 . '" ,  time: null, type: "event"},';

	$n1 = $n1 + 1;
}



////////////////////////////////////////////////////////////////////////////

require('Views/index.php');
