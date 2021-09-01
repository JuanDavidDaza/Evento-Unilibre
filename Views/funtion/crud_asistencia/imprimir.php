<div style="height:50px"></div>

<!--Ejemplo tabla con DataTables-->
<div class="container">
    <div class="text-center card border-bottom-danger">
        <div class=" text-center">
            <img src="../../../Content/logopequeño.png" width="150" class="logo">
            <h2 class="display-4 font-weight-bold"><strong>Eventos Activos</strong></h2>
            <a href="index.php" class="btn btn-dark">INICIO</a>
        </div>
        <br>
        <br>
    </div>
    <div class="table table-responsive">
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