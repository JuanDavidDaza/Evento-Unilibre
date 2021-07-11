<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";


$identidad = $_GET['identidad'];
$sql = "DELETE FROM entidad WHERE identidad = '$identidad'";
$resultado = $link->query($sql);


require_once "../../../Views/funtion/crud_entidad/eliminar.php";
