
<?php
require_once "../../../Model/BD.php";
include_once('../../../Model/connection.php');

$output = array('error' => false);

$database = new Connection();
$db = $database->open();





try {

	$nombre1 = $_POST['nombre'];
	$idevento1 = $_POST['idevento'];
	$sql = "SELECT nombre,idevento FROM evento_conferencistas WHERE nombre = '$nombre1' AND idevento ='$idevento1'";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {
				$output['error'] = true;
				$output['message'] = 'Este Conferencista ya esta registrado para este Evento';
			} else {
				// hacer uso de una declaración preparada para evitar la inyección de sql
				$stmt = $db->prepare("INSERT INTO evento_conferencistas (nombre, idevento, conferencia,duracion) VALUES (:nombre, :idevento, :conferencia,:duracion)");
				// declaración if-else en la ejecución de nuestra declaración preparada
				if ($stmt->execute(array(':nombre' => $_POST['nombre'], ':idevento' => $_POST['idevento'], ':conferencia' => $_POST['conferencia'], ':duracion' => $_POST['duracion']))) {
					$output['message'] = 'Conferencista agregado correctamente';
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

?>