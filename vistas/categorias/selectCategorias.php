<?php
    session_start();
    require_once '../../clases/Conexion.php';
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['idUsuario'];
    
    $sql = "SELECT id_categoria,
                    nombre
            FROM t_categorias
            WHERE id_usuario = '$idUsuario'";
    
    $result = mysqli_query($conexion,$sql);



?>

<select name="categoriasArchivo" id="categoriasArchivo" class="form-control">
    <?php 
        while($mostrar = mysqli_fetch_array($result)){
            $idCategoria = $mostrar['id_categoria'];
    ?>
    <option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>
    <?php 
        }
    ?>
</select>