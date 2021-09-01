<?php
//valido si es del rol indicado
require_once "../../../Model/BD.php";
require_once "../../../Model/session_admin2.php";


$cedula = $_GET['cedula'];

$sql1 = "SELECT foto FROM conferencistas WHERE cedula='$cedula'";
$resultado1 = $link->query($sql1);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

if ($row1['foto'] != "imagen.jpg") {
	if (file_exists("../../../Content/imagenes_conferencistas/" . $row1["foto"])) {
		unlink("../../../Content/imagenes_conferencistas/" . $row1["foto"]);
	}
}

$sql = "DELETE FROM conferencistas WHERE cedula = '$cedula'";
$resultado = $link->query($sql);
require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_agregar_conferencista/eliminar.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";
