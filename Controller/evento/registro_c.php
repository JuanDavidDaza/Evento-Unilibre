
<?php


require_once "Model/BD.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "Views/public/PHPMailer/Exception.php";
require_once "Views/public/PHPMailer/PHPMailer.php";
require_once "Views/public/PHPMailer/SMTP.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$idasistente_err = "";
	$idasistente1 = (isset($_POST['idasistente'])) ? $_POST['idasistente'] : "";
	$idevento = (isset($_POST['idevento'])) ? $_POST['idevento'] : "";


	$tipoeve = "SELECT evento.idevento,evento_tipo.nombretipo,evento.nombreevento,evento.generalinfo,evento_sesion.fechainicio,ciudad.idciudad,evento.estado,evento.generalinfo,evento.idtipoeve, ciudad.nombre AS Ciudad FROM evento  INNER JOIN evento_sesion ON evento_sesion.idevento=evento.idevento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo' AND evento.idevento = '$idevento' GROUP BY evento_sesion.idevento";

	//$tipoeve = "SELECT * FROM evento WHERE idevento = '$idevento'";
	$resultadotipo = $link->query($tipoeve);
	$rowtipo = $resultadotipo->fetch_array(MYSQLI_ASSOC);


	$estado = $rowtipo['estado'];
	$idciudad = $rowtipo['idciudad'];
	$nombreevento = $rowtipo['nombreevento'];
	$generalinfo = $rowtipo['generalinfo'];
	$nombretipo = $rowtipo['nombretipo'];

	$sqlsesion = "SELECT * FROM evento_sesion WHERE idevento = '$idevento'";
	$resultadosesion = $link->query($sqlsesion);
	$rowsesion = $resultadosesion->fetch_array(MYSQLI_ASSOC);
	$tipoevento = $rowtipo['idtipoeve'];
	//echo $tipoevento;
	$sesion_evento = $rowsesion['id'];

	$BD = new basedatos();

	if (empty(trim($_POST["idasistente"]))) {
		echo "Error";
		header("location: index.php");
		die();
	} else {
		if ($estado = "Activo") {
			//prepara una declaracion de seleccion
			$idasistente1 = (isset($_POST['idasistente'])) ? $_POST['idasistente'] : "";
			$sql = "SELECT idasistente FROM pre_inscripcion WHERE idasistente = '$idasistente1' AND idevento ='$idevento'";

			if ($stmt = mysqli_prepare($link, $sql)) {
				//echo "funciona";
				if (mysqli_stmt_execute($stmt)) {
					//echo "funciona2";
					mysqli_stmt_store_result($stmt);

					if (mysqli_stmt_num_rows($stmt) == 1) {
						//echo "funciona3";
						$idasistente_err = "Este Numero de documento ya esta inscrito a este evento";
						echo "<script> alert('Este Numero de documento ya esta inscrito a este evento') </script>";
					} else {
						if (($tipoevento == "1") || ($tipoevento == "5")) {

							//echo "Es una Reunión";//añade los datos si no esta registrado esa cedula a este evento
							$idasistente = $idasistente1;
							$tipoid = (isset($_POST['tipoid'])) ? $_POST['tipoid'] : "";
							$nombre = (isset($_POST['name'])) ? $_POST['name'] : "";
							$email = (isset($_POST['email'])) ? $_POST['email'] : "";
							$celular = (isset($_POST['mobile'])) ? $_POST['mobile'] : "";
							$genero = (isset($_POST['gender'])) ? $_POST['gender'] : "";
							$idinstitucion = (isset($_POST['idinstitucion'])) ? $_POST['idinstitucion'] : "";
							$sesion_evento = $rowsesion['id'];

							$campos_Pre_inscripcion = ['idasistente', 'tipoid', 'nombre', 'correo', 'celular', 'genero', 'idinstitucion', 'idevento'];

							$valores_Pre_inscripcion = [$idasistente, $tipoid, $nombre, $email, $celular, $genero, $idinstitucion, $idevento];

							$BD->AdicionarRegistro('pre_inscripcion', $campos_Pre_inscripcion, $valores_Pre_inscripcion);
							$BD = new basedatos();

							$campos = ['idasistente', 'idevento', 'idsesion', 'tipoid', 'nombre', 'correo', 'celular', 'genero', 'idinstitucion'];


							$valores = [
								$idasistente, $idevento, $sesion_evento,
								$tipoid,
								$nombre,
								$email,
								$celular,
								$genero,
								$idinstitucion
							];

							if (empty($idasistente_err)) {
								if ($BD->AdicionarRegistro('asistente_sesion', $campos, $valores)) {
									//enviar_correo($email,$nombre,$nombreevento,$generalinfo,$nombretipo);
									//echo 'Adición registro exitosa. [' . 
									//$valores[0] . 
									//$valores[1] . 
									//$valores[2] . 
									//$valores[3] . 
									//$valores[4] . 
									//$valores[5] . 
									//$valores[6] . 
									//$valores[7] . 
									//']';
								} else {
									echo 'Falló agregar registro. [' .
										$valores[0] .
										$valores[1] .
										$valores[2] .
										$valores[3] .
										$valores[4] .
										$valores[5] .
										$valores[6] .
										$valores[7] .
										$valores[8] .
										']';
								}
							} //añade los datos
						} else {
							//echo "Funcionaaaaaaaaaaaaaaaaaaaaaaaaaaa4";//añade los datos si no esta registrado esa cedula a este evento
							$idasistente = $idasistente1;
							$tipoid = (isset($_POST['tipoid'])) ? $_POST['tipoid'] : "";
							$nombre = (isset($_POST['name'])) ? $_POST['name'] : "";
							$email = (isset($_POST['email'])) ? $_POST['email'] : "";
							$celular = (isset($_POST['mobile'])) ? $_POST['mobile'] : "";
							$genero = (isset($_POST['gender'])) ? $_POST['gender'] : "";
							$idinstitucion = (isset($_POST['idinstitucion'])) ? $_POST['idinstitucion'] : "";


							$campos = ['idasistente', 'tipoid', 'nombre', 'correo', 'celular', 'genero', 'idinstitucion', 'idevento'];

							$valores = [$idasistente, $tipoid, $nombre, $email, $celular, $genero, $idinstitucion, $idevento];

							if (empty($idasistente_err)) {
								if ($BD->AdicionarRegistro('pre_inscripcion', $campos, $valores)) {
									$mensaje = "Se pre-inscribió correctamente al Evento";
									enviar_correo($email, $nombre, $nombreevento, $generalinfo, $nombretipo, $idevento, $mensaje);
									//echo 'Adición registro exitosa. [' . 
									//$valores[0] . 
									//$valores[1] . 
									//$valores[2] . 
									//$valores[3] . 
									//$valores[4] . 
									//$valores[5] . 
									//$valores[6] . 
									//$valores[7] . 
									//']';
								} else {
									echo 'Falló agregar registro. [' .
										$valores[0] .
										$valores[1] .
										$valores[2] .
										$valores[3] .
										$valores[4] .
										$valores[5] .
										$valores[6] .
										$valores[7] .
										$valores[8] .
										']';
								}
							} //añade los datos

						}

						if ($idinstitucion == 0 || $idinstitucion == 7 ||  $idinstitucion == 8 ||  $idinstitucion == 9 || $idinstitucion == 10 || $idinstitucion == 11 || $idinstitucion == 12) {

							$cual = (isset($_POST['cual'])) ? $_POST['cual'] : "";

							$campos2 = ['registro', 'idciudad', 'idasistente', 'idevento'];

							$valores2 = [$cual, $idciudad, $idasistente, $idevento];

							$BD->AdicionarRegistro('registro', $campos2, $valores2);
						}
					}
				} else {
					echo "Ups! Algo salió mal, inténtalo mas tarde";
				}
			}
		} else {
			$idasistente_err = "Este evento no esta Disponible";
			echo "<script> alert('Este Evento actualmente no esta en estado Activo, por favor ingrese mas tarde') </script>";
		}
	} //aqui

} else {
	echo "Error";
	header("location: index.php");
	die();
}


function  enviar_correo($email, $nombre, $nombreevento, $generalinfo, $nombretipo, $idevento, $mensaje)
{

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//Server settings
		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'Evento_UniversidadLibre@outlook.com';                     // SMTP username
		$mail->Password   = 'juandavid1232411';                               // SMTP password
		$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS PHPMailer::ENCRYPTION_STARTTLS` encouraged
		$mail->Port       = 587;                                        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('Evento_UniversidadLibre@outlook.com', 'UNIVERSIDAD LIBRE - Registro de Evento');
		$mail->addAddress($email, $nombre);     // Add a recipient             

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'UNIVERSIDAD LIBRE - Registro al Evento ' . utf8_decode($nombreevento);
		$mail->Body    = '<p></p><div class="es-wrapper-color" style="background-color: #efefef;"><table class="es-wrapper tabla1" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td valign="top" style="padding: 0; margin: 0;"><table cellpadding="0" cellspacing="0" class="es-content tabla2" align="center"><tbody><tr style="border-collapse: collapse;"><td align="center" bgcolor="transparent" style="padding: 0; margin: 0; background-color: transparent;"><table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #ffffff; width: 600px;"><tbody><tr style="border-collapse: collapse;"><td align="left" bgcolor="transparent" style="padding: 0; margin: 0; background-color: transparent; background-position: left top;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 600px;"><table cellpadding="0" cellspacing="0" width="100%" bgcolor="#333333" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #333333;" role="presentation"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; font-size: 0;"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/44071573045651122.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #ffffff;"><strong>Bienvenido</strong></h1><h1 style="margin: 0; line-height: 46px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 38px; font-style: normal; font-weight: bold; color: #d60b2c;"><strong><span style="background-color: #ffffff;">&nbsp;Universidad Libre&nbsp;</span></strong></h1></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 20px;"><img src="https://seeklogo.com/images/U/Universidad_Libre-logo-D9C59E8479-seeklogo.com.png" width="150" style="display: block; margin: auto;" /></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; font-size: 0;"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/30691573045911617.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="border-collapse: collapse;"><td align="left" style="margin: 0; background-position: left top; padding: 40px 20px 20px 20px;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #333333;">' . utf8_decode($mensaje) . ' <i>"' . utf8_decode($nombreevento) . '"</i></h1><span class="es-button-border msohide" style="background: #FF294A; display: inline-block; border-radius: 4px; width: auto; mso-hide: all; border: 0px solid transparent;"> <a href="http://eventos.unilibre.edu.co/detalles.php?idevento=' . $idevento . '" class="es-button" target="_blank" style="mso-style-priority: 100 !important; text-decoration: none; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 18px; color: #ffffff; border-style: solid; border-color: #D60B2C; border-width: 10px 30px; display: inline-block; background: #D60B2C; border-radius: 4px; font-weight: normal; font-style: normal; line-height: 22px; width: auto; text-align: center;" rel="noopener">Ver Detalles</a></span><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; padding-top: 10px; padding-left: 20px; padding-right: 20px; font-size: 0;"><h4 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 15px; font-style: normal; font-weight: bold; color: #333333;">' . utf8_decode($nombretipo) . ' || Activo</h4><table border="0" width="20%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0px; border-bottom: 3px solid #D60B2C; background: none; height: 1px; width: 100%;"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" class="es-footer tabla2" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%; background-color: transparent; background-repeat: repeat; background-position: center top;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><table bgcolor="#FFFFFF" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;"><tbody><tr style="border-collapse: collapse;"><td align="left" bgcolor="#333333" style="margin: 0; background-color: #333333; padding: 20px;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 12px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 18px; color: #ffffff;">Eventos - Universidad Libre</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>';

		$mail->send();
		// echo 1;
	} catch (Exception $e) {
		// echo 0;
	}
}


include 'Views/evento/registro_c.php';

?>









