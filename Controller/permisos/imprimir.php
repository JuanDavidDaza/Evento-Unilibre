<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$idciudad = $_SESSION['idciudad'];
$id = $_SESSION['id'];

if ($id == 1) {
	$sql = "SELECT usuarios.id,usuarios.usuario,usuarios.email,rol.rol,ciudad.nombre FROM usuarios INNER JOIN rol ON rol.id = usuarios.rol_id INNER JOIN ciudad ON ciudad.idciudad = usuarios.idciudad WHERE  usuarios.idciudad = '$idciudad'";
	$resultado = $link->query($sql);
} else {
	$sql = "SELECT usuarios.id,usuarios.usuario,usuarios.email,rol.rol,ciudad.nombre FROM usuarios INNER JOIN rol ON rol.id = usuarios.rol_id INNER JOIN ciudad ON ciudad.idciudad = usuarios.idciudad WHERE  usuarios.idciudad = '$idciudad' AND usuarios.rol_id!=4 AND usuarios.rol_id!=1";
	$resultado = $link->query($sql);
}
require_once "../../../Views/funtion/permisos/imprimir.php";
