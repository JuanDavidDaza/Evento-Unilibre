<?php
require_once "../../Model/BD.php";


session_start();
$rol_id = $_SESSION['rol_id'];

if ($rol_id == 1 || $rol_id == 4) {
  $menu = "
	<li class='nav-item active'>
        <a class='nav-link' href='permisos/index.php'>
          <i class='fas fa-fw fa-key'></i>
          <span>Gestión de Usuarios</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
          <i class='fas fa-fw fa-cog'></i>
          <span>Gestión de tablas básicas</span>
        </a>
        <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
          <div class='bg-white py-2 collapse-inner rounded'>
            
            <a class='collapse-item' href='crud_entidad/index.php'>Entidad</a>
            <a class='collapse-item' href='crud_programas/index.php'>Programa</a>
            <a class='collapse-item' href='crud_agregar_conferencista/index.php'>Conferencista</a>
            <a class='collapse-item' href='crud_institucion/index.php'>Institución</a>         
          </div>
        </div>
      </li>
      <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
          <i class='fas fa-fw fa-wrench'></i>
          <span>Gestión de Eventos</span>
         </a>
        <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
          <div class='bg-white py-2 collapse-inner rounded'>
            <a class='collapse-item' href='crud_taller/index.php'>Taller</a>
            <a class='collapse-item' href='crud_reunion/index.php'>Reunión</a>
            <a class='collapse-item' href='crud_congreso/index.php'>Congreso</a>
            <a class='collapse-item' href='crud_conferencista/index.php'>Conferencia</a> 
            <a class='collapse-item' href='crud_otro/index.php'>Otro</a>  
            <a class='collapse-item' href='crud_externo/index.php'>Externo</a>  
            <a class='collapse-item' href='estado_evento/index.php'>Gestión de Estado</a>    
          </div>
        </div>
      </li>
      <hr class='sidebar-divider d-none d-md-block'>
      <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#Asistencia' aria-expanded='true' aria-controls='Asistencia'>
          <i class='fas fa-fw fa-list-ul'></i>
          <span>Gestión de Asistencia</span>
         </a>
        <div id='Asistencia' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
          <div class='bg-white py-2 collapse-inner rounded'>
            <a class='collapse-item' href='crud_asistencia/index.php'>Control de asistencia</a>
            <a class='collapse-item' href='registro/index.php'>Control de registro</a>
                       
          </div>
        </div>
      </li>
      <hr class='sidebar-divider d-none d-md-block'>  
      <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#contenido2' aria-expanded='true' aria-controls='contenido2'>
          <i class='fas fa-fw fa-tachometer-alt'></i>
          <span>Reportes</span>
         </a>
        <div id='contenido2' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
          <div class='bg-white py-2 collapse-inner rounded'>
            <a class='collapse-item' href='reporteve.php'>Eventos</a>
            <a class='collapse-item' href='reportent.php'>Entidades</a>
            <a class='collapse-item' href='reportprog.php'>Programas</a>
            <a class='collapse-item' href='reportconf.php'>Conferencistas</a>            
          </div>
        </div>
      </li>

      ";
} else if ($rol_id == 2) {
  $menu = "
	<hr class='sidebar-divider d-none d-md-block'>
      <li class='nav-item active'>
        <a class='nav-link' href='crud_asistencia/index.php'>
          <i class='fas fa-fw fa-list-ul'></i>
          <span>Control de Asistencia</span></a>
      </li>


	";
} else {
  $menu = "";
}
$sqlrol_id = "SELECT rol FROM rol  WHERE id='$rol_id'";
$resultado_rol_id = $link->query($sqlrol_id);
foreach ($resultado_rol_id as $row_nombre_rol) {
  $nombre_rol = $row_nombre_rol['rol'];
}


if ($rol_id = null || $rol_id = "" || $rol_id != 1 && $rol_id != 2 && $rol_id != 4 && $rol_id != 3) {
  echo "Usted no tiene autorización";
  header('location: ../authorization.php');
  die();
}



$usuario = $_SESSION['usuario'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $idciudad = (isset($_POST['idciudad'])) ? $_POST['idciudad'] : "";
  $_SESSION['idciudad'] = $idciudad;



  $ciudad1 = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
  $ciudadresp = $link->query($ciudad1);
  foreach ($ciudadresp as $rowciudadresp) {
    $nombreciudad12 = $rowciudadresp['nombre'];
  }

  echo "<script> alert('Seleccionaste la Ciudad de " . $nombreciudad12 . " ')</script>";
} else {
  $idciudad = $_SESSION['idciudad'];
}




$BD = new basedatos();
$cboidciudad = $BD->ListaValoresDef('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre', $idciudad);

$ciudad = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
$ciudadr = $link->query($ciudad);



foreach ($ciudadr as $rowciudad) {
  $nombreciudad = $rowciudad['nombre'];
}

$idusuario = $_SESSION["id"];
$idusuario1 = "SELECT * FROM usuarios INNER JOIN ciudad ON usuarios.idciudad = ciudad.idciudad  WHERE id='$idusuario'";
$resultadousuarioc = $link->query($idusuario1);



foreach ($resultadousuarioc as $rowusuario) {
  $nombreciudad1 = $rowusuario['nombre'];
}


$ciudad1 = $_SESSION['idciudad'];
$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$ciudad1'";
$ciudadrespuesta = $link->query($ciudadevento);
foreach ($ciudadrespuesta as $rowciudadrespuesta) {
  $nombreciudadevento = $rowciudadrespuesta['nombre'];
}
