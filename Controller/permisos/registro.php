<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";
$BD = new basedatos();
$cboidciudad = $BD->ListaValores('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre');
$id = $_SESSION['rol_id'];
if ($id == 1) {
   $opt = "
      <div class='form-group'>
               <label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
               <div class='container'>
                  <select class='form-control' id='rol_id' name='rol_id'>
                     <option value='1'>Administrador</option>
                     <option value='4'>Administrador de Eventos</option>
                     <option value='2'>Colaborador</option>
                     <option value='3'>Sin Ningun Permiso</option>
                  </select>
               </div>
      </div>
   ";
} else {
   $opt = "
      <div class='form-group'>
               <label for='rol_id' class='col-sm-2 control-label'>TIPO DE ROL</label>
               <div class='container'>
                  <select class='form-control' id='rol_id' name='rol_id'>
                     <option value='2' selected>Colaborador</option>
                     <option value='3'>Sin Ningun Permiso</option>
                  </select>
               </div>
            </div>
   ";
}
//Carácteres para la contraseña
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
//Reconstruimos la contraseña segun la longitud que se quiera
for ($i = 0; $i < 8; $i++) {
   //obtenemos un caracter aleatorio escogido de la cadena de caracteres
   $password .= substr($str, rand(0, 62), 1);
   //echo $password;
}


require_once "../../../Views/funtion/vistas/crud/ps.php";
require_once "../../../Views/funtion/permisos/registro.php";
require_once "../../../Views/funtion/vistas/crud/pi.php";
