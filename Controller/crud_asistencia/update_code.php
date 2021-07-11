<?php
//valido si es del rol indicado
	require_once "../../../Model/BD.php";
	require_once "../../../Model/session_admin3.php";



		$idasistente=(isset($_POST['idasistente']))?$_POST['idasistente']:"";
		$idasistenteviejo=(isset($_POST['idasistenteviejo']))?$_POST['idasistenteviejo']:"";
		$idevento=(isset($_POST['idevento']))?$_POST['idevento']:"";
		$tipoid=(isset($_POST['tipoid']))?$_POST['tipoid']:"";
		$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
		$correo=(isset($_POST['correo']))?$_POST['correo']:"";
		$celular=(isset($_POST['celular']))?$_POST['celular']:"";
		$genero=(isset($_POST['genero']))?$_POST['genero']:"";
		$idinstitucion=(isset($_POST['idinstitucion']))?$_POST['idinstitucion']:"";


		echo $idasistente;
		echo $idevento;
		echo $tipoid;
		echo $nombre;
		echo $correo;
		echo $celular;
		echo $genero;

	$sql = "UPDATE pre_inscripcion SET idasistente='$idasistente', idevento='$idevento', tipoid='$tipoid', correo='$correo', celular='$celular', genero='$genero', nombre='$nombre', idinstitucion='$idinstitucion' WHERE idevento = '$idevento' and idasistente ='$idasistenteviejo'";
	$resultado = $link->query($sql);

	$sql1 = "SELECT * FROM pre_inscripcion WHERE idevento = '$idevento' and idasistente='$idasistente'";
	$resultado1 = $link->query($sql1);
	$row = $resultado1->fetch_array(MYSQLI_ASSOC);

	
require('../../../Views/funtion/crud_asistencia/update.php');
	
?>
