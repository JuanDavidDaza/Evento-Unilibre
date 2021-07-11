<?php



$output = array('error' => false);


try {
	$output['message'] = '<div class="modal" id="cargando" tabindex="-1"  aria-hidden="false">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body" style="text-align: center;">
                    <h3>Se está validando la información</h3>
                    <img src="Content/loader.gif" width="30" class="text-center" >
                  </div>
                </div>
              </div>
            </div>';
} catch (PDOException $e) {
	$output['error'] = true;
	$output['message'] = $e->getMessage();;
}

//cerrar conexión

echo json_encode($output);
