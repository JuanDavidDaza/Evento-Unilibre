<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

//$db = $database->open();
//$database = new Connection();


$idevento = $_GET['idevento'];

$sql1 = "DELETE FROM evento_entidades WHERE idevento = '$idevento'";
$sql2 = "DELETE FROM evento_programas WHERE idevento = '$idevento'";
$sql3 = "DELETE FROM evento_conferencistas WHERE idevento = '$idevento'";
$sql4 = "DELETE FROM asistente_sesion WHERE idevento = '$idevento'";
$sql5 = "DELETE FROM pre_inscripcion WHERE idevento = '$idevento'";
$sql6 = "DELETE FROM evento_sesion WHERE idevento = '$idevento'";
$sql7 = "DELETE FROM evento_usuario WHERE idevento = '$idevento'";

$sql8 = "SELECT COUNT(*) AS idevento FROM evento_foto WHERE idevento='$idevento' GROUP BY idevento";


$resultado_eve = $link->query($sql8);
$row112 = $resultado_eve->fetch_array(MYSQLI_ASSOC);

if (isset($row112['idevento'])) {
	$n = $row112['idevento'];
	$sql9 = "SELECT id,foto FROM evento_foto WHERE idevento = '$idevento'";
	$resultadof = $link->query($sql9);

	foreach ($resultadof as $rowf) {
		$n1 = $rowf['foto'];
		$n2 = $rowf['id'];
		//echo $n1;
		//Ruta de la imagen
		unlink("../../../Content/evento_foto/" . $n1);

		// Consulta para eliminar el registro de la base de datos
		$eliminar = "DELETE FROM evento_foto WHERE id ='$n2'";
		$resultado8 = $link->query($eliminar);
	}
}


$resultado1 = $link->query($sql1);
$resultado2 = $link->query($sql2);
$resultado3 = $link->query($sql3);
$resultado4 = $link->query($sql5);
$resultado5 = $link->query($sql4);
$resultado6 = $link->query($sql6);
$resultado7 = $link->query($sql7);

$sql = "DELETE FROM evento WHERE idevento = '$idevento'";
$resultado = $link->query($sql);





require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/crud_congreso/eliminar.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
