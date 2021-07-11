<?php
//CIERRO LA SESIÓN POR SEGURIDAD "Cuando intente ingresar una pagina que no tenga acceso, se cerrara y debera ingresar de nuevo"
	/*
	session_start();
	error_reporting(0);
	$_SESSION = array();
	session_destroy(); */
require('../Views/authorization.php');
