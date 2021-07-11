<?php

$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
$connect->exec("set names utf8");
require_once "../../Model/BD.php";

$idciudad = $_POST["idciudad"];
//echo $idciudad;

$limit = '5';
$page = 1;
$page1 = (isset($_POST['page'])) ? $_POST['page'] : "";
if ($page1 > 1) {
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
} else {

  $start = 0;
}

$query = "
SELECT evento.idevento,evento.nombreevento,evento.certificado,evento.tematica,evento.responsable,evento.estado,ciudad.nombre,evento_tipo.nombretipo  FROM evento INNER JOIN evento_tipo ON evento_tipo.idtipoeve=evento.idtipoeve INNER JOIN ciudad ON evento.idciudad=ciudad.idciudad
";

if ($_POST['query'] != '') {
  $query .= '
  WHERE (evento.idevento LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" || evento.nombreevento LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" || evento.responsable LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" || evento_tipo.nombretipo LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" || evento.estado LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%") AND evento.idciudad="' . $idciudad . '"
  ';
}
if ($_POST['query'] == '') {
  $query .= '
  WHERE evento.idciudad = "' . $idciudad . '"
  ';
}
//echo $query;
$query .= 'ORDER BY evento.nombreevento ASC ';

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Total Registros - ' . $total_data . '</label>
<table class="table table-striped table-bordered text-center">
   <thead>
   <tr style="background-color: gray;
  color: white;">

          <td class="text-center">Nombre del Evento</td>
          <td>N°</td>
          <td>Sesión</td>
          <td>Fecha Fin</td>
          <td>Estado de la Sesión</td>
        </tr>
  </thead>
  <tbody>
';
if ($total_data > 0) {

  $fecha_actual = strtotime(date("Y-m-d"));

  foreach ($result as $row) {

    $estado = $row['estado'];
    if ($estado == "Activo") {
      $tipo = "success";
    } else {
      $tipo = "danger";
    }


    $idevento = $row['idevento'];
    $eve_1 = "SELECT evento_sesion.idevento, COUNT(*) AS evento   FROM evento_sesion INNER JOIN evento ON evento_sesion.idevento=evento.idevento WHERE evento.idevento='$idevento'
";
    $resultado_eve = $link->query($eve_1);
    $row112 = $resultado_eve->fetch_array(MYSQLI_ASSOC);

    $sesiones = $row112['evento'];
    if ($sesiones != 1) {
      $sesiones1 = $sesiones + 1;
      $output .= '
     <tr>
                <td  rowspan="' . $sesiones1 . '">
                    <p><strong>' . $row['nombreevento'] . '</strong> || ' . $row['nombretipo'] . '</strong></p>
                      <p>Estado: <span class="label label-' . $tipo . '">' . $row['estado'] . '</span> || 

                      <button type="button" name="action" class="button  btn-xs action " data-user_id="' . $row["idevento"] . '" data-user_status="' . $estado . '">Cambio de estado</button></p>
                    </td>
    ';
    } else {
      $output .= '
     <tr>
                <td  rowspan="">
                    <p><strong>' . $row['nombreevento'] . '</strong> || ' . $row['nombretipo'] . '</strong></p>
                      <p>Estado: <span class="label label-' . $tipo . '">' . $row['estado'] . '</span> || 

                      <button type="button" name="action" class="button  btn-xs action " data-user_id="' . $row["idevento"] . '" data-user_status="' . $estado . '">Cambio de estado</button></p>
                    </td>
    ';
    }



    $eve_2 = "SELECT * FROM evento_sesion WHERE idevento='$idevento'
";
    $resultado_eve2 = $link->query($eve_2);

    foreach ($resultado_eve2 as $row113) {
      $fecha_entrada = strtotime("" . $row113['fechafin'] . "");
      if ($fecha_actual > $fecha_entrada) {
        $estado_fecha = '<span class="label label-warning"> Finalizado</span>';
      } else {
        $estado_fecha = '<span class="label label-success"> Activo</span>';
      }

      if ($sesiones != 1) {
        $output .= '
  
              <tr>
                <td>' . $row113['posicion'] . '</td>
                <td>' . $row113['nombresesion'] . '</td>
                <td>' . $row113['fechafin'] . '</td>
                <td>' . $estado_fecha . '</td>
              </tr>
              
           </tr>
    ';
      } else {
        $output .= '
  
              <td>' . $row113['posicion'] . '</td>
              <td>' . $row113['nombresesion'] . '</td>
              <td>' . $row113['fechafin'] . '</td>
              <td>' . $estado_fecha . '</td>
              
           </tr>
    ';
      }
    }
  }

  $output .= '
<tbody></table>
<br />
<div align="center">
  <ul class="pagination">
';

  $total_links = ceil($total_data / $limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';

  //echo $total_links;

  if ($total_links > 4) {
    if ($page < 5) {
      for ($count = 1; $count <= 5; $count++) {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    } else {
      $end_limit = $total_links - 5;
      if ($page > $end_limit) {
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
    <li class="page-item active">
      <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

      $previous_id = $page_array[$count] - 1;
      if ($previous_id > 0) {
        $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">Anterior</a></li>';
      } else {
        $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Anterior</a>
      </li>
      ';
      }
      $next_id = $page_array[$count] + 1;
      if ($next_id >= $total_links) {
        $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Siguiente</a>
      </li>
        ';
      } else {
        $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">Siguiente</a></li>';
      }
    } else {
      if ($page_array[$count] == '...') {
        $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
      } else {
        $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
      }
    }
  }

  $output .= $previous_link . $page_link . $next_link;
  $output .= '
  </ul>

</div>
';

  echo $output;
} else {
  $output .= '
  <tr>
    <td colspan="10" align="center">No se encontraron resultados</td>
  </tr>
  ';
  echo $output;
}
