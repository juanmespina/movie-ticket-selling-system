class Funcion {

    cargarPeliculas() {

        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarPeliculas");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                //alert(response);
                switch (response) {
                    case 'No hay peliculas, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let pelicula = JSON.parse(response);
                        for (let i = 0; i < pelicula.length; i++) {
                            $("#cbPelicula").append("<option id='" + pelicula[i].id + "'>" + pelicula[i].titulo + " |Codigo: " + pelicula[i].codigo + "</option>");

                        }

                        break;
                }

            }, async: false

        });
    }
    cargarSalas() {

        let inf = new FormData();
        inf.append("controlador", "Sala");
        inf.append("accion", "cargarSalas");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                //alert(response);
                switch (response) {
                    case 'No hay peliculas, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let sala = JSON.parse(response);
                        for (let i = 0; i < sala.length; i++) {
                            $("#cbSala").append("<option id='" + sala[i].id + "'>Sala #" + sala[i].nombre + " |Capacidad: " + sala[i].filas * sala[i].columnas + " puestos </option>");

                        }

                        break;
                }

            }, async: false

        });
    }
    crearFuncion() {
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "crearFuncion");
        inf.append("fFuncion", $("#fFuncion").val());
        inf.append("hInicial", $("#horaInicial").val());
        inf.append("hFinal", $("#horaFinal").val());
        inf.append("idSala", $("#cbSala option:selected").attr("id"));
        inf.append("idPelicula", $("#cbPelicula option:selected").attr("id"));

        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {

                alert(response);
            }, async: false

        });

    }

    cargarFunciones() {
        $("#tBodyMostrarFunciones").empty();
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "cargarFunciones");
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
                        //alert(response);
                        let funcion = JSON.parse(response);
                        for (let i = 0; i < funcion.length; i++) {
                            $("#tBodyMostrarFunciones").append("<tr><td>" + funcion[i].sala + "</td><td>" + funcion[i].titulo + "</td><td>" + funcion[i].inicio + "</td>" +
                                "<td>" + funcion[i].final + "</td><td>" + funcion[i].fecha + "</td><td> <button class='btn btn-success btnDesactivarFuncion' id='" + funcion[i].idSala + "'>Desactivar</button></td> </tr>");

                        }

                        break;
                }

            }, async: false

        });
    }

    desactivarFuncion(idFuncion) {
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "desactivarFuncion");
        inf.append("idFuncion", idFuncion);
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {

                if (response == true) {
                    alert("Desactivado con exito");
                } else {

                    alert(response);
                }

            }, async: false

        });

    }


    cargarFuncionesPelicula(idPelicula) {
        $("#tBodyCargarFuncionesPelicula").empty();
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
                            $("#tBodyCargarFuncionesPelicula").append('<tr id="fPel' + funcion[i].idFuncion + '"><td>' + funcion[i].inicio + '</td><td>' + funcion[i].final + '</td><td>' + funcion[i].fecha + '</td><td>' + funcion[i].nombre + '</td><td>' +
                                '<button class="btnMostrarSala btn btn-success" id="s' + funcion[i].IdSala + '">Mostrar Sala</button></td></tr>');
                        }
                        break;
                }

            }, async: false

        });
    }


    //Hay que moverlo porque no pertenece a esta clase

    mostrarButacasOcupadas(idFuncion) {
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "mostrarButacasOcupadas");
        inf.append("idFuncion", idFuncion);
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case false:
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let butacas = JSON.parse(response);
                        //alert( butacas.length);
                        for (let i = 0; i < butacas.length; i++) {
                            $("#bt" + butacas[i].idButaca + ">img").attr("src", "../../../assets/img/butacaOcupada.png");
                            //console.log(butacas[i].idButaca);
                        }
                        $("#modalSala").modal("show");
                        break;
                }

            }, async: false

        });

    }
    previsualizarFactura(arrButacasSelec) {
        let total = false;
        $("#tBodyPrevFactura").empty();
        let inf = new FormData();
        inf.append("controlador", "Funcion");
        inf.append("accion", "previsualizarFactura");
        inf.append("arrButacasSelec", JSON.stringify(arrButacasSelec));
        //console.log(arrButacasSelec);
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case false:
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let preFactura = JSON.parse(response);
                        let html = "<tr><td>Cedula</td><td>" + preFactura.cedula + "</td></tr><tr><td>A nombre de:</td><td>"
                            + preFactura.nombre + "</td></tr><tr><td>Sala</td><td>" + preFactura.sala + "</td></tr><tr><td>Pelicula</td><td>" + preFactura.peliculaTitulo + "</td></tr><tr><td>Hora</td><td>" + preFactura.inicio + "-" + preFactura.final
                            + "</td></tr><tr><td>Fecha</td><td>" + preFactura.fechaFuncion + "</td></tr><tr><td>Cant.Boleto</td><td>" + (preFactura.nombreButacasSel).length +
                            "</td></tr><tr><td>Precio</td><td>" + preFactura.precio + "</td></tr><tr><td>Total = </td><td>" + preFactura.total + "</td></tr><tr><td>Butacas seleccionadas </td><td>";
                        for (let i = 0; i < (preFactura.nombreButacasSel).length; i++) {
                            html += " #" + (preFactura.nombreButacasSel[i]) + " ";
                        }
                        html += "</td></tr>";
                        $("#tBodyPrevFactura").append(html)
                        $("#modalPrevFactura").modal("show");
                        total = preFactura.total
                        break;
                }

            }, async: false

        });
        return total;
    }



    limpiarInput() {
        $("input[type=text]").val(" ");
        $("input[type=date]").val(" ");
        $("input[type=number]").val(" ");
        $("input[type=time]").val(" ");
        $("select").val("");
        
        
    }

}