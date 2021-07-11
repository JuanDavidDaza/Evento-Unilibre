<?php


include_once('../../../Model/connection.php');

$database = new Connection();
$db = $database->open();
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";
$idasistente = (isset($_POST['idasistente'])) ? $_POST['idasistente'] : "";

try {
	$sql3 = "SELECT * FROM asistente_sesion WHERE idasistente = '$idasistente' and idevento='$idevento'";
	foreach ($db->query($sql3) as $row1) {
?>
		<tr>
			<td><?php echo $row1['idasistente']; ?></td>
			<td><?php echo $row1['idevento']; ?></td>
			<td><?php echo $row1['idsesion']; ?></td>
			<td><?php echo $row1['tipoid']; ?></td>
			<td><?php echo $row1['nombre']; ?></td>
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