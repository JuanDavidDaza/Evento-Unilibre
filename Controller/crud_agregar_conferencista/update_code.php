<?php
		//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	
	$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
		$cedula1=(isset($_POST['cedula1']))?$_POST['cedula1']:"";
		$cedula=(isset($_POST['cedula']))?$_POST['cedula']:"";
		$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
		$nombre1=(isset($_POST['nombre1']))?$_POST['nombre1']:"";
		$celular1=(isset($_POST['celular1']))?$_POST['celular1']:"";
		$celular2=(isset($_POST['celular2']))?$_POST['celular2']:"";
		$correo=(isset($_POST['correo']))?$_POST['correo']:"";
		$linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";
		$perfil=(isset($_POST['perfil']))?$_POST['perfil']:"";
		$pais=(isset($_POST['pais']))?$_POST['pais']:"";

		
		if(($cedula==$cedula1)){
								$sql = "UPDATE conferencistas SET nombre='$nombre', celular1='$celular1', celular2='$celular2', correo='$correo', linkedin='$linkedin', perfil='$perfil', pais='$pais' WHERE cedula='$cedula1'";
								$resultado = $link->query($sql);
 

                        		$Fecha= new DateTime(); 
                        		$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";
                        		$tmpFoto= $_FILES["txtFoto"]["tmp_name"];


                        		if ($tmpFoto!="") {
                        			//si tmpFoto no esta vacio manda el archivo a esa ruta 
                        		      move_uploaded_file($tmpFoto,"../../../Content/imagenes_conferencistas/".$nombreArchivo);


                        
                         		$sql1 = "SELECT foto FROM conferencistas WHERE cedula='$cedula1'";
                         		$resultado1 = $link->query($sql1);
						 		$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

                  

                        		//se borra la foto vieja y se guarda la nueva 
                        		if (isset($row1["foto"])) {
                        		      if (file_exists("../../../Content/imagenes_conferencistas/".$row1["foto"])) {
                        		      	//si es imagen.jpg que es la imagen por defecto, no se va a eliminar 
                        		            if ($row1['foto']!="imagen.jpg") {
                        		                  unlink("../../../Content/imagenes_conferencistas/".$row1["foto"]);
                        		            }
                                    
                        		      }
                        		}

                        		$sql2 = "UPDATE conferencistas SET foto='$nombreArchivo' WHERE cedula='$cedula1'";
								$resultado2 = $link->query($sql2);
						
                        		}
                        		$mensaje = 'Modificado Correctamente';
							
		
		}

		
		else{
			$sqldato="SELECT nombre FROM conferencistas WHERE cedula='$cedula'";

					if ($sqldato = mysqli_prepare($link, $sqldato)) {
						if (mysqli_stmt_execute($sqldato)) {
							mysqli_stmt_store_result($sqldato);
					
							if(mysqli_stmt_num_rows($sqldato) == 1){
						
								$mensaje = 'Ya hay un Conferencistas con este mismo Nombre y/o Numero de Identificación';	
							}
							else{

								$nombre1=(isset($_POST['nombre1']))?$_POST['nombre1']:"";
								$tabla1 = "UPDATE evento_conferencistas SET nombre='$nombre' WHERE nombre = '$nombre1'";
								$resultadotabla = $link->query($tabla1);
								$sql = "UPDATE conferencistas SET cedula='$cedula', nombre='$nombre', celular1='$celular1', celular2='$celular2', correo='$correo', linkedin='$linkedin', perfil='$perfil', pais='$pais' WHERE cedula='$cedula1'";
								$resultado = $link->query($sql);
 

                        		$Fecha= new DateTime(); 
                        		$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.jpg";
                        		$tmpFoto= $_FILES["txtFoto"]["tmp_name"];


                        		if ($tmpFoto!="") {
                        			//si tmpFoto no esta vacio manda el archivo a esa ruta 
                        		      move_uploaded_file($tmpFoto,"../../../Content/imagenes_conferencistas/".$nombreArchivo);


                        
                         		$sql1 = "SELECT foto FROM conferencistas WHERE cedula='$cedula1'";
                         		$resultado1 = $link->query($sql1);
						 		$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

                  

                        		//se borra la foto vieja y se guarda la nueva 
                        		if (isset($row1["foto"])) {
                        		      if (file_exists("../../../Content/imagenes_conferencistas/".$row1["foto"])) {
                        		      	//si es imagen.jpg que es la imagen por defecto, no se va a eliminar 
                        		            if ($row1['foto']!="imagen.jpg") {
                        		                  unlink("../../../Content/imagenes_conferencistas/".$row1["foto"]);
                        		       	}
                                    
                        		      }
                        		}

                        		$sql2 = "UPDATE conferencistas SET foto='$nombreArchivo' WHERE cedula='$cedula1'";
								$resultado2 = $link->query($sql2);
						
                        		}
                        		$mensaje = 'Modificado Correctamente';
							}

						}
					}

						

							
		
		}

		   
 require('../../../Views/funtion/crud_agregar_conferencista/update.php');
                 
?>

