<?php

    session_start();
    require_once '../../clases/Gestor.php';
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['idUsuario'];

    echo $Gestor->obtenerRutaArchivo($idArchivo);
    

?>