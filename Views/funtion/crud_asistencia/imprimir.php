<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Reporte</title>
    <link rel="shortcut icon" href="../../../Content/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../Views/public/bootstrap/css/bootstrap.min.css">

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="../../../Views/public/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <style type="text/css">
        thead input {
            width: 100%;
        }
    </style>

</head>

<body>
    <div style="height:50px"></div>

    <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="jumbotron">
            <div class="container text-center">
                <img src="../../../Content/logopequeño.png" width="150" class="logo">
                <h2><strong>Eventos Activos</strong></h2>
                <a href="index.php" class="btn btn-info">INICIO</a>
            </div>
        </div>
        <div class="row table-responsive">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo de Evento</th>
                        <th>¿Realiza Certificado?</th>
                        <th>Descripción</th>
                        <th>Tema </th>
                        <th>Responsable </th>
                        <th>Estado </th>
                        <th>Ciudad </th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['idevento']; ?></td>
                            <td><?php echo $row['nombreevento']; ?></td>
                            <td><?php echo $row['nombretipo']; ?></td>
                            <td><?php echo $row['certificado']; ?></td>
                            <td><?php echo $row['generalinfo']; ?></td>
                            <td><?php echo $row['tematica']; ?></td>
                            <td><?php echo $row['responsable']; ?></td>
                            <td><?php echo $row['estado']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../../Views/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../../Views/public/popper/popper.min.js"></script>
    <script src="../../../Views/public/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../../../Views/public/datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="../../../Views/public/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../../../Views/public/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../../../Views/public/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../../../Views/public/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../../../Views/public/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="../../../Views/public/js/imprimir.js"></script>
    <?php include('../../../Views/public/bootstrap/sesion.php'); ?>
    <script src="../../../Views/public/js/sesion2.js"></script>

</body>

</html>