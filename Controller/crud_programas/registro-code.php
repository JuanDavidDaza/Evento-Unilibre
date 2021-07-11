  <?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$idciudad = $_SESSION['idciudad'];

	$BD = new basedatos();


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$nombreprograma = (isset($_POST['nombreprograma'])) ? $_POST['nombreprograma'] : "";
		$sql = "SELECT nombreprograma FROM programas WHERE nombreprograma='$nombreprograma' and idciudad='$idciudad'";

		if ($sql = mysqli_prepare($link, $sql)) {
			if (mysqli_stmt_execute($sql)) {
				mysqli_stmt_store_result($sql);

				if (mysqli_stmt_num_rows($sql) == 1) {

					$mensaje = 'Este Programa ya esta registrado';
				} else {



					if (($_POST['url']) !== "") {
						$url = (isset($_POST['url'])) ? $_POST['url'] : "";
						//realiza el guardado de datos correctamenete
						$campos = ['nombreprograma', 'url', 'idciudad'];

						$valores = [$nombreprograma, $url, $idciudad];

						if ($BD->AdicionarRegistro('programas', $campos, $valores)) {
							$mensaje = 'NUEVO PROGRAMA REGISTRADO';
						} else {
							$mensaje = "Fallo al Registrar";
						}
					} elseif ($_POST['url'] == "") {

						$url = "https://www.unilibrecali.edu.co";
						//realiza el guardado de datos correctamenete
						$campos = ['nombreprograma', 'url', 'idciudad'];

						$valores = [$nombreprograma, $url, $idciudad];

						if ($BD->AdicionarRegistro('programas', $campos, $valores)) {
							$mensaje = 'NUEVO PROGRAMA REGISTRADO';
						} else {
							$mensaje = "Fallo al Registrar";
						}
					}
				}
			}
		}
	} //fin de agregar datos


	require_once "../../../Views/funtion/crud_programas/registro-code.php";
	?>
