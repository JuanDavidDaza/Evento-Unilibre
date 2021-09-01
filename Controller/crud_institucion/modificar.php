<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

$idinstitucion = $_GET['idinstitucion'];


$sql = "SELECT * FROM institucion_educativa WHERE idinstitucion = '$idinstitucion'";
$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$BD = new basedatos();
$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $row['idciudad']);


require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_institucion/modificar.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
