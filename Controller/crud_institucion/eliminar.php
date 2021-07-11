<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";



$idinstitucion = $_GET['idinstitucion'];
if ($idinstitucion == 0 || $idinstitucion == 1 || $idinstitucion == 2 || $idinstitucion == 7 || $idinstitucion == 8 || $idinstitucion == 9 || $idinstitucion == 10 || $idinstitucion == 11 || $idinstitucion == 12 || $idinstitucion == 13 || $idinstitucion == 14 || $idinstitucion == 16 || $idinstitucion == 17 || $idinstitucion == 18 || $idinstitucion == 19 || $idinstitucion == 20 || $idinstitucion == 21 || $idinstitucion == 22 || $idinstitucion == 23) {
	$mensaje = "ERROR AL ELIMINAR";
} else {
	$sql = "DELETE FROM institucion_educativa WHERE idinstitucion = '$idinstitucion'";
	$resultado = $link->query($sql);
	$mensaje = "REGISTRO ELIMINADO";
}



require_once "../../../Views/funtion/crud_institucion/eliminar.php";
