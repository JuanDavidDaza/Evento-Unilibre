<?php
	
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	/*
	$idprograma = (isset($_POST['idprograma']))?$_POST['idprograma']:"";
	$nombreprograma = (isset($_POST['nombreprograma']))?$_POST['nombreprograma']:"";
	$nombreprograma1 = (isset($_POST['nombreprograma1']))?$_POST['nombreprograma1']:"";

	$sql1 = "UPDATE evento_programas SET programa='$nombreprograma' WHERE programa = '$nombreprograma1'";
	$resultado1 = $link->query($sql1);
    
	$sql = "UPDATE programas SET nombreprograma='$nombreprograma' WHERE idprograma = '$idprograma'";
	$resultado = $link->query($sql); 



	$idprograma = (isset($_POST['idprograma']))?$_POST['idprograma']:"";
	$nombreprograma=(isset($_POST['nombreprograma']))?$_POST['nombreprograma']:"";	
	$nombreprograma1 = (isset($_POST['nombreprograma1']))?$_POST['nombreprograma1']:"";

		if (($_POST['url'])!=="") {
				$url=(isset($_POST['url']))?$_POST['url']:"";
				 //realiza el guardado de datos correctamenete
				$sql1 = "UPDATE evento_programas SET programa='$nombreprograma' WHERE programa = '$nombreprograma1'";
				$resultado1 = $link->query($sql1);

				$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url' WHERE idprograma = '$idprograma'";
				$resultado = $link->query($sql);
			}	
		elseif($_POST['url']==""){
				
				$url="https://www.unilibrecali.edu.co";
				 //realiza el guardado de datos correctamenete
				$sql1 = "UPDATE evento_programas SET programas='$nombreprograma' WHERE programa = '$nombreprograma1'";
				$resultado1 = $link->query($sql1);

				$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url' WHERE idprograma = '$idprograma'";
				$resultado = $link->query($sql);
		}
	


*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$idprograma = (isset($_POST['idprograma']))?$_POST['idprograma']:"";
		$nombreprograma=(isset($_POST['nombreprograma']))?$_POST['nombreprograma']:"";	
		$nombreprograma1 = (isset($_POST['nombreprograma1']))?$_POST['nombreprograma1']:"";
		$idciudad=(isset($_POST['idciudad']))?$_POST['idciudad']:"";

		
		if ($nombreprograma==$nombreprograma1) {
						if (($_POST['url'])!=="") {
								$url=(isset($_POST['url']))?$_POST['url']:"";
				 				//realiza el guardado de datos correctamenete
								//$sql1 = "UPDATE evento_programas SET programa='$nombreprograma' WHERE programa = '$nombreprograma1'";
								//$resultado1 = $link->query($sql1);
				
								$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url',idciudad='$idciudad' WHERE idprograma = '$idprograma'";
								$resultado = $link->query($sql);
								$mensaje = 'Modificado Correctamente';

						}	
						elseif($_POST['url']==""){
								
								$url="https://www.unilibrecali.edu.co";
								 //realiza el guardado de datos correctamenete
								//$sql1 = "UPDATE evento_programas SET programas='$nombreprograma' WHERE programa = '$nombreprograma1'";
								//$resultado1 = $link->query($sql1);

								$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url',idciudad='$idciudad' WHERE idprograma = '$idprograma'";
								$resultado = $link->query($sql);
								$mensaje = 'Modificado Correctamente';
						}
		} else{
			$sql="SELECT nombreprograma FROM programas WHERE nombreprograma='$nombreprograma' AND idciudad='$idciudad'";
			if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);
					
					if(mysqli_stmt_num_rows($sql) == 1){
						
						$mensaje = 'Este Programa ya esta registrada';		

					}
					else{
						if (($_POST['url'])!=="") {
								$url=(isset($_POST['url']))?$_POST['url']:"";
				 				//realiza el guardado de datos correctamenete
								//$sql1 = "UPDATE evento_programas SET programa='$nombreprograma' WHERE programa = '$nombreprograma1'";
								//$resultado1 = $link->query($sql1);
				
								$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url',idciudad='$idciudad' WHERE idprograma = '$idprograma'";
								$resultado = $link->query($sql);
								$mensaje = 'Modificado Correctamente';

						}	
						elseif($_POST['url']==""){
								
								$url="https://www.unilibrecali.edu.co";
								 //realiza el guardado de datos correctamenete
								//$sql1 = "UPDATE evento_programas SET programas='$nombreprograma' WHERE programa = '$nombreprograma1'";
								//$resultado1 = $link->query($sql1);

								$sql = "UPDATE programas SET nombreprograma='$nombreprograma',url='$url',idciudad='$idciudad' WHERE idprograma = '$idprograma'";
								$resultado = $link->query($sql);
								$mensaje = 'Modificado Correctamente';
						}

					}



				}
			}
		}

			

		

	 }//fin de agregar datos


	 require_once "../../../Views/funtion/crud_programas/update.php";
?>
