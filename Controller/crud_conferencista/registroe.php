   <?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	$idciudad = $_SESSION['idciudad'];

	$BD = new basedatos();
	$idevento_1 = "";




	//Instancia la librería genérica y hace uso de los métodos
	$BD = new basedatos();
	//$order_id = uniqid();// numero unico para cada evento 
	//$codigoeventounico = $order_id;

	$nombreevento = (isset($_POST['nombreevento'])) ? $_POST['nombreevento'] : "";
	$certificado = (isset($_POST['certificado'])) ? $_POST['certificado'] : "";
	$generalinfo = (isset($_POST['generalinfo'])) ? $_POST['generalinfo'] : "";
	$tematica = (isset($_POST['tematica'])) ? $_POST['tematica'] : "";
	$responsable = (isset($_POST['responsable'])) ? $_POST['responsable'] : "";

	$audsalon = (isset($_POST['audsalon'])) ? $_POST['audsalon'] : "";
	$horainicio = (isset($_POST['horainicio'])) ? $_POST['horainicio'] : "";
	$horafin = (isset($_POST['horafin'])) ? $_POST['horafin'] : "";
	$fechainicio = (isset($_POST['fechainicio'])) ? $_POST['fechainicio'] : "";
	$fechafin = (isset($_POST['fechainicio'])) ? $_POST['fechainicio'] : "";

	$campos = ['nombreevento', 'idtipoeve', 'certificado', 'generalinfo', 'tematica', 'responsable', 'estado', 'idciudad','O_tipo','registro'];

	$valores = [$nombreevento, 2, 'No', $generalinfo, $tematica, $responsable, 'Activo', $idciudad,'',''];

	if ($BD->AdicionarRegistro('evento', $campos, $valores)) {
		//echo "<script> alert('Registro Exitoso') </script>";
		//echo 'Adición registro exitosa. [' . 
		//$valores[0] . 
		//$valores[1] . 
		//$valores[2] . 
		//$valores[3] . 
		//$valores[4] . 
		//$valores[5] . 
		//$valores[6] . 
		//$valores[7] . 
		//$valores[8] . 
		//']';
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

	$traerid = "SELECT idevento FROM evento WHERE nombreevento='$nombreevento' AND idtipoeve='2' AND certificado='No' AND generalinfo='$generalinfo' AND tematica='$tematica' AND responsable='$responsable' AND estado='Activo' AND idciudad='$idciudad'";
	$resultadoid = $link->query($traerid);
	$rowid = $resultadoid->fetch_array(MYSQLI_ASSOC);
	$idevento = $rowid['idevento'];


	$campos1 = ['idevento', 'nombresesion', 'audsalon', 'horainicio', 'horafin', 'fechainicio', 'fechafin', 'posicion'];

	$valores1 = [$idevento, $nombreevento, $audsalon, $horainicio, $horafin, $fechainicio, $fechafin, '1'];

	if ($BD->AdicionarRegistro('evento_sesion', $campos1, $valores1)) {
		$imprimir = "REGISTRO EXITOSO";
		echo "<script> alert('Registro Exitoso') </script>";
		$idevento_1 = $idevento;
		//echo 'Adición registro exitosa. [' . 
		//$valores1[0] . 
		//$valores1[1] . 
		//$valores1[2] . 
		//$valores1[3] . 
		//$valores1[4] . 
		//$valores1[5] . 
		//$valores1[6] . 
		//$valores1[7] . 
		//$valores1[8] . 
		//']';
	} else {
		$imprimir = "FALLO AL REGISTRAR, POR FAVOR INTENTE MAS TARDE";
		echo 'Falló agregar registro. [' .
			$valores1[0] .
			$valores1[1] .
			$valores1[2] .
			$valores1[3] .
			$valores1[4] .
			$valores1[5] .
			$valores1[6] .
			$valores1[7] .
			$valores1[8] .
			']';
	}

	require_once "../../../Views/funtion/vistas/crud/ps.php";
	require_once "../../../Views/funtion/crud_conferencista/registroe.php";
	require_once "../../../Views/funtion/vistas/crud/pi.php";
