<?php
//Conexion a la base de datos

require_once "Model/BD.php";
include 'Controller/evento/keys.php';
$BD = new basedatos();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['idevento'])) {
		$idevento1 = $_GET['idevento'];


		$sql = "SELECT * FROM evento WHERE idevento = '$idevento1'";
		$resultado = $link->query($sql);
		$row = $resultado->fetch_array(MYSQLI_ASSOC);


		$tipoevento = $row['idtipoeve'];
		$estado = $row['estado'];
		$idciudad = $row['idciudad'];

		$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
		$connect->exec("set names utf8");
		function box2($connect, $idciudad)
		{
			$output = '';
			$query = "SELECT * FROM institucion_educativa  WHERE idciudad ='$idciudad' ORDER BY nombre ASC";
			$statement = $connect->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			foreach ($result as $row) {
				$output .= '<option value="' . $row["idinstitucion"] . '">' . $row["nombre"] . '</option>';
			}
			return $output;
		}

		//echo $estado;

		if ($estado != "Activo") {
			echo "<script> alert('Este Evento no se encuentra Activo, por favor ingrese mas tarde') </script>";
			header("refresh:1;index.php");
			die();
		}

		$BD = new basedatos();

		$cboinstitucion = $BD->ListaValores('idinstitucion', 'institucion_educativa', 'idinstitucion', 'institucion_educativa.nombre');

		//Me traigo la hora de inicio de la Reunión
		if (($tipoevento === "1") || ($tipoevento === "5")) {
			$sqlsesion = "SELECT * FROM evento_sesion WHERE idevento = '$idevento1'";
			$resultadosesion = $link->query($sqlsesion);
			$rowsesion = $resultadosesion->fetch_array(MYSQLI_ASSOC);
			$horainicio = $rowsesion['horainicio'];
			$horafin = $rowsesion['horafin'];
			$fechainicio = $rowsesion['fechafin'];
			$fechafin = $rowsesion['fechafin'];
			//echo $horainicio;
			$hora = "true";
			$tiempo = $horainicio;
			$t = "

		<input type='text' value='<?php echo $horainicio;?>'  hidden id='hora_inicio'>
    	<input type='text' value='<?php echo $horafin;?>'  hidden id='hora_fin'>
    	<input type='text' value='<?php echo $fechainicio;?>'  hidden  id='fecha_inicio'>
    	";
			$d = "

    	<h1 class='text-description'><strong>Fecha de programación de la Reunión: </strong>" . $fechainicio . "</h1><br>
        <h1 class='text-description'><strong>Hora de Inicio y de Fin</strong></h1>
        <p class='text-description'> " . date('g:i a', strtotime($horainicio)) . " - " . date('g:i a', strtotime($horafin)) . "</p>


    	";


			$horas = substr($tiempo, 0, 2);
			$minutos = substr($tiempo, 0); //nos saltamos los : puntos
			//$segundos = substr($tiempo,1,2); //nos saltamos los : puntos 
			//echo "  ,minutos".$minutos;
		} else {
			$hora = "false";
			$horainicio = "";
			$horafin = "";
			$fechainicio = "";
			$fechafin = "";
			$t = "";
			$d = "";
		}
	} else {
		echo "Error";
		header("location: index.php");
		die();
	}
} else {
	echo "Error";
	header("location: index.php");
	die();
}



include 'Views/evento/registro.php';
