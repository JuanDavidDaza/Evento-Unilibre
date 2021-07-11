
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
		$mail->Body    = '<!DOCTYPE html>
				<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="width:100%;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
				 <head> 
				  <meta charset="UTF-8"> 
				  <meta content="width=device-width, initial-scale=1" name="viewport"> 
				  <meta name="x-apple-disable-message-reformatting"> 
				  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
				  <meta content="telephone=no" name="format-detection"> 
				 
				  <style type="text/css">
				@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:14px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120% } h2 { font-size:26px!important; text-align:center; line-height:120% } h3 { font-size:20px!important; text-align:center; line-height:120% } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important; text-align:center } .es-menu td a { font-size:12px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:12px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button { font-size:16px!important; display:inline-block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .g-card td { width:100%!important; display:block; max-width:100%!important } .g-card amp-img, .g-card img { border-radius:8px 8px 0px 0px!important } }
				#outlook a {
					padding:0;
				}
				.ExternalClass {
					width:100%;
				}
				.ExternalClass,
				.ExternalClass p,
				.ExternalClass span,
				.ExternalClass font,
				.ExternalClass td,
				.ExternalClass div {
					line-height:100%;
				}
				.es-button {
					mso-style-priority:100!important;
					text-decoration:none!important;
				}
				a[x-apple-data-detectors] {
					color:inherit!important;
					text-decoration:none!important;
					font-size:inherit!important;
					font-family:inherit!important;
					font-weight:inherit!important;
					line-height:inherit!important;
				}
				.es-desk-hidden {
					display:none;
					float:left;
					overflow:hidden;
					width:0;
					max-height:0;
					line-height:0;
					mso-hide:all;
				}
				.es-button-border:hover a.es-button {
					background:#f32043!important;
					border-color:#f32043!important;
				}
				.es-button-border:hover {
					border-color:#aNaNaN #aNaNaN #aNaNaN #aNaNaN!important;
					background:transparent!important;
				}
				</style> 
				 </head> 
				 <body style="width:100%;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"> 
				  <div class="es-wrapper-color" style="background-color:#EFEFEF"> 
				   <!--[if gte mso 9]>
							<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
								<v:fill type="tile" color="#efefef"></v:fill>
							</v:background>
						<![endif]--> 
				   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top"> 
				     <tr style="border-collapse:collapse"> 
				      <td valign="top" style="padding:0;Margin:0"> 
				       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"> 
				         <tr style="border-collapse:collapse"> 
				          <td align="center" bgcolor="transparent" style="padding:0;Margin:0;background-color:transparent"> 
				           <table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"> 
				             <tr style="border-collapse:collapse"> 
				              <td align="left" bgcolor="transparent" style="padding:0;Margin:0;background-color:transparent;background-position:left top"> 
				               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                 <tr style="border-collapse:collapse"> 
				                  <td align="center" valign="top" style="padding:0;Margin:0;width:600px"> 
				                   <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#333333" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#333333" role="presentation"> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/44071573045651122.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="600"></td> 
				                     </tr> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#FFFFFF"><strong>Bienvenido</strong></h1><h1 style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:38px;font-style:normal;font-weight:bold;color:#D60B2C"><strong><span style="background-color:#FFFFFF">&nbsp;Universidad Libre&nbsp;</span></strong></h1></td> 
				                     </tr> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0;padding-left:10px;padding-right:10px;padding-top:20px"> 
				                        <img src="https://seeklogo.com/images/U/Universidad_Libre-logo-D9C59E8479-seeklogo.com.png" width="150" style="display:block;margin:auto;"><br>
				                     
				                       </td> 
				                     </tr> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0;font-size:0"><img class="adapt-img" src="https://iyfiak.stripocdn.email/content/guids/CABINET_5388689294e4710d81d3e20a732cb448/images/30691573045911617.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="600"></td> 
				                     </tr> 
				                   </table></td> 
				                 </tr> 
				               </table></td> 
				             </tr> 
				             <tr style="border-collapse:collapse"> 
				              <td align="left" style="Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:40px;background-position:left top"> 
				               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                 <tr style="border-collapse:collapse"> 
				                  <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
				                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#333333">Se pre-inscribió correctamente al Evento <i>"' . utf8_decode($nombreevento) . '"</i> </h1>
				                        
				                        <span class="es-button-border msohide" style="border-style:solid;border-color:transparent;background:#FF294A;border-width:0px;display:inline-block;border-radius:4px;width:auto;mso-hide:all">

				                      <a href="http://localhost/Evento/detalles.php?idevento=' . $idevento . '" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#D60B2C;border-width:10px 30px;display:inline-block;background:#D60B2C;border-radius:4px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center">Ver Detalles</a></span> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#666666"><br><br></p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:21px;color:#666666"><br><br></p></td> 

				                     </tr> 
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px;font-size:0"> 
				                        <h4 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;font-size:15px;font-style:normal;font-weight:bold;color:#333333">' . utf8_decode($nombretipo) . ' || Activo </h4>
				                       <table border="0" width="20%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                         <tr style="border-collapse:collapse"> 
				                          <td style="padding:0;Margin:0;border-bottom:3px solid #D60B2C;background:none;height:1px;width:100%;margin:0px"></td> 
				                         </tr> 
				                       </table></td> 
				                     </tr> 
				                   </table></td> 
				                 </tr> 
				               </table></td> 
				             </tr> 
				           </table></td> 
				         </tr> 
				       </table> 
				       <table cellpadding="0" cellspacing="0" class="es-footer" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top"> 
				         <tr style="border-collapse:collapse"> 
				          <td align="center" style="padding:0;Margin:0"> 
				           <table bgcolor="#FFFFFF" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"> 
				             <tr style="border-collapse:collapse"> 
				              <td align="left" bgcolor="#333333" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;background-color:#333333"> 
				               <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                 <tr style="border-collapse:collapse"> 
				                  <td align="center" valign="top" style="padding:0;Margin:0;width:560px"> 
				                   <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"> 
				                     
				                     <tr style="border-collapse:collapse"> 
				                      <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, helvetica neue, arial, verdana, sans-serif;line-height:18px;color:#FFFFFF">Eventos - Universidad Libre</p></td> 
				                     </tr> 
				                   </table></td> 
				                 </tr> 
				               </table></td> 
				             </tr> 
				           </table></td> 
				         </tr> 
				       </table> 
				      </td> 
				     </tr> 
				   </table> 
				  </div>  
				 </body>
				</html>';

		$mail->send();
		echo 1;
	} catch (Exception $e) {
		echo 0;
	}
}


require('../../../Views/funtion/crud_asistencia/registro_c.php');

?>









