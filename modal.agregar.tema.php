<?php

include_once('../../controllers/capacitacion.controller.php');
if (isset($_POST['btnAgregarTema'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $numero = $_POST['numero'];
    $idCapacitacion = $_GET['id'];
    $capacitacion = new Capacitacion_controller();
    $capacitacion->agregar_tema($nombre,$descripcion,$numero,$idCapacitacion);
}
?>
<div class="modal fade" id="agregarTemaModal" tabindex="-1" aria-labelledby="agregarTemaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarTemaLabel">Agregar Tema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group input-group-outline my-3 ">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline my-3 ">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline my-3 ">
                        <label class="form-label">Numero</label>
                        <input type="number" name="numero" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btnAgregarTema" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>