<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$acentos = $link->query("SET NAMES 'utf8'");
$idciudad = $_SESSION['idciudad'];

//$sql = "SELECT * FROM evento $where";
if ($idciudad != '0') {
	$sql = "SELECT evento.idevento,evento_sesion.fechafin,evento.nombreevento,evento.certificado,evento.tematica,evento.responsable,evento.estado,ciudad.nombre,evento.generalinfo,evento_tipo.nombretipo  FROM evento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad INNER JOIN evento_sesion ON evento_sesion.idevento=evento.idevento WHERE evento.idciudad = '$idciudad'";
	$resultado = $link->query($sql);
}


require_once "../../../Views/funtion/estado_evento/index.php";
