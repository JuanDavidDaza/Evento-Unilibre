<?php
//valido si es del rol indicado

require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";



$sql = "SELECT foto,cedula,nombre,celular1,celular2,correo,linkedin,SUBSTRING(perfil,1,100) as perfil,pais FROM conferencistas";
$resultado = $link->query($sql);
require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_agregar_conferencista/index.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";
