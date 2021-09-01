  <?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$idciudad = $_SESSION['idciudad'];
	$idevento_1 = "";



	//Instancia la librería genérica y hace uso de los métodos
	$BD = new basedatos();
	//$order_id = uniqid();// numero unico para cada evento 
	//$codigoeventounico = $order_id;

	$idevento = "";

	$nombreevento = (isset($_POST['nombreevento'])) ? $_POST['nombreevento'] : "";
	$certificado = (isset($_POST['certificado'])) ? $_POST['certificado'] : "";
	$generalinfo = (isset($_POST['generalinfo'])) ? $_POST['generalinfo'] : "";
	$tematica = (isset($_POST['tematica'])) ? $_POST['tematica'] : "";
	$responsable = (isset($_POST['responsable'])) ? $_POST['responsable'] : "";
	


	$campos = ['nombreevento', 'idtipoeve', 'certificado', 'generalinfo', 'tematica', 'responsable', 'estado', 'idciudad','O_tipo','registro'];

	$valores = [$nombreevento, 4, $certificado, $generalinfo, $tematica, $responsable, 'Activo', $idciudad,'',''];

	if ($BD->AdicionarRegistro('evento', $campos, $valores)) {
		//echo "<script> alert('Registro Exitoso') </script>";
		$imprimir = "REGISTRO EXITOSO";
		$traerid = "SELECT idevento FROM evento WHERE nombreevento='$nombreevento' AND idtipoeve='4' AND certificado='$certificado' AND generalinfo='$generalinfo' AND tematica='$tematica' AND responsable='$responsable' AND estado='Activo' AND idciudad='$idciudad'";
		$resultadoid = $link->query($traerid);
		$rowid = $resultadoid->fetch_array(MYSQLI_ASSOC);
		$idevento = $rowid['idevento'];
		$idevento_1 = $idevento;
	} else {
		$imprimir = "FALLO AL REGISTRAR, POR FAVOR INTENTE MAS TARDE";
		echo 'Falló agregar registro. [' .
			$valores[0] .
			$valores[1] .
			$valores[2] .
			$valores[3] .
			$valores[4] .
			$valores[5] .
			$valores[6] .
			$valores[7] .
			$valores[8] .
			']';
	}



	require_once "../../../Views/funtion/vistas/crud/ps.php";
	require_once "../../../Views/funtion/crud_congreso/registroe.php";
	require_once "../../../Views/funtion/vistas/crud/pi.php";
