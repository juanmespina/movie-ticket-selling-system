class Pelicula {

    cargarRating() {

        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarRating");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case 'No hay ratings, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let rating = JSON.parse(response);
                        for (let i = 0; i < rating.length; i++) {
                            $("#cbRating").append("<option id=" + rating[i].id + " >" + rating[i].rating + " </option>");
                            $("#cbActRating").append("<option id=" + rating[i].id + " >" + rating[i].rating + " </option>");
                        }

                        break;
                }

            }, async: false

        });

    }
    cargarFormato() {

        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarFormato");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case 'No hay formatos, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let formato = JSON.parse(response);
                        for (let i = 0; i < formato.length; i++) {
                            $("#cbFormato").append("<option id=" + formato[i].id + " >" + formato[i].formato + " </option>");
                            $("#cbActFormato").append("<option id=" + formato[i].id + " >" + formato[i].formato + " </option>");
                        }

                        break;
                }

            }, async: false

        });

    }
    cargarIdioma() {

        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarIdioma");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case 'No hay idiomas, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let idioma = JSON.parse(response);
                        for (let i = 0; i < idioma.length; i++) {
                            $("#cbIdioma").append("<option id=" + idioma[i].id + " >" + idioma[i].idioma + " </option>");
                            $("#cbActIdioma").append("<option id=" + idioma[i].id + " >" + idioma[i].idioma + " </option>");
                        }

                        break;
                }

            }, async: false

        });

    }


    cargarGenero() {

        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarGenero");
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                switch (response) {
                    case 'No hay generos, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let genero = JSON.parse(response);
                        for (let i = 0; i < genero.length; i++) {
                            $("#cbGenero").append("<option id=" + genero[i].id + " >" + genero[i].genero + " </option>");
                            $("#cbActGenero").append("<option id=" + genero[i].id + " >" + genero[i].genero + " </option>");
                        }

                        break;
                }

            }, async: false

        });

    }

    crearPelicula() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "crearPelicula");
        inf.append("titulo", $("#txtTitulo").val().trim());
        inf.append("idGenero", $("#cbGenero option:selected").attr("id"));
        inf.append("idRating", $("#cbRating option:selected").attr("id"));
        inf.append("idFormato", $("#cbFormato option:selected").attr("id"));
        inf.append("idIdioma", $("#cbIdioma option:selected").attr("id"));
        inf.append("director", $("#txtDirector").val().trim());
        inf.append("productor", $("#txtProductor").val().trim());
        inf.append("distribuidora", $("#txtDistribuidora").val().trim());
        inf.append("codigo", $("#txtCodigo").val().trim());
        inf.append("imagen", $("#fImagen")[0].files[0]);
        inf.append("sinopsis", $("#txtSinopsis").val().trim());
        inf.append("ano", $("#txtAno").val().trim());
        txtAno
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

    cargarPeliculas() {
        $("#tBodyMostrarPeliculas").empty();
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
                        //alert(response);
                        let pelicula = JSON.parse(response);
                        for (let i = 0; i < pelicula.length; i++) {
                            //console.log("Cargando pelis");
                            $("#tBodyMostrarPeliculas").append("<tr class='text-center tRPelicula ' id='" + pelicula[i].id + "'><td>" + pelicula[i].codigo + "</td><td>" + pelicula[i].titulo + "</td><td>" + pelicula[i].genero + "</td>" +
                                "<td>" + pelicula[i].rating + "</td><td>" + pelicula[i].director + "</td><td>" + pelicula[i].productor + "</td><td>" + pelicula[i].idioma + "</td><td>" + pelicula[i].formato + "</td><td><img class='img-thumbnail' src='../../../" + pelicula[i].img + "'></img></td>"
                                + "</tr>");

                        }

                        break;
                }

            }

        });
    }

    desactivarPelicula() {
        let inf = new FormData();
        inf.append("controlador", "pelicula");
        inf.append("accion", "desactivarPelicula");
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
    verPelicula(idPelicula) {
        let mostrar = false;
        let inf = new FormData();
        inf.append("accion", "verPelicula");
        inf.append("controlador", "Pelicula");
        inf.append("idPelicula", idPelicula);
        $.ajax({
            type: "POST",
            url: "../../../controladores/Frontal.php",
            contentType: false,
            data: inf,
            processData: false,
            cache: false,
            success: function (response) {
                //alert(response);
                if (response == false) {
                    alert("Moviste algo????");
                }
                else {
                    let actPelicula = JSON.parse(response);
                    $("#txtActTitulo").val(actPelicula.titulo);
                    //console.log(actPelicula.idGenero);
                    $("#cbActGenero option[id='" + actPelicula.idGenero + "']").attr("selected", "selected");
                    // $("#cbActGenero ").prop('selectedIndex', parseInt(actPelicula.idGenero));
                    $("#cbActRating option[id='" + actPelicula.idRating + "']").attr("selected", "selected");
                    $("#cbActIdioma option[id='" + actPelicula.idIdioma + "']").attr("selected", "selected");
                    $("#cbActFormato option[id='" + actPelicula.idFormato + "']").attr("selected", "selected");
                    //$("#cbActRating ").prop('selectedIndex', parseInt(actPelicula.idRating));
                    $("#txtActDirector").val(actPelicula.director);
                    $("#txtActProductor").val(actPelicula.productor);
                    $("#txtActDistribuidora").val(actPelicula.distribuidora);
                    $("#txtActCodigo").val(actPelicula.codigo);
                    $("#imgAct").attr("src", '../../' + actPelicula.img + '')
                    $("#txtActSinopsis").val(actPelicula.sinopsis);
                    $("#txtActAno").val(actPelicula.ano);

                    mostrar = true;
                }
            },
            ajaxError: function (response) {
                console.log(response);
            }, async: false

        });
        return mostrar;
    }

    limpiarInput() {
        $("input[type=number]").val(" ");
        $("input[type=text]").val(" ");
        $("textarea").val(" ");
        $("select").val("");
        $("input[type=file]").val(null)

    }
    quieroEditarPelicula() {
        $("#txtActTitulo").attr("disabled", false);
        $("#cbActGenero").attr("disabled", false);
        $("#cbActRating").attr("disabled", false);
        $("#cbActFormato").attr("disabled", false);
        $("#cbActIdioma").attr("disabled", false);
        $("#txtActDirector").attr("disabled", false);
        $("#txtActProductor").attr("disabled", false);
        $("#txtActDistribuidora").attr("disabled", false);
        $("#txtActCodigo").attr("disabled", false);
        $("#txtActAno").attr("disabled", false);
        $("#txtActSinopsis").attr("disabled", false);
        $("#txtActFormato").attr("disabled", false);
        $("#txtActIdioma").attr("disabled", false);
        $(" #fActImagen").css("visibility", "visible");
        $("#submitFormActPelicula").css("visibility", "visible")
        $("#submitFormActPelicula").attr("disabled", false);
        //$("#imgAct").css("visibility", "hidden")
    }
    restaurarModal() {
        $("#txtActTitulo").attr("disabled", true);
        $("#cbActGenero").attr("disabled", true);
        $("#cbActRating").attr("disabled", true);
        $("#txtActDirector").attr("disabled", true);
        $("#txtActProductor").attr("disabled", true);
        $("#txtActDistribuidora").attr("disabled", true);
        $("#txtActCodigo").attr("disabled", true);
        $("#txtActAno").attr("disabled", true);
        $("#txtActSinopsis").attr("disabled", true);
        $("#cbActFormato").attr("disabled", true);
        $("#cbActIdioma").attr("disabled", true);

        $(" #fActImagen").css("visibility", "hidden");
        $("#submitFormActPelicula").css("visibility", "hidden");
        $("#submitFormActPelicula").attr("disabled", true);

    }
    actualizarPelicula() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "actualizarPelicula");
        inf.append("titulo", $("#txtActTitulo").val().trim());
        inf.append("idGenero", $("#cbActGenero option:selected").attr("id"));
        inf.append("idRating", $("#cbActRating option:selected").attr("id"));
        inf.append("idFormato", $("#cbActFormato option:selected").attr("id"));
        inf.append("idIdioma", $("#cbActIdioma option:selected").attr("id"));
        inf.append("director", $("#txtActDirector").val().trim());
        inf.append("productor", $("#txtActProductor").val().trim());
        inf.append("distribuidora", $("#txtActDistribuidora").val().trim());
        inf.append("codigo", $("#txtActCodigo").val().trim());
        inf.append("imagen", $("#fActImagen")[0].files[0]);
        inf.append("sinopsis", $("#txtActSinopsis").val().trim());
        inf.append("ano", $("#txtActAno").val().trim());
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

    cargarPeliculasIndex() {
        //$("#tBodyMostrarFunciones").empty();
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "cargarPeliculasIndex");
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
                        let peliculas = JSON.parse(response);
                        for (let i = 0; i < peliculas.length; i++) {
                            $("#divPeliculasFuncionesActivas").append('<div class="col-md-12 col-lg-3"> <div class="card text-white justify-content-center bg-dark text-center p-2" style="overflow:auto;" ><img  class="card-img-top img-thumbnail" style="max-width:100%" src="../../' + peliculas[i].img + '" alt="Card image cap"><div class="card-body"><h5 class="card-title">' + peliculas[i].titulo + '</h5>'
                                + '<p class="card-text" style="max-height:250px; overflow:auto;">' + peliculas[i].sinopsis + '</p><a href="#" class="btn btn-dark border border-white btnMostrarPelicula d-block" id="pel' + peliculas[i].id + '">Ver</a>'
                                + '</div><div class="card-footer">Rating: ' + peliculas[i].rating + ' / Genero: ' + peliculas[i].genero + '</div></div></div>');
                        }
                        break;
                }

            }, async: false

        });
    }

    mostrarPelicula(idPelicula) {
        console.log("Mostrando Pelicula");
        $("#tBodyMostrarPelicula").empty();
        let inf = new FormData();
        inf.append("accion", "mostrarPelicula");
        inf.append("controlador", "Pelicula");
        inf.append("idPelicula", idPelicula);
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
                    case 'Error al mostrar pelicula, recargue la pagina por favor':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        //alert(response);
                        let pelicula = JSON.parse(response);
                        $("#tBodyMostrarPelicula").append('<tr class="text-center"><td>Imagen promocional</td><td class="justify-content-center"><img style="max-width:100px" src="../../' + pelicula[0].img + '"></td></tr><tr><td>Titulo</td><td>' + pelicula[0].titulo + '</td></tr><tr><td>Director</td><td>' + pelicula[0].director + '</td></tr>' +
                            '<tr><td>Productor</td><td>' + pelicula[0].productor + '</td></tr><tr><td>Distribuidora</td><td>' + pelicula[0].distribuidora + '</td></tr><tr><td>Formato</td><td>' + pelicula[0].formato + '</td></tr>' +
                            '<tr><td>Ano</td><td>' + pelicula[0].ano + '</td></tr><tr><td>Rating</td><td>' + pelicula[0].rating + '</td></tr><tr><td>Genero</td><td>' + pelicula[0].genero + '</td></tr>' +
                            '<tr><td>Sinopsis</td><td style="max-height:50px; overflow:auto;" >' + pelicula[0].sinopsis + '</td></tr>');
                        $("#modal").modal("show");

                        break;
                }
            },
            ajaxError: function (response) {
                console.log(response);
            }, async: false

        });
    }
}
