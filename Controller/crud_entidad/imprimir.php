<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";


$idciudad = $_SESSION['idciudad'];

//$sql = "SELECT * FROM evento $where";
if ($idciudad != '0') {
	$sql = "SELECT entidad.identidad, entidad.nombreentidad,ciudad.nombre, entidad.url FROM entidad INNER JOIN ciudad on ciudad.idciudad = entidad.idciudad WHERE entidad.idciudad = '$idciudad'";
	$resultado = $link->query($sql);
} else {
	$sql = "SELECT entidad.identidad, entidad.nombreentidad,ciudad.nombre FROM entidad INNER JOIN ciudad on ciudad.idciudad = entidad.idciudad";
	$resultado = $link->query($sql);
}

require_once "../../../Views/funtion/crud_entidad/imprimir.php";
