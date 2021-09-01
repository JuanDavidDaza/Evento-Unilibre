<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="container">

	<div class="text-center card border-bottom-danger">
		<div class="text-center">
			<img src="../../../Content/logopequeño.png" width="150" class="logo">
			<hr>
			<h2 class="display-4 font-weight-bold"><strong>Gestión de Estado del Evento</strong></h2>
			<li class="btn page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li> <hr>
			
		</div>
	</div>
	<br><br><br>


	<form id="dato" name="dato">
		<input type="number" name="idciudad" hidden id="idciudad" value="<?php echo $idciudad; ?>">

	</form>
	<hr>
	<div class="jumbotron card">
		<p>Se podrá gestionar individualmente cada evento mostrando que sesiones tiene activas hasta la fecha actual y poder cambiar el estado del evento ó el sistema tomará los eventos que tenga todas las sesiones en estado <strong>Finalizado</strong> y cambiará el estado del evento a <strong>Cerrado.</strong></p><br>

	</div>
	<hr>
	<div class="jumbotron card">
		<ul>
			<p>Cambiar el estado de los Eventos por <strong>Cerrado</strong>,donde las sesiones esten en estado <strong>Finalizado</strong></p><button type="button" name="registro" class="button btn-danger btn-lg registro " data-user_id="<?php echo $idciudad; ?>">Clic Aqui para Registrar</button>
		</ul>
	</div>
	<hr>
	<span id="message"></span>
	<div class="jumbotron">
		<div class="card-body">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></span>
				<input type="text" name="search_box" id="search_box" class="form-control" placeholder="Buscar" />

			</div><br>


			<div class="table table-responsive" id="dynamic_content">

			</div>
		</div>



		<div class=" mt-3">
			<div class="col">
				<nav>
					<ul class="pagination">
						<li class="page-item "><a href="../index.php" class="page-link">&larr; Regresar</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../../../Views/public/js/estado_evento.js"></script>