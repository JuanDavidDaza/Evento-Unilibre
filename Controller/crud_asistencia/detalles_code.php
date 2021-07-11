<?php
	//valido si es del rol indicado
	require_once "../../../Model/BD.php";
	require_once "../../../Model/session_admin3.php";
	
	$idevento = $_GET['idevento'];
	$idevento1 = $_GET['idevento'];
	$idasistente = $_GET['idasistente'];
	$id= $_GET['id'];
/*
	$id=$_SESSION['id'];
	if ($id==2) {


	}*/

	$sql = "SELECT * FROM pre_inscripcion WHERE idevento = '$idevento' and idasistente='$idasistente'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

	$sql1 = "SELECT * FROM evento WHERE idevento = '$idevento'";
	$resultado1 = $link->query($sql1);
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

	$sql2 = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'";
	$resultado2 = $link->query($sql2);

	$sql3 = "SELECT * FROM asistente_sesion WHERE idevento = '$idevento' and idasistente='$idasistente'";
 	$resultado3 = $link->query($sql3);
 	$idciudad=$row1['idciudad'];
 	$idinstitucion=$row['idinstitucion'];

 	$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
	$connect->exec("set names utf8");
	
	function institucion_educativap($connect,$idciudad,$valor) 
	{ 
	 $output = '';
	 
	 $query = "SELECT * FROM institucion_educativa  WHERE idciudad ='$idciudad' ORDER BY nombre ASC";

	 $statement = $connect->prepare($query);
	 $statement->execute();
	 $result = $statement->fetchAll();
	 foreach($result as $row)
	 {

	  if ($row["idinstitucion"]==$valor) {
	  	$output .= '<option value="'.$row["idinstitucion"].'" selected >'.$row["nombre"].'</option>';
	  }
	  else{
	  		 $output .= '<option value="'.$row["idinstitucion"].'">'.$row["nombre"].'</option>';
	  }

	 
	 }

	 return $output;

	}


	require('../../../Views/funtion/crud_asistencia/detallesinscritos.php');


	

?>