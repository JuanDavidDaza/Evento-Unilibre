<?php



session_start();
$rol_id = $_SESSION['rol_id'];
if ($rol_id = null || $rol_id = "") {
	echo "Usted no tiene autorización";
	die();
}

$_SESSION = array();
session_destroy();

header("location:../index.php");

exit;
