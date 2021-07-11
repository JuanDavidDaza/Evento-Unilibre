
<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$id = $_GET['id'];
$sql2 = "SELECT foto FROM usuarios WHERE id='$id'";
$resultado2 = $link->query($sql2);
$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);

if ($row2['foto'] != "user.png") {
	if (file_exists("../../../Content/user/" . $row2["foto"])) {
		unlink("../../../Content/user/" . $row2["foto"]);
	}
}
$sql = "DELETE FROM usuarios WHERE id = '$id'";
$resultado = $link->query($sql);
$sql1 = "DELETE FROM evento_usuario WHERE idusuario = '$id'";
$resultado1 = $link->query($sql1);



require_once "../../../Views/funtion/permisos/eliminar.php";
?>	