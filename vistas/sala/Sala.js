class Sala {

    // crearFilas() {
    //     $("#filas").empty();
    //     $("#btnCrearSala").empty();
    //     let filas = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    //     if ($("#txtNroSala").val() != "" && Number.isInteger(parseInt($("#txtNroSala").val())) && $("#txtFilas").val() != "") {
    //         let nroFilas = $("#txtFilas").val();
    //         let nroSala = $("#txtNroSala").val();
    //         if (nroFilas > 0 && nroFilas < 11) {
    //             for (let i = 0; i < nroFilas; i++) {
    //                 $("#filas").append("<div class='col-6'><label for='" + i + "'> Fila " + filas[i] + "</label><input type='number'  name='" + i + "' class='form-control txtFila' placeholder='Cantidad de asientos'" +
    //                     "minlength='1' maxlength='2' pattern='[0-9]{1,2}' required></div>");
    //             }
    //             $("#cardCrearSalaFooter").append("<input class='btn btn-success'type='submit' form='#formCrearSala' id='btnCrearSala'>");
    //         }

    //     }

    // }
    crearSala() {
        let inf = new FormData();
        inf.append("accion", "crearSala");
        inf.append("controlador", "Sala")
        inf.append("nroSala", $("#txtNroSala").val());
        inf.append("nroColumnas", $("#txtColumnas").val());
        inf.append("nroFilas", $("#txtFilas").val());
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                alert(response);
            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });

    }
    cargarSalas() {
        $("#tBodyMostrarSalas").empty();
        let inf = new FormData();
        inf.append("accion", "cargarSalas");
        inf.append("controlador", "Sala")
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {

                if (response != 'No hay salas guardadas' || response != 'Error al enviar parametros' || response == false) {
                    let salas = JSON.parse(response);
                    for (let i = 0; i < salas.length; i++) {
                        $("#tBodyMostrarSalas").append('<tr><td>' + salas[i].id + '</td><td>' + salas[i].nombre + '</td><td>' + salas[i].filas + '</td><td>' +
                            salas[i].columnas + '</td><td><button id="' + salas[i].id + '" class="btn btn-warning btnDesactivarSala">Desactivar Sala</button></td></tr>');

                    }
                } else {
                    alert(response);
                }
            },
            ajaxError: function (response) {
                console.log(" Error" + response);
            }, async: false


        });

    }
    desactivarSala(idSala) {
        let inf = new FormData();
        inf.append("controlador", "Sala");
        inf.append("accion", "desactivarSala");
        inf.append("idSala", idSala);
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

    mostrarSala(idSala) {
        $("#tBodyMostrarSala").empty();
        let inf = new FormData();
        inf.append("controlador", "Sala");
        inf.append("accion", "mostrarSala");
        inf.append("idSala", idSala);
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
                    case 'No hay salas guardadas':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let sala = JSON.parse(response);
                        let salaDist = " ";
                        let cont = 0;
                        for (let i = 0; i < sala[0].filas; i++) {
                            salaDist += "<tr>";
                            for (let j = 0; j < sala[0].columnas; j++) {
                                //console.log(cont);
                                salaDist += "<td class='text-center tdButaca' id=bt" + sala[cont].idButaca + "><img style='width:32px' src='../../../assets/img/butacaLibrepng.png'><small>" + sala[cont].butaNombre + "</small></td>";
                                cont++;

                            }
                            salaDist += "</tr>";
                        }
                        //console.log(salaDist);
                        $("#tBodyMostrarSala").append(salaDist);
                        break;
                }

            }, async: false

        });

    }
    



    limpiarInput() {
        $("input[type=number]").val(" ");
        $("input[type=text]").val(" ");

    }
}
