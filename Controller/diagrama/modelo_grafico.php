<?php

class Modelo_Grafico
{
	private $conexion;
	function __construct()
	{
		require_once('../../Controller/diagrama/conexion.php');
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}


	function TraerDatosGraficoBar()
	{
		//$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";	

		//con esta consulta sql no logro contarlas, requiero ayuda para poder traerme los nombres 
		//SELECT evento_tipo.nombretipo,evento.idtipoeve FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve
		$sql = "SELECT idtipoeve, COUNT(*) AS evento FROM evento GROUP BY idtipoeve";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function TraerDatosGrafico($idciudad)
	{
		$sql = "SELECT evento_tipo.nombretipo,COUNT(evento.idtipoeve) 
				FROM evento, evento_tipo
				WHERE evento_tipo.idtipoeve=evento.idtipoeve and evento.idciudad='$idciudad'
				GROUP BY evento.idtipoeve";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function Conferencista($idciudad)
	{
		$sql = "SELECT conferencistas.nombre AS nombre, COUNT(evento_conferencistas.idevento) AS cantidad,
					evento.idevento FROM evento_conferencistas  
					INNER JOIN conferencistas ON evento_conferencistas.nombre=conferencistas.cedula 
					INNER JOIN evento ON evento.idevento=evento_conferencistas.idevento WHERE evento.idciudad='$idciudad'
					GROUP BY evento_conferencistas.nombre";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function Programas($idciudad)
	{
		$sql = "SELECT programas.nombreprograma AS nombre, COUNT(evento_programas.idevento) AS cantidad,
					evento_programas.idevento FROM evento_programas  
					INNER JOIN programas ON programas.idprograma=evento_programas.programa
					INNER JOIN evento ON evento.idevento=evento_programas.idevento WHERE evento.idciudad='$idciudad'
					GROUP BY evento_programas.programa";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function Programas_Estado($idciudad, $programa)
	{
		$sql = "SELECT evento.estado, COUNT(evento.estado) AS cantidad FROM evento_programas  
					INNER JOIN programas ON programas.idprograma=evento_programas.programa
					INNER JOIN evento ON evento.idevento=evento_programas.idevento WHERE evento.idciudad='$idciudad' AND evento_programas.programa='$programa' 
					GROUP BY evento.estado";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function Entidades($idciudad)
	{
		$sql = "SELECT entidad.nombreentidad AS nombre, COUNT(evento_entidades.idevento) AS cantidad,
					evento_entidades.idevento FROM evento_entidades  
					INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad
					INNER JOIN evento ON evento.idevento=evento_entidades.idevento  WHERE evento.idciudad='$idciudad'
					GROUP BY evento_entidades.entidad";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function Entidades_Estado($idciudad, $entidad)
	{
		$sql = "SELECT evento.estado, COUNT(evento.estado) AS cantidad FROM evento_entidades  
					INNER JOIN entidad ON entidad.identidad=evento_entidades.entidad
					INNER JOIN evento ON evento.idevento=evento_entidades.idevento WHERE evento.idciudad='$idciudad' AND evento_entidades.entidad='$entidad' 
					GROUP BY evento.estado";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}



	function TraerDatosGraficoActivo($idciudad)
	{
		$sql = "SELECT evento_tipo.nombretipo,COUNT(evento.idtipoeve) 
				FROM evento, evento_tipo
				WHERE evento_tipo.idtipoeve=evento.idtipoeve AND estado='Activo'
				and evento.idciudad='$idciudad' GROUP BY evento.idtipoeve";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function TraerDatosGraficoInactivo($idciudad)
	{
		$sql = "SELECT evento_tipo.nombretipo,COUNT(evento.idtipoeve) 
				FROM evento, evento_tipo
				WHERE evento_tipo.idtipoeve=evento.idtipoeve AND estado='Inactivo' and evento.idciudad='$idciudad'
				GROUP BY evento.idtipoeve";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}

	function TraerDatosGraficoCerrado($idciudad)
	{
		$sql = "SELECT evento_tipo.nombretipo,COUNT(evento.idtipoeve) 
			FROM evento, evento_tipo
			WHERE evento_tipo.idtipoeve=evento.idtipoeve AND estado='Cerrado' and evento.idciudad='$idciudad'
			GROUP BY evento.idtipoeve";
		//$sql="SELECT idtipoeve, COUNT(*) AS evento FROM evento WHERE estado='Cerrado'  GROUP BY idtipoeve";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}


	function TraerNombres($idevento)
	{
		$sql = "SELECT nombresesion  FROM evento_sesion WHERE idevento='$idevento'";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}


	function TraerDatosGraficoBar1($idevento)
	{
		/*
		SELECT evento_tipo.nombretipo,COUNT(evento.idtipoeve) 
		FROM evento, evento_tipo
		WHERE evento_tipo.idtipoeve=evento.idtipoeve AND estado='Cerrado'
		GROUP BY evento.idtipoeve;*/
		//$sql = "SELECT * FROM evento WHERE idevento = '$idevento'";	
		//$sql="SELECT count(*) FROM (SELECT idtipoeve FROM evento GROUP BY idtipoeve) AS Total";
		//puedo traerme el nombre del campo  y remplazarlo con el codigo pero no logro contarlos 
		//SELECT evento_tipo.nombretipo,evento.idtipoeve FROM evento INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve
		$sql = "SELECT asistente_sesion.idevento,evento_sesion.nombresesion , COUNT(*) AS asistente_sesion FROM asistente_sesion INNER JOIN evento_sesion ON evento_sesion.id=asistente_sesion.idsesion WHERE asistente_sesion.idevento='$idevento'  GROUP BY idsesion";
		//$sql="SELECT idevento,idsesion, COUNT(*) AS asistente_sesion FROM asistente_sesion WHERE idevento='$idevento' GROUP BY idsesion ";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}



	function TraerDatosGraficoPieSexo($idevento)
	{
		// trae el numero de personas inscritas a ese evento
		//$sql="SELECT idevento, COUNT(*) AS inscripcion FROM pre_inscripcion WHERE idevento='$idevento' GROUP BY idevento";
		//trae el numero de personas pre-inscritas al evento agrupandolo con el sexo
		$sql = "SELECT genero, COUNT(*) AS sexo FROM pre_inscripcion WHERE idevento='$idevento' GROUP BY genero";

		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {

			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
}



/* PREGUNTAR AL PROFESOR: SACAR GRAFICO TIPO EVENTO POR PROGRAMA Y CIUDAD 

SELECT evento_tipo.nombretipo, COUNT(evento.idtipoeve) AS Cantidad FROM evento_programas 

INNER JOIN programas ON programas.idprograma=evento_programas.programa
INNER JOIN evento ON programas.idprograma=evento_programas.programa 
INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve WHERE evento_programas.programa='15' AND evento.idciudad='1'
GROUP BY  evento.idtipoeve */
