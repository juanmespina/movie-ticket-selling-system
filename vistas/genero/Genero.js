class Genero {

    cargarGeneros() {
        $("#tBodyMostrarGeneros").empty();
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
                //alert(response);
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
                            $("#tBodyMostrarGeneros").append("<tr class ='tRGenero' id='" + genero[i].id + "'><td>" + genero[i].id + "</td><td>" + genero[i].genero + "</td></tr>");

                        }

                        break;
                }

            }, async: false

        });

    }

    crearGenero() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "crearGenero");
        inf.append("genero", $("#txtGenero").val().trim());
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




    desactivarGenero() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "desactivarGenero");
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
    verGenero(idGenero) {
        let mostrar = false;
        let inf = new FormData();
        inf.append("accion", "verGenero");
        inf.append("controlador", "Pelicula");
        inf.append("idGenero", idGenero);
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
                    let actGenero = JSON.parse(response);
                    $("#txtActGenero").val(actGenero.genero);
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

    }
    quieroEditarGenero() {
        $("#txtActGenero").attr("disabled", false);
        $("#submitFormActGenero").css("visibility", "visible")
        $("#submitFormActGenero").attr("disabled", false);
        //$("#imgAct").css("visibility", "hidden")
    }
    restaurarModal() {
        $("#txtActGenero").attr("disabled", true);
        $("#submitFormActGenero").css("visibility", "hidden");
        $("#submitFormActGenero").attr("disabled", true);

    }

    actualizarGenero() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "actualizarGenero");
        inf.append("genero", $("#txtActGenero").val().trim());
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
}