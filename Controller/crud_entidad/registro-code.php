  <?php
  //valido si es del rol indicado
	require_once "../../../Model/session_admin2.php";
	require_once "../../../Model/BD.php";


$BD = new basedatos();

	//echo $idciudad;

	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$idciudad=$_SESSION['idciudad'];
		$nombreentidad=(isset($_POST['nombreentidad']))?$_POST['nombreentidad']:"";	
		$sql="SELECT nombreentidad FROM entidad WHERE nombreentidad='$nombreentidad' and idciudad='$idciudad'";

			if ($sql = mysqli_prepare($link, $sql)) {
				if (mysqli_stmt_execute($sql)) {
					mysqli_stmt_store_result($sql);
					
					if(mysqli_stmt_num_rows($sql) == 1){
						
						$mensaje = 'Esta Entidad ya esta registrada';		

					}
					else{
						if (($_POST['url'])!=="") {
								$url=(isset($_POST['url']))?$_POST['url']:"";
								 //realiza el guardado de datos correctamenete
								$campos = ['nombreentidad','url', 'idciudad'];

								$valores = [$nombreentidad,$url,$idciudad];

								if ($BD->AdicionarRegistro('entidad', $campos, $valores)){
									$mensaje = 'NUEVA ENTIDAD REGISTRADA';
											
								}else{
									$mensaje = 'Fallo al Registrar';
									echo "Fallo al Registrar";
								}
							}	
						elseif($_POST['url']==""){
								
								$url="https://www.unilibrecali.edu.co";
								 //realiza el guardado de datos correctamenete
								$campos = ['nombreentidad','url','idciudad'];

								$valores = [$nombreentidad,$url,$idciudad];

								if ($BD->AdicionarRegistro('entidad', $campos, $valores)){
									$mensaje = 'NUEVA ENTIDAD REGISTRADA';
											
								}else{
									$mensaje = 'Fallo al Registrar';
									echo "Fallo al Registrar";
								}
						}

					}



				}
			}

		

	 }//fin de agregar datos

	
require_once "../../../Views/funtion/crud_entidad/registro-code.php";
?>
