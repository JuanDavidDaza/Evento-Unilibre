<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
//session_start();
$idciudad = $_SESSION['idciudad'];
$BD = new basedatos();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
	$sql = "SELECT nombre FROM institucion_educativa WHERE nombre='$nombre'";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {

				$mensaje = 'Ya esta Registrado esta Institución';
			} else {
				$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
				$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
				$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";


				//realiza el guardado de datos correctamenete
				$campos = ['nombre', 'telefono', 'direccion', 'idciudad'];

				$valores = [$nombre, $telefono, $direccion, $idciudad];


				if ($BD->AdicionarRegistro('institucion_educativa', $campos, $valores)) {
					$mensaje = 'Registrado Correctamente';
				} else {
					$mensaje = 'Error a Registrar';

					echo $telefono;
				}
			}
		}
	}
} //fin de agregar datos



require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_institucion/registro-code.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
