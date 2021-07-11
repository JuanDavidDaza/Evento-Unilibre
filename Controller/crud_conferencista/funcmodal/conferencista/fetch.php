<?php
include_once('../../../../Model/connection.php');

$database = new Connection();
$db = $database->open();
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";

try {

	$sql = "SELECT * FROM evento_conferencistas INNER JOIN conferencistas ON conferencistas.cedula=evento_conferencistas.nombre WHERE idevento = '$idevento'";
	foreach ($db->query($sql) as $row1) {
?>
		<tr>
			<td><?php echo $row1['id']; ?></td>
			<td><?php echo $row1['nombre']; ?></td>
			<td><?php echo $row1['idevento']; ?></td>
			<td><?php echo $row1['conferencia']; ?></td>
			<td><?php echo $row1['duracion']; ?></td>
			<td>
				<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row1['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
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