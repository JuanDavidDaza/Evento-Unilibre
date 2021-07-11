<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

$idevento = $_GET['idevento'];


$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);
$nombreevento = $row['nombreevento'];

require_once "../../../Views/funtion/crud_taller/modificar4.php";
