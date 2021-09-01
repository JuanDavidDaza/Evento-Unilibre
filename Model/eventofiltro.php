<?php

class eventofiltro
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = "";
	private $database  = "evento";
	private $Table = 'evento';
	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			$conn->set_charset('utf8');
			if ($conn->connect_error) {
				die("Error al conectar con MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error en la consulta: ' . $sqlQuery);
		}
		$data = array();

		/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery, $conn)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error en la consulta: ' . mysqli_error($conn));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function getBrand()
	{
		$sqlQuery = "
		SELECT DISTINCT nombretipo, idtipoeve FROM evento_tipo WHERE idtipoeve != 7 ";
		return  $this->getData($sqlQuery);
	}/*
	public function getStorage(){
		$sqlQuery = "
			SELECT  DISTINCT(nombre)
			FROM  ciudad
			";
        return  $this->getData($sqlQuery);
	}*/

	public function getRam()
	{
		$sqlQuery = "
			SELECT  DISTINCT(nombre)
			FROM  ciudad
			";
		return  $this->getData($sqlQuery);
	}
	public function searchEvento()
	{

		$limit = '6';
		$page = 1;
		$page1 = (isset($_POST['page'])) ? $_POST['page'] : "";
		if ($page1 > 1) {
			$start = (($_POST['page'] - 1) * $limit);
			$page = $_POST['page'];
		} else {
			$start = 0;
		}

		$sqlQuery = "SELECT 
		idevento,evento_tipo.nombretipo,nombreevento,certificado,tematica,responsable,estado,ciudad.nombre,generalinfo, evento_tipo.idtipoeve 

		FROM " . $this->Table . " INNER JOIN evento_tipo ON evento.idtipoeve=evento_tipo.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad WHERE estado='Activo'  AND evento_tipo.idtipoeve != 7";


		if (isset($_POST["buscar"]) && !empty($_POST["buscar"])) {
			$sqlQuery .= "
			AND (evento.nombreevento like '%" . $_POST["buscar"] . "%' or
			evento_tipo.nombretipo like '%" . $_POST["buscar"] . "%' or
			evento.responsable like '%" . $_POST["buscar"] . "%' or
			ciudad.nombre like '%" . $_POST["buscar"] . "%'
			
			)";
		}
		if (isset($_POST["brand"])) {
			$brandFilterData = implode("','", $_POST["brand"]);
			$sqlQuery .= "
			AND evento_tipo.nombretipo IN('" . $brandFilterData . "')";
		}

		if (isset($_POST["ram"])) {
			$ramFilterData = implode("','", $_POST["ram"]);
			$sqlQuery .= "
			AND ciudad.nombre IN('" . $ramFilterData . "')";
		}
		/*if(isset($_POST["storage"])) {
			$storageFilterData = implode("','", $_POST["storage"]);
			$sqlQuery .= "
			AND storage IN('".$storageFilterData."')";
		}*/
		$sqlQuery .= " ORDER By evento.idevento ";

		$filter_query = $sqlQuery . 'LIMIT ' . $start . ', ' . $limit . '';



		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$totalResult = mysqli_num_rows($result);

		$result = mysqli_query($this->dbConnect, $filter_query);
		$total_filter_data = mysqli_num_rows($result);

		$searchResultHTML = '';
		if ($totalResult > 0) {
			/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/

			$img = array();
			$cont = 0;



			while ($row = mysqli_fetch_assoc($result)) {

				$sql2 = "SELECT * FROM evento_foto WHERE idevento=" . $row['idevento'] . " and tipo='Principal'";
				$result2 = mysqli_query($this->dbConnect, $sql2);

				if ($row2 = mysqli_fetch_assoc($result2)) {
					$img[$cont] = $row2['foto'];
				} else {
					$img[$cont] = 'Logo-Universidad-Libre.png';
				}

				$searchResultHTML .= '
				
		              <div class="card" data-aos="zoom-in" >
						  <div class="card-text">
						    <div class="portada"><a href="detalles.php?idevento=' . $row['idevento'] . '">
						    <img class="imgportada" src="Content/evento_foto/' . $img[$cont] . '" alt="' . $row['nombreevento'] . '"></a>
						    </div>
						    <div class="title-total">   
						      <div class="title"><span class="badge badge-dark">' . $row['nombretipo'] . '</span></div>
						  
						  <div class="desc">' . $row['nombreevento'] . '</div>
						      <h3>' . $row['nombre'] . '</h3>
						  <div class="actions multi-button">
						    <a  href="detalles.php?idevento=' . $row['idevento'] . '">Detalles</a>
						<a  href="registro.php?idevento=' . $row['idevento'] . '">Inscripción</a>
						  </div></div>
						  </div> 
						</div>
					';


				$cont++;

				////////////////////////////////////

			} //
			$searchResultHTML .= '
			<br />
			<div class="container" >
			  <div align="center" >
			    <ul class="pagination"  style="justify-content: center; color: black; ">
			';
			$total_links = ceil($totalResult / $limit);
			$previous_link = '';
			$next_link = '';
			$page_link = '';

			//echo $total_links;

			if ($total_links > 4) {
				if ($page < 4) {
					for ($count = 1; $count <= 4; $count++) {
						$page_array[] = $count;
					}
					$page_array[] = '...';
					$page_array[] = $total_links;
				} else {
					$end_limit = $total_links - 4;
					if ($end_limit == 1) {
						//$page_array[] = '...';
						for ($count = $end_limit; $count <= $total_links; $count++) {
							$page_array[] = $count;
						}
					} elseif ($page > $end_limit) {
						$page_array[] = 1;
						$page_array[] = '...';
						for ($count = $end_limit; $count <= $total_links; $count++) {
							$page_array[] = $count;
						}
					} else {
						$page_array[] = 1;
						$page_array[] = '...';
						for ($count = $page - 1; $count <= $page + 1; $count++) {
							$page_array[] = $count;
						}
						$page_array[] = '...';
						$page_array[] = $total_links;
					}
				}
			} else {
				for ($count = 1; $count <= $total_links; $count++) {
					$page_array[] = $count;
				}
			}


			for ($count = 0; $count < count($page_array); $count++) {
				if ($page == $page_array[$count]) {
					$page_link .= '
				      <li class="page-item active " >
				        <a class="page-link" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
				      </li>
				      ';

					$previous_id = $page_array[$count] - 1;
					if ($previous_id > 0) {
						$previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Anterior</a></li>';
					} else {
						$previous_link = '
				        <li class="page-item disabled">
				          <a class="page-link">Anterior</a>
				        </li>
				        ';
					}
					$next_id = $page_array[$count] + 1;
					if ($next_id > $total_links) {
						$next_link = '
				        <li class="page-item disabled">
				          <a class="page-link">Siguiente</a>
				        </li>
				          ';
					} else {
						$next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Siguiente</a></li>';
					}
				} else {
					if ($page_array[$count] == '...') {
						$page_link .= '
				        <li class="page-item disabled">
				            <a>...</a>
				        </li>
				        ';
					} else {
						$page_link .= '
				        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
				        ';
					}
				}
			}

			$searchResultHTML .= $previous_link . $page_link . $next_link;
			$searchResultHTML .= '
				    </ul>

				  </div>
				  </div>
				  ';
		} else {
			$searchResultHTML = '<br><br><h3 class="text-center">No se ha encontrado ningún evento</h3>';
		}


		return $searchResultHTML;
	}
}
