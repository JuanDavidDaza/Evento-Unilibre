<?php
	include_once('../../../../Model/connection.php');

	$database = new Connection();
	$db = $database->open();
	$idevento=(isset($_POST['idevento']))?$_POST['idevento']:"";
	
	
	try{	
	    //$sql = 'SELECT * FROM evento_sesion';
	    $sql = "SELECT evento_usuario.id,evento_usuario.idevento,usuarios.usuario,usuarios.email FROM evento_usuario INNER JOIN usuarios ON usuarios.id=evento_usuario.idusuario WHERE idevento = '$idevento'";
	    foreach ($db->query($sql) as $row3) {
	    	?>
	    	<tr>
	    		<td><?php echo $row3['idevento']; ?></td>
	    		<td><?php echo $row3['usuario']; ?></td>
	    		<td><?php echo $row3['email']; ?></td>
	    		<td>
	    			<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row3['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>