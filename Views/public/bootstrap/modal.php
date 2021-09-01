<?php
require_once "../../../Model/BD.php";
//$order_id2 = uniqid();// numero unico para cada sesion creada
//require_once "../../../bd/session_admin.php";

//echo $idciudad. "Ciudad";


function box2($connect)
{
    $idciudad = $_SESSION['idciudad'];
    $output = '';
    $query = "SELECT * FROM programas  WHERE idciudad ='$idciudad' ORDER BY nombreprograma ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["idprograma"] . '">' . $row["nombreprograma"] . '</option>';
    }
    return $output;
}
function box3($connect)
{
    $idciudad = $_SESSION['idciudad'];
    $output = '';
    $query = "SELECT * FROM entidad  WHERE entidad.idciudad = '$idciudad' ORDER BY nombreentidad ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["identidad"] . '">' . $row["nombreentidad"] . '</option>';
    }
    return $output;
}

function box4($connect)
{
    $output = '';
    $query = "SELECT * FROM conferencistas ORDER BY nombre ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["cedula"] . '">' . $row["nombre"] . '</option>';
    }
    return $output;
}

function box5($connect)
{
    $idciudad = $_SESSION['idciudad'];
    $output = '';
    $query = "SELECT * FROM usuarios WHERE usuarios.idciudad = '$idciudad' and rol_id=2 ORDER BY usuario ASC";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        $output .= '<option value="' . $row["id"] . '">' . $row["usuario"] . '</option>';
    }
    return $output;
}

?>

<!--Modal Agregar Nueva sesion-->

<div class="modal fade" id="add3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm3">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Numero Sesión:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" maxlength="3" minlength="1" required name="posicion">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="100" minlength="5" required name="nombresesion">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Lugar:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" maxlength="70" minlength="5" required name="audsalon">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Hora de Inicio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" required name="horainicio">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Hora de Fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" required name="horafin">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Fecha de Inicio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" min="2020-08-01" max="2030-12-31" class="form-control" required name="fechainicio">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" min="2020-08-01" max="2030-12-31" style="position:relative; top:7px;">Fecha de Fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" required name="fechafin">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Observacion:</label>
                            </div>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" rows="10" cols="20" required maxlength="300" minlength="5" name="observacion">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary"><span class="fas fa-floppy-disk"></span> Guardar</a>
                    </form>
            </div>

        </div>
    </div>
</div>

<!-- Editar -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Editar</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="editForm">
                        <input type="hidden" class="id" name="id">
                        <input type="hidden" class="posicion" name="posicion2">
                        <input type="hidden" class="idevento" name="idevento">
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Numero Sesión:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" class="form-control posicion" maxlength="3" minlength="1" required name="posicion">
                            </div>
                        </div>
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control nombresesion" maxlength="100" minlength="5" required name="nombresesion">
                            </div>
                        </div>
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Lugar:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control audsalon" maxlength="70" minlength="5" required name="audsalon">
                            </div>
                        </div>
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Hora de Inicio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="time" class="form-control horainicio" required name="horainicio">
                            </div>
                        </div>

                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Hora de Fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="time" class="form-control horafin" required name="horafin">
                            </div>
                        </div>
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Fecha de Inicio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" min="2020-08-01" max="2030-12-31" class="form-control fechainicio" required name="fechainicio">
                            </div>
                        </div>

                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" min="2020-08-01" max="2030-12-31" style="position:relative; top:7px;">Fecha de Fin:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="date" class="form-control fechafin" required name="fechafin">
                            </div>
                        </div>
                        <div class="row1 form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Observacion:</label>
                            </div>
                            <div class="col-sm-10">

                                <input type="text" class="form-control observacion" rows="10" cols="20" required maxlength="300" minlength="5" name="observacion">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</a>
                    </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="delete3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro en eliminar esta sesión de este Evento?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
            </div>

        </div>
    </div>
</div>

<!--Modal Agregar Nuevo  Entidad_________________________________________________________________________________________________________-->
<div class="modal fade" id="add" tabindex="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Entidad:</label>
                            </div>
                            <div class="col-sm-10"><select name="entidad" id="entidad" class="form-control item_unit" style="width:100%"><?php echo box3($connect); ?></select></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success refresh" onclick="location.reload()"><span class="fas fa-refresh"></span> Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary"><span class="fas fa-floppy-disk"></span> Guardar</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro en eliminar los datos?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal detalles -->
<div class="modal fade" id="detalles1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Registro de Asistencia</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro de registrar en esta sesión?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-success id"> Si</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cargando" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" style="text-align: center;">
                <h3>Se está registrando y notificando al usuario sobre el evento</h3>
                <img src="../../../Content/loader.gif" width="30" class="text-center">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="detalles_eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Asistencia</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Estas seguro de eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="addusuario" tabindex="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Colaborador al Evento</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addFormuser">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Colaborador:</label>
                            </div>
                            <div class="col-sm-10"><select name="usuario" id="usuario" class="form-control item_unit" style="width:100%"><?php echo box5($connect); ?></select></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success refresh" onclick="location.reload()"><span class="fas fa-refresh"></span> Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary"><span class="fas fa-floppy-disk"></span> Guardar</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!--Modal Agregar Nuevo  Programa----------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="add2" tabindex="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm2">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Programa:</label>
                            </div>
                            <div class="col-sm-10"><select name="programa" id="programa" class="form-control" style="width:100%"><?php echo box2($connect); ?></select></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success refresh" onclick="location.reload()"><span class="fas fa-refresh"></span> Actualizar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-remove"></span> Cancelar</button>
                <button type="submit" class="btn btn-primary"><span class="fas fa-floppy-disk"></span> Guardar</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal Eliminar -->
<div class="modal fade" id="delete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro en eliminar los datos?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="delete1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Esta seguro en eliminar este Conferencista?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="button" class="btn btn-danger id"><span class="fa fa-trash"></span> Si</button>
            </div>

        </div>
    </div>
</div>


<!--Modal Agregar Nuevo Conferencista-->


<div class="modal fade" id="add1" tabindex="overflow:hidden;" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Nuevo</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="addForm1">
                        <input type="hidden" id="idevento" name="idevento" value="<?php echo $row['idevento']; ?>" />

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Conferencistas:</label>
                            </div>
                            <div class="col-sm-10"><select name="nombre" id="nombre" class="form-control" style="width:100%"><?php echo box4($connect); ?></select></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Conferencia:</label>
                            </div>
                            <div class="col-sm-10"><input type="text" class="form-control" maxlength="120" minlength="5" required name="conferencia"></div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Duración:</label>
                            </div>
                            <div class="col-sm-10"><input type="text" class="form-control" maxlength="25" minlength="5" required name="duracion"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success refresh" onclick="location.reload()"><span class="fas fa-refresh"></span> Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-remove"></span> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><span class="fas fa-floppy-disk"></span> Guardar</a>
                        </form>
                </div>

            </div>
        </div>
    </div>