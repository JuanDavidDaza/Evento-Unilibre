<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	require_once "../../../Model/connection.php";
	$database = new Connection();
	$db = $database->open();

	$idevento = $_GET['idevento'];
	$e = $_GET['e'];
	
	$sql2 = "SELECT * FROM evento WHERE idevento = '$idevento'";
	$resultado2 = $link->query($sql2);
	$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);
	if ($e=="2") {
		$enlace="modificar5.php?idevento=".$idevento;
	}
	elseif ($e=="1") {
		$enlace="registro5.php?idevento=".$idevento;
	}
	else{
		header("index.php");
	}
	
	$tipo1 = $_POST['tipo'];
	$idevento1 = $_POST['idevento'];
	//echo $enlace;
	//require_once 'Conexion.php';
	
	if(isset($_POST['btnsave']))
	{	

		if ($tipo1==="Principal") {	
			$sql = "SELECT tipo FROM evento_foto WHERE tipo = 'Principal' AND idevento ='$idevento1'";
	
			if ($sql = mysqli_prepare($link, $sql)) {
						if (mysqli_stmt_execute($sql)) {
							mysqli_stmt_store_result($sql);
							
							if(mysqli_stmt_num_rows($sql) == 1){
								$errMSG = 'Solo se puede tener una Imagen de Tipo Principal';		

							}
							else{
													
									$idevento = $_POST['idevento'];
									$nombre = $_POST['nombre'];
									$tipo = $_POST['tipo'];
									$detalles = $_POST['detalles'];
									
									$imgFile = $_FILES['imagen']['name'];
									$tmp_dir = $_FILES['imagen']['tmp_name'];
									$imgSize = $_FILES['imagen']['size'];
									
									
									if(empty($nombre)){
										$errMSG = "Ingrese el Nombre";
									}

									if(empty($detalles)){
										$errMSG = "Ingrese los detalles";
									}
									
									else if(empty($imgFile)){
										$errMSG = "Seleccione el archivo de imagen.";
									}
									else
									{
										$upload_dir = '../../../Content/evento_foto/'; 
								 
										$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
								
										$valid_extensions = array('jpeg', 'jpg', 'png'); 
									
										
										$userpic = rand(1000,1000000).".".$imgExt;
											
										
										if(in_array($imgExt, $valid_extensions)){			
											
											if($imgSize < 1000000)				{
												move_uploaded_file($tmp_dir,$upload_dir.$userpic);
											}
											else{
												$errMSG = "Su archivo es muy grande.";
											}
										}
										else{
											$errMSG = "Solo archivos JPG, JPEG & PNG son permitidos.";		
										}
									}
									
									
									
									if(!isset($errMSG))
									{
										

										$stmt = $db->prepare('INSERT INTO evento_foto(idevento,nombre,foto,tipo,detalles) VALUES(:idevento, :nombre, :imagen, :tipo,:detalles)');
										$stmt->bindParam(':idevento',$idevento);
										$stmt->bindParam(':nombre',$nombre);
										$stmt->bindParam(':imagen',$userpic);
										$stmt->bindParam(':tipo',$tipo);
										$stmt->bindParam(':detalles',$detalles);
										
										if($stmt->execute())
										{
											$successMSG = "Nuevo registro insertado correctamente ";
											header("refresh:1;$enlace"); 
											//echo "<script>javascript: history.go(-2)</script>";
										}
										else
										{
											$errMSG = "Error al insertar ...";
										}
									}

							}



						}
					}
			

		}

		else{											
									$idevento = $_POST['idevento'];
									$nombre = $_POST['nombre'];
									$tipo = $_POST['tipo'];
									$detalles = $_POST['detalles'];
									
									$imgFile = $_FILES['imagen']['name'];
									$tmp_dir = $_FILES['imagen']['tmp_name'];
									$imgSize = $_FILES['imagen']['size'];
									
									
									if(empty($nombre)){
										$errMSG = "Ingrese el Nombre";
									}

									if(empty($detalles)){
										$errMSG = "Ingrese los detalles";
									}
									
									else if(empty($imgFile)){
										$errMSG = "Seleccione el archivo de imagen.";
									}
									else
									{
										$upload_dir = '../../../Content/evento_foto/'; 
								
										$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
									
										
										$valid_extensions = array('jpeg', 'jpg', 'png'); 
									
										
										$userpic = rand(1000,1000000).".".$imgExt;
											
										
										if(in_array($imgExt, $valid_extensions)){			
											
											if($imgSize < 1000000)				{
												move_uploaded_file($tmp_dir,$upload_dir.$userpic);
											}
											else{
												$errMSG = "Su archivo es muy grande.";
											}
										}
										else{
											$errMSG = "Solo archivos JPG, JPEG & PNG son permitidos.";		
										}
									}
									
									
									
									if(!isset($errMSG))
									{
										

										$stmt = $db->prepare('INSERT INTO evento_foto(idevento,nombre,foto,tipo,detalles) VALUES(:idevento, :nombre, :imagen, :tipo,:detalles)');
										$stmt->bindParam(':idevento',$idevento);
										$stmt->bindParam(':nombre',$nombre);
										$stmt->bindParam(':imagen',$userpic);
										$stmt->bindParam(':tipo',$tipo);
										$stmt->bindParam(':detalles',$detalles);
										
										if($stmt->execute())
										{
											$successMSG = "Nuevo registro insertado correctamente ";
											header("refresh:1;$enlace"); 
											//echo "<script>javascript: history.go(-2)</script>";
										}
										else
										{
											$errMSG = "Error al insertar";
										}
									}


				}
		
	}
	

require_once "../../../Views/funtion/crud_taller/imagen.php";
?>