<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
include "../../../Model/code.php";

$id = $_GET['id'];
$BD = new basedatos();
$cboidciudad = $BD->ListaValores('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre');

$sql = "SELECT * FROM usuarios WHERE id=$id";
$resultado = $link->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $row['idciudad']);
$password = $row['clave'];
$clave = SED::decryption($password);
$id1 = $_SESSION['rol_id'];

//echo $id;



//echo $clave;
require_once "../../../Views/funtion/permisos/modificar.php";
