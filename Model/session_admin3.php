<?php 

//require_once "BD.php";
session_start();
	  $rol_id=$_SESSION['rol_id'];
	  if ($rol_id= null || $rol_id="" || $rol_id != 1 && $rol_id != 2 && $rol_id != 4) {
	   echo "Usted no tiene autorización";
	   header('location: ../../authorization.php');
	   die();
	  }


	  $usuario=$_SESSION['usuario'];

 ?>