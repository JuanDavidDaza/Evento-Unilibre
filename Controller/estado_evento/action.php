<?php
//error_reporting(0);

if(isset($_POST["action"])){
require_once "../../Model/BD.php";

	$BD = new basedatos();
 	
 	


 if ($_POST["action"]=='change_status') {


  $status='';
  $idevento=$_POST['user_id'];
 
  $sql2 = "SELECT * FROM evento WHERE idevento = '$idevento'";
		$resultado2 = $link->query($sql2);
		$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);		
		$nombreevento=$row2['nombreevento'];




  if ($_POST['user_status']=='Activo') {

   $status='Cerrado';
   
   $sql = "UPDATE evento SET estado='$status'WHERE idevento = '$idevento'";
   $resultado1 = $link->query($sql);
   	if (isset($resultado1)) {
	     echo '<div class="alert alert-danger">Evento <strong>'.$nombreevento.'</strong> identificado con ID <strong>'.$idevento.'</strong> en estado <strong>'.$status.'</strong></div>';
	}

  }else{

	    $status='Activo';
   
   $sql = "UPDATE evento SET estado='$status'WHERE idevento = '$idevento'";
   $resultado1 = $link->query($sql);
   	if (isset($resultado1)) {
	     echo '<div class="alert alert-success">Evento <strong>'.$nombreevento.'</strong> identificado con ID <strong>'.$idevento.'</strong> en estado <strong>'.$status.'</strong></div>';
	}

	   
  }
  
 }

}




			
			


?>