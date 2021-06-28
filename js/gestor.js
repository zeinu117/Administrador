function agregarArchivosGestor(){
    var formData = new FormData(document.getElementById('frmArchivos'));
        $.ajax({
            url:"../procesos/gestor/guardarArchivos.php",
            type:"POST",
            dataType: "html",
            data: formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(respuesta){
                console.log(respuesta);
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    $('#frmArchivos')[0].reset();
                    $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                    swal(":D","Agregado con exito","success");
                }else{
                    swal(":b","Fallo al agregar","error");
                }
            }
        });
}
function eliminarArchivo(idArchivo){
    swal({
        title: "Estas seguro de eliminar esta archivo?",
        text: "una vez eliminada no podra recuperarse",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data:"idArchivo=" + idArchivo,
                url:"../procesos/gestor/eliminaArchivo.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();
                    if(respuesta == 1){
                        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
                        swal("Eliminado con Exito", {
                            icon: "success",
                        });
                    }else{
                        swal(":b","Fallo al eliminar","Error");
                    }
                }
            });
        }
    });
}

function obtenerArchivoPorId(idArchivo){
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url:"../procesos/gestor/obtenerArchivo.php",
        success:function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    });
}