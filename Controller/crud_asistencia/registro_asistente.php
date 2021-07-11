<?php
	//Conexion a la base de datos

	require_once "../../../Model/BD.php";
	require_once "../../../Model/session_admin3.php";
	$BD = new basedatos();
	
	if (isset($_GET['idevento'])) {
		$idevento1 = $_GET['idevento']; 


	$sql = "SELECT * FROM evento WHERE idevento = '$idevento1'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	$evento=$row['nombreevento'];
	$idciudad=$row['idciudad'];
	$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
	$connect->exec("set names utf8");
	function InstitucionCiudad($connect,$idciudad) 
	{ 
	 $output = '';
	 $query = "SELECT * FROM institucion_educativa  WHERE idciudad ='$idciudad' ORDER BY nombre ASC";
	 $statement = $connect->prepare($query);
	 $statement->execute();
	 $result = $statement->fetchAll();
	 foreach($result as $row)
	 {
	  $output .= '<option value="'.$row["idinstitucion"].'">'.$row["nombre"].'</option>';
	 }
	 return $output;
	}
}

	else{
		echo "Error";
		header("location: index.php");
	}

	require('../../../Views/funtion/crud_asistencia/registro_asistente.php');
