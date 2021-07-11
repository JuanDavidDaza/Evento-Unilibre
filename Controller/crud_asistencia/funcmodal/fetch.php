

<?php


	include_once('../../../Model/connection.php');

	$database = new Connection();
	$db = $database->open();
	$idevento=(isset($_POST['idevento']))?$_POST['idevento']:"";

	try{	
		$sql = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'";
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['nombresesion']; ?></td>
				<td><?php echo $row['audsalon']; ?></td>
				<td><?php echo date("g:i a",strtotime($row['horainicio'])); ?></td>
				<td><?php echo date("g:i a",strtotime($row['horafin'])); ?></td>
				<td><?php echo $row['fechainicio']; ?></td>
				<td><?php echo $row['fechafin']; ?></td>
	    		<td>
	    			<button class="btn btn-primary btn-sm agregar" data-id="<?php echo $row['id']; ?>">Registrar</button>
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
