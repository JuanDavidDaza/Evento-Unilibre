<?php
//valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	include_once('../../../Model/connection.php');
	$database = new Connection();
	$db = $database->open();
	
	$idevento = $_GET['idevento'];
	
	$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";
	$resultado = $link->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	$nombreevento=$row['nombreevento'];

	$sql2 ="SELECT * FROM evento_foto WHERE idevento = '$idevento'";
	$resultado2 = $link->query($sql2);


	if(isset($_GET['delete_id']))
{
	// Selecciona imagen a borrar
	$stmt_select = $db->prepare('SELECT foto FROM evento_foto WHERE id =:id');
	$stmt_select->execute(array(':id'=>$_GET['delete_id']));
	$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	// Ruta de la imagen
	unlink("../../../Content/evento_foto/".$imgRow['foto']);
	
	// Consulta para eliminar el registro de la base de datos
	$stmt_delete = $db->prepare('DELETE FROM evento_foto WHERE id =:id');
	$stmt_delete->bindParam(':id',$_GET['delete_id']);
	$stmt_delete->execute();
	// Redireccioa al inicio
	echo "<script>javascript: history.go(-1)</script>";
	//header("Location: '$enlace'");
}
require_once "../../../Views/funtion/crud_reunion/modificar5.php";
?>