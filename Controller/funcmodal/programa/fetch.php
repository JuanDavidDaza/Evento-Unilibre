<?php
include_once('../../../Model/connection.php');

$database = new Connection();
$db = $database->open();
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";

try {
	$sql = "SELECT * FROM evento_programas INNER JOIN programas ON programas.idprograma=evento_programas.programa WHERE idevento = '$idevento'";
	foreach ($db->query($sql) as $row) {
?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['nombreprograma']; ?></td>
			<td><?php echo $row['idevento']; ?></td>
			<td>
				<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
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