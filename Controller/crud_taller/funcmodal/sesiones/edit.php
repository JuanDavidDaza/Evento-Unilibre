<?php
include_once('../../../../Model/BD.php');
include_once('../../../../Model/connection.php');


$output = array('error' => false);

$database = new Connection();
$db = $database->open();
try {
	$posicion1 = $_POST['posicion'];
	$posicion2 = $_POST['posicion2'];
	//$output['message'] = 'vieja '.$posicion1 . " ,Nueva " . $posicion2;

	$idevento1 = $_POST['idevento'];
	$sql = "SELECT posicion,idevento FROM evento_sesion WHERE posicion = '$posicion1' AND idevento ='$idevento1'";


	if ($posicion1 === $posicion2) {
		$stmt = $db->prepare("UPDATE evento_sesion SET nombresesion = :nombresesion, audsalon = :audsalon, horainicio = :horainicio, horafin = :horafin, fechainicio = :fechainicio, fechafin = :fechafin, observacion = :observacion, posicion = :posicion WHERE id =:id and idevento =:idevento");

		if ($stmt->execute(array(':id' => $_POST['id'], ':idevento' => $_POST['idevento'], ':nombresesion' => $_POST['nombresesion'], ':audsalon' => $_POST['audsalon'], ':horainicio' => $_POST['horainicio'], ':horafin' => $_POST['horafin'], ':fechainicio' => $_POST['fechainicio'], ':fechafin' => $_POST['fechafin'], ':observacion' => $_POST['observacion'], ':posicion' => $_POST['posicion']))) {
			$output['message'] = 'Actualizado  correctamente ';
		} else {
			$output['error'] = true;
			$output['message'] = 'Ocurrió un error al Editar. No se pudo Editar';
		}
	} else {
		if ($sql = mysqli_prepare($link, $sql)) {
			if (mysqli_stmt_execute($sql)) {
				mysqli_stmt_store_result($sql);

				if (mysqli_stmt_num_rows($sql) == 1) {
					$output['error'] = true;
					$output['message'] = 'Ya esta registrada esta Posición ' . $_POST['posicion'];
				} else {
					$stmt = $db->prepare("UPDATE evento_sesion SET nombresesion = :nombresesion, audsalon = :audsalon, horainicio = :horainicio, horafin = :horafin, fechainicio = :fechainicio, fechafin = :fechafin, observacion = :observacion, posicion = :posicion WHERE id =:id and idevento =:idevento");

					if ($stmt->execute(array(':id' => $_POST['id'], ':idevento' => $_POST['idevento'], ':nombresesion' => $_POST['nombresesion'], ':audsalon' => $_POST['audsalon'], ':horainicio' => $_POST['horainicio'], ':horafin' => $_POST['horafin'], ':fechainicio' => $_POST['fechainicio'], ':fechafin' => $_POST['fechafin'], ':observacion' => $_POST['observacion'], ':posicion' => $_POST['posicion']))) {
						$output['message'] = 'Actualizado  correctamente';
					} else {
						$output['error'] = true;
						$output['message'] = 'Ocurrió un error al Editar. No se pudo Editar';
					}
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
