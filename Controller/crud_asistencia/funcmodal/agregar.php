<?php
include_once('../../../Model/connection.php');
include_once('../../../Model/BD.php');

$BD = new basedatos();
$output = array('error' => false);
$database = new Connection();
$db = $database->open();


try {
	$idasistente1 = $_POST['idasistente'];
	$sql1 = "SELECT * FROM pre_inscripcion WHERE idasistente = '$idasistente1'";
	$resultado1 = $link->query($sql1);
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);


	$tipoid = $row1['tipoid'];
	$nombre = $row1['nombre'];
	$correo = $row1['correo'];
	$celular = $row1['celular'];
	$genero = $row1['genero'];
	$idinstitucion = $row1['idinstitucion'];

	$sql2 = "SELECT * FROM evento_sesion WHERE id = '" . $_POST['id'] . "'";
	$resultado2 = $link->query($sql2);
	$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);

	$idevento = $row2['idevento'];
	$id = $_POST['id'];
	//$output['message'] = 'Esta sesión ya esta registrada a este Asistente, ' . $id;

	$sql3 = "SELECT idevento FROM asistente_sesion WHERE idasistente = '$idasistente1' AND idevento ='$idevento' AND idsesion='$id'";

	if ($stmt5 = mysqli_prepare($link, $sql3)) {

		if (mysqli_stmt_execute($stmt5)) {

			mysqli_stmt_store_result($stmt5);

			if (mysqli_stmt_num_rows($stmt5) == 1) {
				$output['message'] = 'Esta sesión ya esta registrada a este Asistente';
				//echo "<script>alert('Esta sesión ya esta registrada a este Asistente');</script>";

			} else { //agrega a la tabla asistente_sesion el registro del inscrito, controlando la asistencia 


				$campos = ['idasistente', 'idevento', 'idsesion', 'tipoid', 'nombre', 'correo', 'celular', 'genero', 'idinstitucion'];

				$valores = [
					$idasistente1, $idevento, $id,
					$tipoid,
					$nombre,
					$correo,
					$celular,
					$genero,
					$idinstitucion
				];

				if ($BD->AdicionarRegistro('asistente_sesion', $campos, $valores)) {
					//echo "<script>alert('se registro correctamente');</script>";
					$output['message'] = 'Se registro correctamente';
				} else
					$output['message'] = 'Ocurrio un Error';
			}
		} else {
			//echo "Ups! Algo salió mal, inténtalo mas tarde";
			$output['error'] = true;
			$output['message'] = 'Ups! Algo salió mal, inténtalo mas tarde';
		}
	}
} catch (PDOException $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();;
}

//cerrar conexión
$database->close();

echo json_encode($output);
