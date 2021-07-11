<?php
session_start();
include '../../Model/eventofiltro.php';
$eventofiltro = new eventofiltro();
if (isset($_POST["action"])) {
	$html = $eventofiltro->searchEvento($_POST);
	$data = array(
		"html"	=> $html,
	);
	echo json_encode($data);
}
