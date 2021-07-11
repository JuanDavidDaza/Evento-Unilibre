<?php
	
//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$idinstitucion = (isset($_POST['idinstitucion']))?$_POST['idinstitucion']:"";
	$nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
	$nombre1 = (isset($_POST['nombre1']))?$_POST['nombre1']:"";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$idciudad = (isset($_POST['idciudad']))?$_POST['idciudad']:"";
		$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";	
		
		if ($nombre==$nombre1) {

						$telefono = (isset($_POST['telefono']))?$_POST['telefono']:"";
						$direccion = (isset($_POST['direccion']))?$_POST['direccion']:"";
						
						$sql = "UPDATE institucion_educativa SET nombre='$nombre', telefono='$telefono', direccion='$direccion',idciudad='$idciudad' WHERE idinstitucion = '$idinstitucion'";
						$resultado = $link->query($sql);
						$mensaje="REGISTRO MODIFICADO";
		} else{

			$sql="SELECT nombre FROM institucion_educativa WHERE nombre='$nombre' AND idciudad='$idciudad'";

			if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);
					
					if(mysqli_stmt_num_rows($sql) == 1){
						
						$mensaje = 'Ya esta Registrado este Nombre de la Institución';		

					}
					else{
						$telefono = (isset($_POST['telefono']))?$_POST['telefono']:"";
						$direccion = (isset($_POST['direccion']))?$_POST['direccion']:"";
						
						$sql = "UPDATE institucion_educativa SET nombre='$nombre', telefono='$telefono', direccion='$direccion',idciudad='$idciudad' WHERE idinstitucion = '$idinstitucion'";
						$resultado = $link->query($sql);
						$mensaje="REGISTRO MODIFICADO";


					}



				}
			} 

		}

			//



		

	 }//fin de agregar datos
	
	
	
require_once "../../../Views/funtion/crud_institucion/update.php";
?>