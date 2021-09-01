<?php
include_once('../../../Model/connection.php');


$database = new Connection();
$db = $database->open();
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";


try {
	//$sql = 'SELECT * FROM evento_sesion';
	$sql = "SELECT * FROM evento_sesion WHERE idevento = '$idevento' order by posicion asc";
	foreach ($db->query($sql) as $row3) {
?>
		<tr>
			<td><?php echo $row3['posicion']; ?></td>
			<td><?php echo $row3['nombresesion']; ?></td>
			<td><?php echo $row3['audsalon']; ?></td>
			<td><?php echo $row3['horainicio']; ?></td>
			<td><?php echo $row3['horafin']; ?></td>
			<td><?php echo $row3['fechainicio']; ?></td>
			<td><?php echo $row3['fechafin']; ?></td>
			<td><?php echo $row3['observacion']; ?></td>
			<td>
				<button class="btn btn-success btn-sm edit" style="width: 100%;" data-id="<?php echo $row3['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button><button class="btn btn-danger btn-sm delete" style="width: 100%;" data-id="<?php echo $row3['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
			</td>
		</tr>
<?php
	}
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}

//cerrar conexión
$database->close();

?>