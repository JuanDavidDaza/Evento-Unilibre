  <?php
  //valido si es del rol indicado
  require_once "../../../Model/session_admin2.php";
  require_once "../../../Model/BD.php";



  $BD = new basedatos();
  $idevento_1 = "";



  //Crea los combobox de los campos referenciados

  $cboidciudad = $BD->ListaValores('idciudad', 'ciudad', 'idciudad', 'ciudad.nombre');


  require_once "../../../Views/funtion/crud_taller/registro.php";
