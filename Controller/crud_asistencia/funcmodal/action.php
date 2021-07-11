
<?php

//$link = new PDO("mysql:host=localhost; dbname=evento", "root", "");
require_once "../../../Model/BD.php";
$id=$_POST["id"];
$idevento=$_POST["idevento"];
 
$limit = '6';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT idasistente,pre_inscripcion.nombre,tipoid,correo,celular,genero,institucion_educativa.nombre AS idinstitucion,idevento FROM pre_inscripcion INNER JOIN institucion_educativa ON  institucion_educativa.idinstitucion = pre_inscripcion.idinstitucion
";

if($_POST['query'] != '')
{
  $search = $link->real_escape_string($_POST['query']);
  $query .= '
  WHERE (pre_inscripcion.nombre LIKE '%$search%' || pre_inscripcion.idasistente LIKE '%$search%' || pre_inscripcion.correo LIKE '%$search%' || institucion_educativa.nombre LIKE '%$search%') AND pre_inscripcion.idevento='$idevento'
  ';
}

$query .= 'ORDER BY pre_inscripcion.nombre ASC';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $link->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $link->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Total Records - '.$total_data.'</label>
<table class="table table-striped table-bordered">
            <tr>
              <th>Numero de Documento</th>
              <th>Tipo de Documento</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Celular </th>
              <th>Institución</th>
              <th>Estado</th>
              <th>Acción</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
';
if($total_data > 0)
{
  foreach($result as $row)
  {

$idasistente=$row["idasistente"];

    $sql3 = "SELECT idevento FROM asistente_sesion WHERE idasistente = '$idasistente' AND idevento ='$idevento' AND idsesion='$id'";
    $status='';
    if ($stmt5 = mysqli_prepare($link, $sql3)) {

        if (mysqli_stmt_execute($stmt5)) {

          mysqli_stmt_store_result($stmt5);
          
          if(mysqli_stmt_num_rows($stmt5) == 1){
            $status='<span class="label label-success"> Registrado</span>';
            $user_status='Registrado';
          }
          else{
            $status='<span class="label label-danger"> No Registrado</span>'; 
            $user_status='No Registrado';
          }
      }
    }



    $output .= '
    <tr> 
        <td> '.$row['idasistente'].'</td>
        <td> '.$row['tipoid'].'</td>
        <td> '.$row['nombre'].'</td>
        <td> '.$row['correo'].'</td>
        <td> '.$row['celular'].'</td>
        
        <td> '.$row['idinstitucion'].'</td>
        <td>'.$status.'</td>
          <td><button type="button" name="action" class="button button-info btn-xs action " data-user_id="'.$row["idasistente"].'" data-user_status="'.$user_status.'">action</button></td>

        <td><a href="detallesinscritos.php?idevento='.$row['idevento'].'&idasistente='.$row['idasistente'].'&id='.$id.'"><span class="glyphicon glyphicon-search"></span></a></td>
        <td><a href="#" data-href="eliminar.php?idasistente= '.$row['idasistente'].'&idevento= '.$idevento.'" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
    ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">Ningun asistente para este evento</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)$total_links = ceil($totalResult/$limit);
        $previous_link = '';
        $next_link = '';
        $page_link = '';

        //echo $total_links;

        if($total_links > 4)
        {
          if($page < 4)
          {
            for($count = 1; $count <= 4; $count++)
            {
              $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
          }
          else
          {
            $end_limit = $total_links - 4;
            if ($end_limit==1) {
              //$page_array[] = '...';
              for($count = $end_limit; $count <= $total_links; $count++)
              {
                $page_array[] = $count;
              }
            }elseif($page > $end_limit)
            {
              $page_array[] = 1;
              $page_array[] = '...';
              for($count = $end_limit; $count <= $total_links; $count++)
              {
                $page_array[] = $count;
              }
            }
            else
            {
              $page_array[] = 1;
              $page_array[] = '...';
              for($count = $page - 1; $count <= $page + 1; $count++)
              {
                $page_array[] = $count;
              }
              $page_array[] = '...';
              $page_array[] = $total_links;
            }
          }
        }
        else
        {
          for($count = 1; $count <= $total_links; $count++)
          {
            $page_array[] = $count;
          }
        }


          for($count = 0; $count < count($page_array); $count++)
          {
            if($page == $page_array[$count])
            {
              $page_link .= '
              <li class="page-item active " >
                <a class="page-link" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
              </li>
              ';

              $previous_id = $page_array[$count] - 1;
              if($previous_id > 0)
              {
                $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Anterior</a></li>';
              }
              else
              {
                $previous_link = '
                <li class="page-item disabled">
                  <a class="page-link">Anterior</a>
                </li>
                ';
              }
              $next_id = $page_array[$count] + 1;
              if($next_id >= $total_links)
              {
                $next_link = '
                <li class="page-item disabled">
                  <a class="page-link">Siguiente</a>
                </li>
                  ';
              }
              else
              {
                $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Siguiente</a></li>';
              }
            }
            else
            {
              if($page_array[$count] == '...')
              {
                $page_link .= '
                <li class="page-item disabled">
                    <a>...</a>
                </li>
                ';
              }
              else
              {
                $page_link .= '
                <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
                ';
              }
            }
          }
        {
          if($page < 4)
          {
            for($count = 1; $count <= 4; $count++)
            {
              $page_array[] = $count;
            }
            $page_array[] = '...';
            $page_array[] = $total_links;
          }
          else
          {
            $end_limit = $total_links - 4;
            if ($end_limit==1) {
              //$page_array[] = '...';
              for($count = $end_limit; $count <= $total_links; $count++)
              {
                $page_array[] = $count;
              }
            }elseif($page > $end_limit)
            {
              $page_array[] = 1;
              $page_array[] = '...';
              for($count = $end_limit; $count <= $total_links; $count++)
              {
                $page_array[] = $count;
              }
            }
            else
            {
              $page_array[] = 1;
              $page_array[] = '...';
              for($count = $page - 1; $count <= $page + 1; $count++)
              {
                $page_array[] = $count;
              }
              $page_array[] = '...';
              $page_array[] = $total_links;
            }
          }
        }
        else
        {
          for($count = 1; $count <= $total_links; $count++)
          {
            $page_array[] = $count;
          }
        }


for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
              <li class="page-item active " >
                <a class="page-link" data-page_number="'.$page_array[$count].'">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
              </li>
              ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Anterior</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link">Anterior</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link">Siguiente</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Siguiente</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
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

?>