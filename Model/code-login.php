<?php 

require_once "../Model/code.php";
error_reporting(0);

	session_start();

	if (isset($_SESSION["locked"]))
	{
	    $difference = time() - $_SESSION["locked"];
	    if ($difference > 30)
	    {
	        unset($_SESSION["locked"]);
	        unset($_SESSION["login_attempts"]);
	        header('location: index.php');
	    }
	}
	if(isset($_SESSION['rol_id'])){
		header('location: funtion/index.php');
    }
	
require_once "../Model/BD.php";

$email = $password = "";	
$email_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// empty para saber si esta en blanco y trim para limpiar los elementos en blanco 
	if (empty(trim($_POST["email"]))) {
			$email_err = "Por favor, ingrese un Email de usuario";
		}elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$email_err = "Por favor, Inserte un correo valido";
		}elseif (strlen(trim($_POST["email"])) > 70) {
			$email_err = "el correo no puede tener más de 70 caracteres";
		}else{
		$email= trim($_POST["email"]);
	}

	if (empty(trim($_POST["password"]))) {
		$password_err ="Por favor, ingrese una contraseña";
	}else{
		$password= trim($_POST["password"]);
	}


	//validar credenciales

	if (empty($email_err) && empty($password_err)) {
		$sql= "SELECT id, usuario, email, clave, rol_id, idciudad, foto FROM usuarios WHERE email = ?";

		if ($stmt= mysqli_prepare($link, $sql)) {
			
			mysqli_stmt_bind_param($stmt, "s", $param_email);

			$param_email =$email;

			if (mysqli_stmt_execute($stmt)) {
				mysqli_stmt_store_result($stmt);
			}
			// _rows es para revisar fila por fila
			if (mysqli_stmt_num_rows($stmt) == 1) {
				
				mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hashed_password, $rol_id,$idciudad,$foto);
				if (mysqli_stmt_fetch($stmt)) {
					$clave=SED::decryption($hashed_password);

					if (($password==$clave)) {
						session_start();

						// almacenar datos  
						$_SESSION["loggedin"]= true;
						$_SESSION["id"]= $id;
						$_SESSION["usuario"]= $usuario;
						$_SESSION["email"]= $email;
						$_SESSION["rol_id"]= $rol_id;
						$_SESSION["idciudad"]= $idciudad;
						$_SESSION["foto"]= $foto;

						header('location: funtion/index.php');

					}else{
						$_SESSION["login_attempts"] += 1;
						$password_err = "La contraseña que has introducido no es válida";
					}

				} 
			}else{
					$_SESSION["login_attempts"] += 1;
					$email_err = "No se ha encontrado ninguna cuenta con ese correo electronico.";
				} 

		}else{
					echo "UPS! algo salio mal, intentalo mas tarde";
				}
	}

	mysqli_close($link);



}

?>

