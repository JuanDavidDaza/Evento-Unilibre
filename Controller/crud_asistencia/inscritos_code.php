<?php
//valido si es del rol indicado
require_once "../../../Model/session_admin3.php";
require_once "../../../Model/BD.php";

$id = $_GET['id'];
//$id =isset($_GET['id']);
//$id=(isset($_POST['id']))?$_POST['id']:"";	

$idevento = $_GET['idevento'];
//$sql = "SELECT * FROM pre_inscripcion where idevento = '$idevento'";
$sql = "SELECT idasistente,pre_inscripcion.nombre,tipoid,correo,celular,genero,institucion_educativa.nombre AS idinstitucion,idevento FROM pre_inscripcion INNER JOIN institucion_educativa ON  institucion_educativa.idinstitucion = pre_inscripcion.idinstitucion  WHERE idevento = '$idevento'";
$sql1 = "SELECT idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE idevento = '$idevento'";
$sql2 = "SELECT * FROM evento_sesion  WHERE id = '$id'";
//$sql1 = "SELECT * FROM evento where idevento = '$idevento'";
$resultado = $link->query($sql);
$resultado1 = $link->query($sql1);
$resultado2 = $link->query($sql2);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);
$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);

$fechaActual = date('d-m-Y');



require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_asistencia/inscritos.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";
