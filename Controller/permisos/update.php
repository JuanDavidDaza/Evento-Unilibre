<?php
	
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	include "../../../Model/code.php";


$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
  $id = (isset($_POST['id']))?$_POST['id']:"";
  $usuario_f = (isset($_POST['usuario']))?$_POST['usuario']:"";
  $email=(isset($_POST['email']))?$_POST['email']:"";
  $email2=(isset($_POST['email2']))?$_POST['email2']:"";
  $password=(isset($_POST['password']))?$_POST['password']:"";
  $idciudad_f=(isset($_POST['idciudad']))?$_POST['idciudad']:"";
  //echo $email . " despues :";
  $rol_id_f=(isset($_POST['rol_id']))?$_POST['rol_id']:"";
  $clave=SED::encryption($password);
  //echo $email2;

  $Fecha= new DateTime(); 
  $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"user.png";
  $tmpFoto= $_FILES["txtFoto"]["tmp_name"];

  


  if ($email==$email2){
    $sql = "UPDATE usuarios SET usuario='$usuario_f', email='$email', clave='$clave', rol_id='$rol_id_f', idciudad='$idciudad_f' WHERE id = '$id'";
    $resultado = $link->query($sql);
    if ($tmpFoto!="") {
              //si tmpFoto no esta vacio manda el archivo a esa ruta 
              move_uploaded_file($tmpFoto,"../../../Content/user/".$nombreArchivo);


                        
              $sql1 = "SELECT foto FROM usuarios WHERE id='$id'";
              $resultado1 = $link->query($sql1);
              $row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

                  

              //se borra la foto vieja y se guarda la nueva 
              if (isset($row1["foto"])) {
                    if (file_exists("../../../Content/user/".$row1["foto"])) {
                      //si es user.png que es la imagen por defecto, no se va a eliminar 
                          if ($row1['foto']!="user.png") {
                                unlink("../../../Content/user/".$row1["foto"]);
                        }
                                    
                    }
              }

              $sql2 = "UPDATE usuarios SET foto='$nombreArchivo' WHERE id='$id'";
              $resultado2 = $link->query($sql2);
              
            
    }

            $mensaje="Modificado Correctamente";

            //echo $_SESSION["usuario"];

  }
  else{
    $sql="SELECT usuario FROM usuarios WHERE email='$email'";

    if ($sql = mysqli_prepare($link, $sql)) {
        if (mysqli_stmt_execute($sql)) {
          mysqli_stmt_store_result($sql);
          
          if(mysqli_stmt_num_rows($sql) == 1){
            
            $mensaje = 'Este Correo ya esta registrado';
          }
          else{
             $clave=SED::encryption($password);

            $sql = "UPDATE usuarios SET usuario='$usuario_f', email='$email', clave='$clave', rol_id='$rol_id_f', idciudad='$idciudad_f' WHERE id = '$id'";

            $resultado = $link->query($sql);
            if ($tmpFoto!="") {
              //si tmpFoto no esta vacio manda el archivo a esa ruta 
              move_uploaded_file($tmpFoto,"../../../Content/user/".$nombreArchivo);


                        
              $sql1 = "SELECT foto FROM usuarios WHERE id='$id'";
              $resultado1 = $link->query($sql1);
              $row1 = $resultado1->fetch_array(MYSQLI_ASSOC);

                  

              //se borra la foto vieja y se guarda la nueva 
              if (isset($row1["foto"])) {
                    if (file_exists("../../../Content/user/".$row1["foto"])) {
                      //si es user.png que es la imagen por defecto, no se va a eliminar 
                          if ($row1['foto']!="user.png") {
                                unlink("../../../Content/user/".$row1["foto"]);
                        }
                                    
                    }
              }

              $sql2 = "UPDATE usuarios SET foto='$nombreArchivo' WHERE id='$id'";
              $resultado2 = $link->query($sql2);

            
            }
            $mensaje="Modificado Correctamente";

            //echo $_SESSION["usuario"];

          }



        }
      }
  }
	
	require_once "../../../Views/funtion/permisos/update.php";
?>