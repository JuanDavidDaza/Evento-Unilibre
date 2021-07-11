<?php 
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	//require_once "modelo_grafico.php";

	
	if (isset($_GET['idevento']) || ($_GET['idevento']="")) {
		$idciudad=$_SESSION['idciudad'];
		//echo $idciudad;

		$ciudadevento="SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
		$ciudadrespuesta = $link->query($ciudadevento);
		foreach($ciudadrespuesta as $rowciudadrespuesta){
			$nombreciudadevento=$rowciudadrespuesta['nombre'];
		}
		$idevento=(isset($_GET['idevento']))?$_GET['idevento']:"";


		$sql3="SELECT idevento, COUNT(*) AS pre_inscripcion FROM pre_inscripcion WHERE idevento='$idevento' GROUP BY idevento";
		$resultado3 = $link->query($sql3);
		$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);


		$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
		$resultado = $link->query($sql);

		$row = $resultado->fetch_array(MYSQLI_ASSOC);


		$sql1="SELECT nombresesion,id  FROM evento_sesion WHERE idevento='$idevento'";
		$resultado1 = $link->query($sql1);
		$resultado6 = $link->query($sql1);

		
		
		$sql2="SELECT idevento,idsesion, COUNT(*) AS asistente_sesion FROM asistente_sesion WHERE idevento='$idevento' GROUP BY idsesion";
		$resultado2 = $link->query($sql2);

		$sql5="SELECT COUNT(evento_sesion.id) AS sesiones FROM evento_sesion  WHERE idevento='$idevento' GROUP BY evento_sesion.idevento";
		$resultado5=$link->query($sql5);
		$numerodesesiones = $resultado5->fetch_array(MYSQLI_ASSOC);

		$sesiones=$numerodesesiones['sesiones'];
		

		$cont=0; 
		while ($row1 = $resultado1 ->fetch_array(MYSQLI_ASSOC)) {
			$nombre[$cont]= $row1['nombresesion'];
			$cont=$cont+1;
		}
	}
	else{
		header('location: index.php');
	}

	
	


require_once "../../../Views/funtion/diagrama/diagrama.php";




 ?>