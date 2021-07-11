<?php 

session_start();
	  $rol_id=$_SESSION['rol_id'];
	  if ($rol_id= null || $rol_id="" || $rol_id != 2) {
	   echo "Usted no tiene autorización";
	   header('location: ../../authorization.php');
	   die();
	  }
 ?>