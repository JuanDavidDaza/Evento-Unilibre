 <?php
	//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";

	$idevento = $_GET['idevento'];


	$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

	$sql1 = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'";

	$resultado1 = $link->query($sql1);
	$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);
	$BD = new basedatos();
	$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $row['idciudad']);


	require_once "../../../Views/funtion/crud_conferencista/modificar.php";

	?>