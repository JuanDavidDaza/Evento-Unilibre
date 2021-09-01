  <?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";

	$BD = new basedatos();
	$tipo = $_POST['tipo'];
	$datoid = $_POST['datoid'];
	$datoeve = $_POST['datoeve'];
	$datociudad = $_POST['datociudad'];
	$cont = $_POST['cont'];
	$registro = $_POST['registro'];


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if ($tipo == 1) {
			//echo $tipo.'<br>';
			$idinstitucion = $_POST['idinstitucion'];

			//echo $idinstitucion;
			//print_r($datoid);
			for ($i = 0; $i < $cont; $i++) {

				//Cambio por la Entidad escogida
				$sqlreemplazar = "UPDATE pre_inscripcion SET idinstitucion='$idinstitucion' WHERE idasistente='$datoid[$i]' AND idinstitucion='0' AND idevento='$datoeve[$i]'";

				$resultado = $link->query($sqlreemplazar);

				$sqlreemplazar1 = "UPDATE asistente_sesion SET idinstitucion='$idinstitucion' WHERE idasistente='$datoid[$i]' AND idinstitucion='0' AND idevento='$datoeve[$i]'";
				$resultado1 = $link->query($sqlreemplazar1);
				//Elimino los datos de la tabla Registro
				$sqleliminar = "DELETE FROM registro WHERE registro='$registro' AND idasistente='$datoid[$i]' AND idevento='$datoeve[$i]' AND idciudad='$datociudad[$i]'";
				$resultado2 = $link->query($sqleliminar);
				//echo $sqlreemplazar.'<br>';
				//echo $sqlreemplazar1.'<br>';
				//echo $sqleliminar.'<br>';
				$mensaje = 'Registrado Correctamente';
			}
		} else if ($tipo == 2) {
			//echo $tipo.'<br>';
			//print_r($_POST['datoid']);

			$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
			$sql = "SELECT nombre FROM institucion_educativa WHERE nombre='$nombre'";

			if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);

					if (mysqli_stmt_num_rows($sql) == 1) {

						$mensaje = 'Ya esta Registrada esta Institución o Entidad';
					} else {
						$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
						$idciudadeve = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";
						$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : "";
						$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : "";


						//realiza el guardado de datos correctamenete
						$campos = ['nombre', 'telefono', 'direccion', 'idciudad'];

						$valores = [$nombre, $telefono, $direccion, $idciudadeve];


						if ($BD->AdicionarRegistro('institucion_educativa', $campos, $valores)) {
							$mensaje = 'Registrado Correctamente';
							//recupero el id
							$sqlnumber = "SELECT * FROM institucion_educativa WHERE nombre='$nombre' AND telefono='$telefono' AND direccion='$direccion'";
							$resultadodata = $link->query($sqlnumber);
							$rowdata = $resultadodata->fetch_array(MYSQLI_ASSOC);
							$idinstitucion = $rowdata['idinstitucion'];


							for ($i = 0; $i < $cont; $i++) {

								//Cambio por la Entidad escogida
								$sqlreemplazar = "UPDATE pre_inscripcion SET idinstitucion='$idinstitucion' WHERE idasistente='$datoid[$i]' AND idinstitucion='0' AND idevento='$datoeve[$i]'";

								$resultado = $link->query($sqlreemplazar);

								$sqlreemplazar1 = "UPDATE asistente_sesion SET idinstitucion='$idinstitucion' WHERE idasistente='$datoid[$i]' AND idinstitucion='0' AND idevento='$datoeve[$i]'";
								$resultado1 = $link->query($sqlreemplazar1);
								//Elimino los datos de la tabla Registro
								$sqleliminar = "DELETE FROM registro WHERE registro='$registro' AND idasistente='$datoid[$i]' AND idevento='$datoeve[$i]' AND idciudad='$datociudad[$i]'";
								$resultado2 = $link->query($sqleliminar);
								//echo $sqlreemplazar.'<br>';
								//echo $sqlreemplazar1.'<br>';
								//echo $sqleliminar.'<br>';
								$mensaje = 'Registrado Correctamente';
							}
						} else {
							$mensaje = 'Error a Registrar';
						}
					}
				}
			}
		} //
		else {
			$mensaje = 'Error';
		}
	} //fin de agregar datos


	

	require_once "../../../Views/funtion/vistas/crud/ps.php";
	require_once "../../../Views/funtion/registro/edicion.php";
	require_once "../../../Views/funtion/vistas/crud/pi.php";
