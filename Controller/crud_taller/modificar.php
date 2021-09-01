<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

$idevento = $_GET['idevento'];

$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$BD = new basedatos();
$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $row['idciudad']);


require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_taller/modificar.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";