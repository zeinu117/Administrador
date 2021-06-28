<?php
    session_start();
    require_once '../../clases/Conexion.php';
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();

?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-sm" id="tablaCategoriasDataTable">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT id_categoria,
                                    nombre,
                                    fechaInsert
                            FROM t_categorias
                            WHERE id_usuario = '$idUsuario'";
                    $result = mysqli_query($conexion,$sql);

                    while($mostrar = mysqli_fetch_array($result)){
                        $idCategoria = $mostrar['id_categoria'];
                ?>
                    <tr style="text-align: center;">
                        <td><?php echo $mostrar['nombre']; ?></td>
                        <td><?php echo $mostrar['fechaInsert']; ?></td>
                        <td style="text-align: center;">
                            <span class="btn btn-warning btn-sm" 
                            onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"data-toggle="modal" data-target="#modalActualizarCategoria">
                                <span class="far fa-edit"></span>
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="btn btn-danger btn-sm" 
                            onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
                                <span class="far fa-trash-alt"></span>
                            </span>
                        </td>
                    </tr>
                    <?php  }?>
                </tbody> 
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>