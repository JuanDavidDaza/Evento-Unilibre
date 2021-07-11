<?php
//require_once "../../../bd/session_admin.php";
require '../../Controller/diagrama/modelo_grafico.php';

$MG = new Modelo_Grafico();
$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";
//$consulta= $MG -> TraerDatosGraficoBar($idevento);
$consulta = $MG->TraerNombres($idevento);
echo json_encode($consulta);
