<?php
//require_once "../../../bd/session_admin.php";
require '../../Controller/diagrama/modelo_grafico.php';

$MG = new Modelo_Grafico();
$idciudad = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";
$consulta = $MG->TraerDatosGraficoCerrado($idciudad);
echo json_encode($consulta);
