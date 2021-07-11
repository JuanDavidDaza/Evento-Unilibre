<!--INICIO del cont principal-->
<style type="text/css">
  .select2 {
    width: 100% !important;
  }
</style>
<div class="container">

  <div class="text-center card border-bottom-danger">
    <h1 class="display-4 font-weight-bold"><strong>BIENVENIDO</strong></h1><br>
    <h2>Sistema de Gestión de Eventos</h2>
    <h3><span class="badge badge-primary"> <?php echo $usuario; ?></span> <span class="badge badge-danger"> <?php echo $nombre_rol; ?></span></h3><br>

  </div><br>
  <!-- Modal -->

  <?php if ($_SESSION['rol_id'] == 1 || $_SESSION['rol_id'] == 4) {  ?>
    <div class="row">
      <div class="container">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mostrar Eventos por ciudad</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <h5>Actualmente está en la Ciudad de <strong><?php echo $nombreciudad1; ?></strong>, únicamente se encontrará información referente a la ciudad, si desea puede cambiarla</h5>
                </div>
                <form id="ciudad" method="post">
                  <div class="row">
                    <div class="col-xl-9"><label for="idciudad"></label id="idciudad"><?php echo $cboidciudad; ?></div>
                    <div class="col-xl-3"><input class="btn btn-info " type="submit" value="Seleccionar Ciudad"></div>
                  </div>
                </form><br>
              </div>
              <div class="col-auto">
                <i class="fas fa-mouse-pointer fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>



</div>