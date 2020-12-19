class Boleto{

    mostrarSala(idSala){
        $("#colMostrarSala").empty();
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "cargarFuncionesPelicula");
        inf.append("idPelicula", idPelicula);
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case 'No hay funciones, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(f);
                        let funcion = JSON.parse(response);
                        for (let i = 0; i < funcion.length; i++) {
                            $("#colMostrarSala").append('<tr><td>'+funcion[i].inicio+'</td><td>'+funcion[i].final+'</td><td>'+funcion[i].fecha+'</td><td>'+funcion[i].nombre+'</td><td>'+
                            '<button class="btnMostrarSala btn btn-success" id="'+funcion[i].id+'">Mostrar Sala</button></td></tr>');
                        }
                        break;
                }

            }, async: false

        });

    }

}