<?php
require_once "../../../../Model/BD.php";
include_once('../../../../Model/connection.php');

$output = array('error' => false);


$database = new Connection();
$db = $database->open();
try {


	$idevento1 = $_POST['idevento'];
	$posicion1 = $_POST['posicion'];
	$sql = "SELECT posicion,idevento FROM evento_sesion WHERE posicion = '$posicion1' AND idevento ='$idevento1'";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {
				$output['error'] = true;
				$output['message'] = 'Ya esta registrado esta Posición ' . $posicion1;
			} else {
				$stmt = $db->prepare("INSERT INTO evento_sesion (idevento,nombresesion,audsalon,horainicio,horafin,fechainicio,fechafin,observacion,posicion) VALUES (:idevento,:nombresesion,:audsalon,:horainicio,:horafin,:fechainicio,:fechafin,:observacion,:posicion)");
				// declaración if-else en la ejecución de nuestra declaración preparada
				if ($stmt->execute(array(':idevento' => $_POST['idevento'], ':nombresesion' => $_POST['nombresesion'], ':audsalon' => $_POST['audsalon'], ':horainicio' => $_POST['horainicio'], ':horafin' => $_POST['horafin'], ':fechainicio' => $_POST['fechainicio'], ':fechafin' => $_POST['fechafin'], ':observacion' => $_POST['observacion'], ':posicion' => $_POST['posicion']))) {
					$output['message'] = 'Registro agregado correctamente';
				} else {
					$output['error'] = true;
					$output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
				}
			}
		}
	}
} catch (PDOException $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();
}

//cerrar conexión
$database->close();

echo json_encode($output);
