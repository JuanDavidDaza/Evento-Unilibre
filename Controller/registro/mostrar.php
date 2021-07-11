<?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$acentos = $link->query("SET NAMES 'utf8'");
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$idciudad=$_SESSION['idciudad'];
	if (isset($_GET['registro'])) {

	$registro = $_GET['registro'];
	if($idciudad !='0'){
		$sql="SELECT registro.idasistente,registro.idevento,evento.nombreevento,registro.registro,
					ciudad.nombre, registro.idciudad FROM registro  
					INNER JOIN evento ON evento.idevento = registro.idevento
					INNER JOIN ciudad ON ciudad.idciudad = registro.idciudad
				        WHERE registro.idciudad='$idciudad' AND registro='$registro'";
		$resultado = $link->query($sql);
		$resultado1 = $link->query($sql);
		
		$datosid=[];
		$datoseve=[];
		$datosciudad=[];
		$cont=0;
		while($row1 = $resultado1->fetch_array(MYSQLI_ASSOC)) {
			$datosid [$cont]=$row1['idasistente'];
			$datoseve [$cont]=$row1['idevento'];
			$datosciudad [$cont]=$row1['idciudad'];
			
			$cont=$cont+1;
		}
		//print_r($datosid);
		//echo serialize($datosid);

		//for ($i=0; $i <$cont ; $i++) { 
			//echo $datosid[$i].'<br>';
		//}




	$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
	$connect->exec("set names utf8");
		function institucion_educativap($connect,$idciudad) 
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
		$sql="SELECT registro.idasistente,registro.idevento,evento.nombreevento,registro.registro,
					ciudad.nombre FROM registro  
					INNER JOIN evento ON evento.idevento = registro.idevento
					INNER JOIN ciudad ON ciudad.idciudad = registro.idciudad
				        WHERE  registro='$registro'";
		$resultado = $link->query($sql);
	}

	}
}

	
	
	//$sql = "SELECT * FROM evento $where";
	
	
require_once "../../../Views/funtion/registro/mostrar.php";
	
?>