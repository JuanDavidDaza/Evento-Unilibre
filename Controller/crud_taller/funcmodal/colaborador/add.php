<?php
include_once('../../../../Model/connection.php');
include_once('../../../../Model/BD.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../../../Views/public/PHPMailer/Exception.php";
require_once "../../../../Views/public/PHPMailer/PHPMailer.php";
require_once "../../../../Views/public/PHPMailer/SMTP.php";

$output = array('error' => false);


$database = new Connection();
$db = $database->open();
try {


	$idevento1 = $_POST['idevento'];
	$idusuario1 = $_POST['usuario'];


	//recupero los datos del evento y del usuario 

	$sqlusuario = "SELECT * FROM usuarios WHERE id = '$idusuario1'";
	$resultadousuario = $link->query($sqlusuario);
	$rowusuario = $resultadousuario->fetch_array(MYSQLI_ASSOC);
	$nombre = $rowusuario['usuario'];
	$email = $rowusuario['email'];



	$sqlevento = "SELECT * FROM evento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve WHERE idevento = '$idevento1'";
	$resultadoevento = $link->query($sqlevento);
	$rowevento = $resultadoevento->fetch_array(MYSQLI_ASSOC);
	$nombreevento = $rowevento['nombreevento'];
	$nombretipo = $rowevento['nombretipo'];




	$sql = "SELECT idusuario,idevento FROM evento_usuario WHERE idusuario = '$idusuario1' AND idevento ='$idevento1'";

	if ($sql = mysqli_prepare($link, $sql)) {
		if (mysqli_stmt_execute($sql)) {
			mysqli_stmt_store_result($sql);

			if (mysqli_stmt_num_rows($sql) == 1) {
				$output['error'] = true;
				$output['message'] = 'Ya esta registrado al evento este Colaborador';
			} else {
				$stmt = $db->prepare("INSERT INTO evento_usuario (idusuario,idevento) VALUES (:idusuario,:idevento)");
				// declaración if-else en la ejecución de nuestra declaración preparada
				if ($stmt->execute(array(':idusuario' => $_POST['usuario'], ':idevento' => $_POST['idevento']))) {
					enviar_correo($email, $nombre, $nombreevento, $idevento1, $nombretipo);
					$output['message'] = 'Registro agregado correctamente';
				} else {
					$output['error'] = true;
					$output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
				}
			}
		}
	}
} catch (PDOException $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();
}

function enviar_correo($email, $nombre, $nombreevento, $idevento, $nombretipo)
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
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		//Recipients
		$mail->setFrom('Evento_UniversidadLibre@outlook.com', 'UNIVERSIDAD LIBRE - Registro al Evento como Colaborador');
		$mail->addAddress($email, $nombre);     // Add a recipient             

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'UNIVERSIDAD LIBRE - Registro al Evento ' . utf8_decode($nombreevento) . ' como Colaborador';
		$mail->Body    = '<p></p><div class="es-wrapper-color" style="background-color: #efefef;"><table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; padding: 0; margin: 0; width: 100%; height: 100%; background-repeat: repeat; background-position: center top;"><tbody><tr style="border-collapse: collapse;"><td valign="top" style="padding: 0; margin: 0;"><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;"><tbody><tr style="border-collapse: collapse;"><td align="center" bgcolor="transparent" style="padding: 0; margin: 0; background-color: transparent;"><table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #ffffff; width: 600px;"><tbody><tr style="border-collapse: collapse;"><td align="left" bgcolor="transparent" style="padding: 0; margin: 0; background-color: transparent; background-position: left top;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 600px;"><table cellpadding="0" cellspacing="0" width="100%" bgcolor="#333333" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #333333;" role="presentation"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; font-size: 0;"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/44071573045651122.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #ffffff;"><strong>Bienvenido</strong></h1><h1 style="margin: 0; line-height: 46px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 38px; font-style: normal; font-weight: bold; color: #d60b2c;"><strong><span style="background-color: #ffffff;">&nbsp;Universidad Libre&nbsp;</span></strong></h1></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; padding-left: 10px; padding-right: 10px; padding-top: 20px;"><img src="https://seeklogo.com/images/U/Universidad_Libre-logo-D9C59E8479-seeklogo.com.png" width="150" style="display: block; margin: auto;" /></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; font-size: 0;"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/30691573045911617.png" alt="" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" width="600" /></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr style="border-collapse: collapse;"><td align="left" style="margin: 0; background-position: left top; padding: 40px 20px 20px 20px;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><h1 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 30px; font-style: normal; font-weight: bold; color: #333333;">' . utf8_decode($nombre) . ' fuiste registrado como Colaborador al Evento <i>"' . utf8_decode($nombreevento) . '"</i><br /><br /></h1><span class="es-button-border msohide" style="background: #FF294A; display: inline-block; border-radius: 4px; width: auto; mso-hide: all; border: 0px solid transparent;"> <a href="http://eventos.unilibre.edu.co/detalles.php?idevento=' . $idevento . '" class="es-button" target="_blank" style="mso-style-priority: 100 !important; text-decoration: none; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 18px; color: #ffffff; border-style: solid; border-color: #D60B2C; border-width: 10px 30px; display: inline-block; background: #D60B2C; border-radius: 4px; font-weight: normal; font-style: normal; line-height: 22px; width: auto; text-align: center;" rel="noopener">Ver Detalles</a></span><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 14px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 21px; color: #666666;"><br /><br /></p></td></tr><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0; padding-top: 10px; padding-left: 20px; padding-right: 20px; font-size: 0;"><h4 style="margin: 0; line-height: 36px; mso-line-height-rule: exactly; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; font-size: 15px; font-style: normal; font-weight: bold; color: #333333;">' . utf8_decode($nombretipo) . ' || Activo</h4><table border="0" width="20%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td style="padding: 0; margin: 0px; border-bottom: 3px solid #D60B2C; background: none; height: 1px; width: 100%;"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%; background-color: transparent; background-repeat: repeat; background-position: center top;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><table bgcolor="#FFFFFF" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;"><tbody><tr style="border-collapse: collapse;"><td align="left" bgcolor="#333333" style="margin: 0; background-color: #333333; padding: 20px;"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" valign="top" style="padding: 0; margin: 0; width: 560px;"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;"><tbody><tr style="border-collapse: collapse;"><td align="center" style="padding: 0; margin: 0;"><p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-size: 12px; font-family: helvetica, helvetica neue, arial, verdana, sans-serif; line-height: 18px; color: #ffffff;">Eventos - Universidad Libre</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>';

		$mail->send();
		// echo 1;
	} catch (Exception $e) {
		// echo 0;
	}
}

//cerrar conexión
$database->close();

echo json_encode($output);
