<?php 
	//require_once "../../../bd/session_admin.php";
	require '../../Controller/diagrama/modelo_grafico.php';
	
	$MG = new Modelo_Grafico();
	$idciudad=(isset($_POST['idciudad']))?$_POST['idciudad']:"";
	$entidad=(isset($_POST['entidad']))?$_POST['entidad']:"";
	
	
	$consulta= $MG -> Entidades_Estado($idciudad,$entidad);
	echo json_encode($consulta);




 ?>