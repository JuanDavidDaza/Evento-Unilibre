<?php
require_once "../../../Model/session_admin2.php";
require_once "../../../Model/BD.php";

//$sql = "SELECT * FROM evento $where";
//$sql = "SELECT * FROM evento WHERE estado='Activo'";	

$idciudad = $_SESSION['idciudad'];
//echo $idciudad;

$ciudadevento = "SELECT nombre FROM ciudad WHERE idciudad='$idciudad'";
$ciudadrespuesta = $link->query($ciudadevento);
foreach ($ciudadrespuesta as $rowciudadrespuesta) {
	$nombreciudadevento = $rowciudadrespuesta['nombre'];
}

//$sql = "SELECT * FROM evento $where";
if ($idciudad != '0') {
	$sql = "SELECT evento.idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento, programas.nombreprograma AS PROGRAMA, entidad.nombreentidad,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad  INNER JOIN evento_programas ON evento_programas.idevento=evento.idevento INNER JOIN programas ON evento_programas.programa=programas.idprograma INNER JOIN evento_entidades ON evento_entidades.idevento=evento.idevento INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad WHERE  evento.idciudad = '$idciudad'";
	$resultado = $link->query($sql);

	$evento = "SELECT idevento from evento where idciudad='$idciudad'";
	$resultado_1 = $link->query($evento);
	$impent = [];
	$c = 0;
	$impprog = [];
	$c1 = 0;

	foreach ($resultado_1 as $idevento_evento) {
		$idevento_e = $idevento_evento['idevento'];
		//echo $idevento_e.', ';
		$evento_programa = "SELECT * FROM evento_programas INNER JOIN evento ON evento.idevento = evento_programas.idevento WHERE evento_programas.idevento='$idevento_e' AND evento.idciudad='$idciudad' GROUP BY evento.idevento";
		$resultado_programa = $link->query($evento_programa);
		if ($evento_programa = mysqli_prepare($link, $evento_programa)) {
			if (mysqli_stmt_execute($evento_programa)) {
				mysqli_stmt_store_result($evento_programa);

				if (mysqli_stmt_num_rows($evento_programa) == 1) {
					//$errMSG = 'Solo se puede tener una Imagen de Tipo Principal';		
					//echo '<br> eventos programas: '. $idevento_e.'<br> ';
					$evento_entidades = "SELECT * FROM evento_entidades INNER JOIN evento ON evento.idevento = evento_entidades.idevento WHERE evento_entidades.idevento='$idevento_e' AND evento.idciudad='$idciudad' GROUP BY evento.idevento";
					$resultado_programa = $link->query($evento_entidades);
					if ($evento_entidades = mysqli_prepare($link, $evento_entidades)) {
						if (mysqli_stmt_execute($evento_entidades)) {
							mysqli_stmt_store_result($evento_entidades);

							if (mysqli_stmt_num_rows($evento_entidades) == 1) {
								//ambos
								//echo '<br> tiene ambos: '. $idevento_e.'<br> ';
								$sql = "SELECT evento.idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento, programas.nombreprograma AS PROGRAMA, entidad.nombreentidad,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad  INNER JOIN evento_programas ON evento_programas.idevento=evento.idevento INNER JOIN programas ON evento_programas.programa=programas.idprograma INNER JOIN evento_entidades ON evento_entidades.idevento=evento.idevento INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad";
								$resultado = $link->query($sql);
							} else {
								//eventos sin entidad
								//echo '<br> Sin Entidad: '. $idevento_e.'<br> ';
								$sql_evento_ent = "SELECT evento.idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento, programas.nombreprograma AS PROGRAMA,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad  INNER JOIN evento_programas ON evento_programas.idevento=evento.idevento INNER JOIN programas ON evento_programas.programa=programas.idprograma WHERE evento.idevento='$idevento_e'";
								$imprimir_entidades = $link->query($sql_evento_ent);
								while ($row_1p = $imprimir_entidades->fetch_array(MYSQLI_ASSOC)) {
									$impprog[$c1] = '<tr><td>' . $row_1p['nombreevento'] . '</td>' . '<td>' . $row_1p['idtipoeve'] . '</td>' . '<td>' . $row_1p['responsable'] . '</td>' . '<td> ' . $row_1p['PROGRAMA'] . '</td>' . '<td> ### </td>' . '<td>' . $row_1p['estado'] . '</td></tr>';
									$c1 = $c1 + 1;
								}
							}
						}
					}
				} else {
					//echo '<br> eventos sin programas: '. $idevento_e.'<br> ';
					$sql_evento_programa = "SELECT evento.idevento,evento_tipo.nombretipo AS idtipoeve,nombreevento, entidad.nombreentidad,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad INNER JOIN evento_entidades ON evento_entidades.idevento=evento.idevento INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad WHERE  evento.idciudad = '$idciudad' and evento.idevento='$idevento_e'";
					$imprimir_entidades = $link->query($sql_evento_programa);
					while ($row_1p = $imprimir_entidades->fetch_array(MYSQLI_ASSOC)) {
						$impent[$c] = '<tr><td>' . $row_1p['nombreevento'] . '</td>' . '<td>' . $row_1p['idtipoeve'] . '</td>' . '<td>' . $row_1p['responsable'] . '</td>' . '<td> ### </td>' . '<td>' . $row_1p['nombreentidad'] . '</td>' . '<td>' . $row_1p['estado'] . '</td></tr>';
						$c = $c + 1;
					}
				}
			}
		}
	} //fin del foreach




} else {
	//
}


require_once "../../../Views/funtion/diagrama/imprimir.php";
