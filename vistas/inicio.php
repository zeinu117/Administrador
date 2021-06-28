<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        include_once "header.php";
    
?>
<div class="container">
    <div class="row">
        <div class="col-ms-12">
            
        </div>
    </div>
</div>


<?php 

    include_once 'footer.php';
    }else{
        header("location:../index.php");
    }
?>