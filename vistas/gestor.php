<?php 
session_start();
if(isset($_SESSION['usuario'])){
include_once 'header.php';

?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Gestor de Archivos</h1>
        <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
            <span class="fas fa-plus-circle"></span>
            Agregar Archivo
        </span>
        <hr>
        <div id="tablaGestorArchivos"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="frmArchivos" id="frmArchivos" enctype="multipart/form-data" method="POST">
                    <label for="">Categoria</label>
                    <div id="categoriasLoad"></div>
                    <label for="">Selecciona Archivos</label>
                    <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php' ?>
<script src="../js/gestor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
    $('#categoriasLoad').load("categorias/selectCategorias.php");
    $('#btnGuardarArchivos').click(function() {
        agregarArchivosGestor();
    });
});
</script>
<?php
}else{
    header("location:../index.php");
}

?>