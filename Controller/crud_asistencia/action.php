<?php
//error_reporting(0);

if (isset($_POST["action"])) {
	require_once "../../Model/BD.php";


	$BD = new basedatos();
	$id = $_POST["id"];
	$idevento = $_POST["idevento"];


	if ($_POST["action"] == 'change_status') {


		$status = '';
		$idasistente1 = $_POST['user_id'];
		$sql2 = "SELECT * FROM pre_inscripcion WHERE idasistente = '$idasistente1' and idevento='$idevento'";
		$resultado2 = $link->query($sql2);
		$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);


		$tipoid = $row2['tipoid'];
		$nombre = $row2['nombre'];
		$correo = $row2['correo'];
		$celular = $row2['celular'];
		$genero = $row2['genero'];
		$idinstitucion = $row2['idinstitucion'];

		if ($_POST['user_status'] == 'Registrado') {

			$status = 'No Registrado';
			$sql = "DELETE FROM asistente_sesion WHERE idasistente = '$idasistente1' and idsesion='$id' and idevento='$idevento'";
			$resultado1 = $link->query($sql);
			if (isset($resultado1)) {
				echo '<div class="alert alert-danger">Asistente <strong>' . $nombre . '</strong> identificado con el numero <strong>' . $idasistente1 . '</strong> en estado <strong>' . $status . '</strong></div>';
			}
		} else {

			$status = 'Registrado';

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

				echo '<div class="alert alert-success">Asistente <strong>' . $nombre . '</strong> identificado con el numero <strong>' . $idasistente1 . '</strong> en estado <strong>' . $status . '</strong></div>';
			}
		}
	}
}
