   <?php
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";


	$BD = new basedatos();
	$idevento_1 = "";



	//Crea los combobox de los campos referenciados

	$cboidciudad = $BD->ListaValores('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre');


	require_once "../../../Views/funtion/vistas/crud/ps.php";
	require_once "../../../Views/funtion/crud_reunion/registro.php";
	require_once "../../../Views/funtion/vistas/crud/pi.php";
