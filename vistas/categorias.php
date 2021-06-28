<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        include_once "header.php";
    
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Gestor de Categorías</h1>
        <div class="row mt-4 mb-4">
            <div class="col-sm-4">
                <span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                    <span class="fas fa-plus-circle"></span>Agregar Nueva Categoría
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="tablaCategoria"></div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <form action="frmCategorias" id="frmCategorias" method="POST">
                    <label for="">Nombre de Categoría</label>
                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <form action="frmActualizaCategoria" id="frmActualizaCategoria">
                    <input type="text" id="idCategoria" name="idCategoria" hidden>
                    <label for="">Categoria</label>
                    <input type="text" id="categoriaU" name="categoriaU" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnActualizaCategoria">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<?php 

    include_once 'footer.php';
?>
<script src="../js/categorias.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaCategoria').load("categorias/tablaCategoria.php");

    $('#btnGuardarCategoria').click(function() {
        var categoria = $('#nombreCategoria').val();
        if (categoria == "") {
            swal("Debes agregar una categoria");
            return false;
        } else {
            $.ajax({
                type: "POST",
                data: "categoria=" + categoria,
                url: "../procesos/categorias/agregarCategoria.php",
                success: function(respuesta) {

                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaCategoria').load("categorias/tablaCategoria.php");
                        $('#nombreCategoria').val("");
                        swal(":D", "Agregado con exito", "success")
                    } else {
                        swal(":b", "Error al agregar", "error");
                    }
                }
            });

        }
    });
    $('#btnActualizaCategoria').click(function(){
        actualizaCategoria();
    });
});
</script>
<?php
    }else{
        header("location:../index.php");
    }
?>