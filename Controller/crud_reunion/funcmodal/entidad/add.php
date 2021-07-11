<?php
	include_once('../../../../Model/connection.php');
	include_once('../../../../Model/BD.php');

	$output = array('error' => false);

	$database = new Connection();
	$db = $database->open();





	try{

	$entidad1=$_POST['entidad'];
	$idevento1=$_POST['idevento'];
	$sql = "SELECT entidad,idevento FROM evento_entidades WHERE entidad = '$entidad1' AND idevento ='$idevento1'";
	
	if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);
					
					if(mysqli_stmt_num_rows($sql) == 1){
						$output['error'] = true;
						$output['message'] = 'Ya esta registrado';		

					}
					else{
						// hacer uso de una declaración preparada para evitar la inyección de sql
							$stmt = $db->prepare("INSERT INTO evento_entidades (entidad, idevento) VALUES (:entidad, :idevento)");
							// declaración if-else en la ejecución de nuestra declaración preparada
							if ($stmt->execute(array(':entidad' => $_POST['entidad'] , ':idevento' => $_POST['idevento'])) ){
								$output['message'] = 'Entidad agregada correctamente';
							}
							else{
								$output['error'] = true;
								$output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
						} 

					}



				}
			}
	   
	}
	catch(PDOException $e){
		$output['error'] = true;
 		$output['message'] = $e->getMessage();
	}

	//cerrar conexión
	$database->close();

	echo json_encode($output);

?>