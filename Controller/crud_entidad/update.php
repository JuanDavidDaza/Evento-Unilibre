<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$identidad = (isset($_POST['identidad'])) ? $_POST['identidad'] : "";
	$nombreentidad = (isset($_POST['nombreentidad'])) ? $_POST['nombreentidad'] : "";
	$nombreentidad1 = (isset($_POST['nombreentidad1'])) ? $_POST['nombreentidad1'] : "";
	$idciudad = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";

	if ($nombreentidad == $nombreentidad1) {
		if (($_POST['url']) !== "") {
			$url = (isset($_POST['url'])) ? $_POST['url'] : "";

			//realiza el guardado de datos correctamenete
			//$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
			//$resultado1 = $link->query($sql1);

			$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url',idciudad='$idciudad' WHERE identidad = '$identidad'";
			$resultado = $link->query($sql);
			$mensaje = 'Modificado Correctamente';
		} elseif ($_POST['url'] == "") {

			$url = "https://www.unilibrecali.edu.co";
			//realiza el guardado de datos correctamenete
			//$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
			//$resultado1 = $link->query($sql1);

			$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url',idciudad='$idciudad' WHERE identidad = '$identidad'";
			$resultado = $link->query($sql);
			$mensaje = 'Modificado Correctamente';
		}
	} else {
		$sql = "SELECT nombreentidad FROM entidad WHERE nombreentidad='$nombreentidad' AND idciudad='$idciudad'";

		if ($sql = mysqli_prepare($link, $sql)) {
			if (mysqli_stmt_execute($sql)) {
				mysqli_stmt_store_result($sql);

				if (mysqli_stmt_num_rows($sql) == 1) {

					$mensaje = 'Esta Entidad ya esta registrada';
				} else {
					if (($_POST['url']) !== "") {
						$url = (isset($_POST['url'])) ? $_POST['url'] : "";

						//realiza el guardado de datos correctamenete
						//$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
						//$resultado1 = $link->query($sql1);

						$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url',idciudad='$idciudad' WHERE identidad = '$identidad'";
						$resultado = $link->query($sql);
						$mensaje = 'Modificado Correctamente';
					} elseif ($_POST['url'] == "") {

						$url = "https://www.unilibrecali.edu.co";
						//realiza el guardado de datos correctamenete
						//$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
						//$resultado1 = $link->query($sql1);

						$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url',idciudad='$idciudad' WHERE identidad = '$identidad'";
						$resultado = $link->query($sql);
						$mensaje = 'Modificado Correctamente';
					}
				}
			}
		}
	}
} //fin de agregar datos
/*
	$identidad = (isset($_POST['identidad']))?$_POST['identidad']:"";
	$nombreentidad=(isset($_POST['nombreentidad']))?$_POST['nombreentidad']:"";	
	$nombreentidad1 = (isset($_POST['nombreentidad1']))?$_POST['nombreentidad1']:"";

		if (($_POST['url'])!=="") {
				$url=(isset($_POST['url']))?$_POST['url']:"";
				 //realiza el guardado de datos correctamenete
				$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
				$resultado1 = $link->query($sql1);

				$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url' WHERE identidad = '$identidad'";
				$resultado = $link->query($sql);
			}	
		elseif($_POST['url']==""){
				
				$url="https://www.unilibrecali.edu.co";
				 //realiza el guardado de datos correctamenete
				$sql1 = "UPDATE evento_entidades SET entidad='$nombreentidad' WHERE entidad = '$nombreentidad1'";
				$resultado1 = $link->query($sql1);

				$sql = "UPDATE entidad SET nombreentidad='$nombreentidad',url='$url' WHERE identidad = '$identidad'";
				$resultado = $link->query($sql);
		}*/

require_once "../../../Views/funtion/crud_entidad/update.php";
