<?php
include_once('../../../../Model/connection.php');
include_once('../../../../Model/BD.php');

$output = array('error' => false);

$database = new Connection();
$db = $database->open();





try {

	$programa1 = $_POST['programa'];
	$idevento1 = $_POST['idevento'];
	$sql = "SELECT programa,idevento FROM evento_programas WHERE programa = '$programa1' AND idevento ='$idevento1'";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {
				$output['error'] = true;
				$output['message'] = 'Ya esta registrado';
			} else {
				// hacer uso de una declaración preparada para evitar la inyección de sql
				$stmt = $db->prepare("INSERT INTO evento_programas (programa, idevento) VALUES (:programa, :idevento)");
				// declaración if-else en la ejecución de nuestra declaración preparada
				if ($stmt->execute(array(':programa' => $_POST['programa'], ':idevento' => $_POST['idevento']))) {
					$output['message'] = 'Programa agregado correctamente';
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
