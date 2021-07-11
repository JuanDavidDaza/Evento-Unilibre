  <?php
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$BD = new basedatos();

	$txtFoto = (isset($_FILES['txtFoto']["name"])) ? $_FILES['txtFoto']["name"] : "";

	$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : "";
	$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
	$celular1 = (isset($_POST['celular1'])) ? $_POST['celular1'] : "";
	$celular2 = (isset($_POST['celular2'])) ? $_POST['celular2'] : "";
	$correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
	$linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";
	$perfil = (isset($_POST['perfil'])) ? $_POST['perfil'] : "";
	$pais = (isset($_POST['pais'])) ? $_POST['pais'] : "";


	$sql = "SELECT nombre FROM conferencistas WHERE nombre='$nombre' || cedula=$cedula";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {

				$mensaje = 'Este Conferencista ya esta registrado';
			} else {
				$Fecha = new DateTime();
				$nombreArchivo = ($txtFoto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["txtFoto"]["name"] : "imagen.jpg";



				$tmpFoto = $_FILES["txtFoto"]["tmp_name"];

				//guarda la imagen del conferencista en esta ruta
				if ($tmpFoto != "") {
					move_uploaded_file($tmpFoto, "../../../Content/imagenes_conferencistas/" . $nombreArchivo);
				}

				//realiza el guardado de datos correctamenete
				$campos = ['foto', 'cedula', 'nombre', 'celular1', 'celular2', 'correo', 'linkedin', 'perfil', 'pais'];

				$valores = [$nombreArchivo, $cedula, $nombre, $celular1, $celular2, $correo, $linkedin, $perfil, $pais];

				if ($BD->AdicionarRegistro('conferencistas', $campos, $valores)) {
					$mensaje = 'Registrado Correctamente';
				} else {
					$mensaje = "Error al Registrar";
				}
			}
		}
	}






	require('../../../Views/funtion/crud_agregar_conferencista/registro-code.php');
