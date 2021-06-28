<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Registro de Usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="frmRegistro" id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
                    <label>Nombre personal</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                    <label>Fecha de Nacimiento</label>
                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required readonly>
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <label>Nombre de Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <button class="btn btn-primary ">Registrar</button>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="index.php" class="btn btn-success">Login</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <script src="librerias/jquery-3.6.0.min.js"></script>
    <script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="librerias/sweetalert.min.js" ></script>

    <script type="text/javascript">

    $(function(){
        var fechaA = new Date();
        var yyyy = fechaA.getFullYear();

        $("#fechaNacimiento").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:' + yyyy,
            dateFormat: "yy-mm-dd"
        });
    });


        function agregarUsuarioNuevo(){
            $.ajax({
                method: "post",
                url: "procesos/usuario/registro/agregarUsuario.php",
                data: $('#frmRegistro').serialize(),            
                success: function(respuesta){
                    respuesta = respuesta.trim();
                    if(respuesta == 1){
                        $('#frmRegistro')[0].reset();
                        swal(":D","Agregado con exito","success");
                    }else if(respuesta == 2){
                        swal("Este usuario ya existe, no se puede agregar");
                    }else{
                        swal(":(","No se pudo agregar","Error");
                    }
                }
            });

            return false;
        }
    </script>
</body>
</html>