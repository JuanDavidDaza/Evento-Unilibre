  <?php
require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";
	include "../../../Model/code.php";
	$BD = new basedatos();

	$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

	$usuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
    $email=(isset($_POST['email']))?$_POST['email']:"";
	$rol_id=(isset($_POST['rol_id']))?$_POST['rol_id']:"";
	$password=(isset($_POST['password']))?$_POST['password']:"";
	$idciudad=(isset($_POST['idciudad']))?$_POST['idciudad']:"";
	//echo "usuario :".$usuario. " email : ".$email. " Rol: ".$rol_id. " Contraseña:".$password;


 		$sql="SELECT usuario FROM usuarios WHERE usuario='$usuario' || email='$email'";

 		if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);
					
					if(mysqli_stmt_num_rows($sql) == 1){
						
						$mensaje = 'Este Usuario y/o Correo ya esta registrado';
					}
					else{
						$Fecha= new DateTime(); 
       					$nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"user.png";



        				$tmpFoto= $_FILES["txtFoto"]["tmp_name"];

        				//guarda la imagen del conferencista en esta ruta
				        if ($tmpFoto!="") {
				             move_uploaded_file($tmpFoto,"../../../Content/user/".$nombreArchivo);
				                              
				        }
						 $clave=SED::encryption($password);

						$campos = ['usuario','email','clave','rol_id','idciudad','foto'];

						$valores = [$usuario,$email,$clave,$rol_id,$idciudad,$nombreArchivo];

						if ($BD->AdicionarRegistro('usuarios', $campos, $valores)){
							$mensaje = 'Registrado Correctamente';
						}else{
							$mensaje = "Error al Registrar";
						}
					}



				}
			}
              
                      	

require_once "../../../Views/funtion/permisos/registroe.php";






















	


