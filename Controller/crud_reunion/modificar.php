<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$acentos = $link->query("SET NAMES 'utf8'");

$idevento = $_GET['idevento'];
$BD = new basedatos();

$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

$sql1 = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'";
$resultado1 = $link->query($sql1);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $row['idciudad']);
require_once "../../../Views/funtion/crud_reunion/modificar.php";
