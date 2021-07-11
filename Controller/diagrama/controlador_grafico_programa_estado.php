<?php 
	//require_once "../../../bd/session_admin.php";
	require '../../Controller/diagrama/modelo_grafico.php';
	
	$MG = new Modelo_Grafico();
	$idciudad=(isset($_POST['idciudad']))?$_POST['idciudad']:"";
	$programa=(isset($_POST['programa']))?$_POST['programa']:"";
	
	
	$consulta= $MG -> Programas_Estado($idciudad,$programa);
	echo json_encode($consulta);




 ?>