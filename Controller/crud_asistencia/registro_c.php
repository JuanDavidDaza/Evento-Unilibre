
<?php
require_once "../../../Model/BD.php";
require_once "../../../Model/session_admin3.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../../Views/public/phpmailer/Exception.php";
require_once "../../../Views/public/phpmailer/PHPMailer.php";
require_once "../../../Views/public/phpmailer/SMTP.php";


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
									enviar_correo($email, $nombre, $nombreevento, $generalinfo, $nombretipo, $idevento);
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

}



function enviar_correo($email, $nombre, $nombreevento, $generalinfo, $nombretipo, $idevento)
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
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'juanda7473@gmail.com';                     // SMTP username
		$mail->Password   = 'juandavid1232411';                               // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('juanda7473@gmail.com', 'UNIVERSIDAD LIBRE - Registro de Evento');
		$mail->addAddress($email, $nombre);     // Add a recipient             

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'UNIVERSIDAD LIBRE - Registro al Evento ' . utf8_decode($nombreevento);
		$mail->Body    = '<div style="background-color: #efefef;"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; padding: 0; margin: 0; width: 100%; height: 100%; background-repeat: repeat; background-position: center top;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0;" valign="top"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; background-color: transparent;" bgcolor="transparent" align="center"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #ffffff; width: 600px;" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; background-color: transparent; background-position: left top;" bgcolor="transparent" align="left"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; width: 600px;" valign="top" align="center"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #333333;" role="presentation" width="100%" cellspacing="0" cellpadding="0" bgcolor="#333333"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; font-size: 0;" align="center"><img src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/44071573045651122.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0;" align="center"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #ffffff;"><strong>Bienvenido</strong></h1><h1 style="margin: 0; line-height: 46px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 38px; font-style: normal; font-weight: bold; color: #d60b2c;"><strong><span style="background-color: #ffffff;">&nbsp;Universidad Libre&nbsp;</span></strong></h1></td></tr><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 20px;" align="center"><img src="https://seeklogo.com/images/U/Universidad_Libre-logo-D9C59E8479-seeklogo.com.png" style="display: block; margin: auto;" width="150" /></td></tr><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; font-size: 0;" align="center"><img src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/30691573045911617.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="border-collapse: collapse;"><td style="margin: 0; background-position: left top; padding: 40px 20px 20px 20px;" align="left"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; width: 560px;" valign="top" align="center"><table role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0;" align="center"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #333333;">Se pre-inscribi&oacute; correctamente al Evento <i>"' . utf8_decode($nombreevento) . '"</i></h1><span style="background: #FF294A; display: inline-block; border-radius: 4px; width: auto; mso-hide: all; border: 0px solid transparent;"><a href="http://localhost/Evento/detalles.php?idevento=' . $idevento . '" target="_blank" style="mso-style-priority: 100 !important; text-decoration: none; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 18px; color: #ffffff; border-style: solid; border-color: #D60B2C; border-width: 10px 30px; display: inline-block; background: #D60B2C; border-radius: 4px; font-weight: normal; font-style: normal; line-height: 22px; width: auto; text-align: center;" rel="noopener">Ver Detalles</a></span><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p></td></tr><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; padding-top: 10px; padding-left: 20px; padding-right: 20px; font-size: 0;" align="center"><h4 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 15px; font-style: normal; font-weight: bold; color: #333333;">' . utf8_decode($nombretipo) . ' || Activo</h4></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%; background-color: transparent; background-repeat: repeat; background-position: center top;" cellspacing="0" cellpadding="0" align="center"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0;" align="center"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center"><tbody><tr style="border-collapse: collapse;"><td style="margin: 0; background-color: #333333; padding: 20px;" bgcolor="#333333" align="left"><table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0; width: 560px;" valign="top" align="center"><table role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0;" align="center"><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 12px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 18px; color: #ffffff;">Eventos - Universidad Libre</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>';

		$mail->send();
		echo 1;
	} catch (Exception $e) {
		echo 0;
	}
}

require_once "../../../Views/funtion/vistas/crud/ps.php";
require('../../../Views/funtion/crud_asistencia/registro_c.php');
require_once "../../../Views/funtion/vistas/crud/pi.php";

?>









