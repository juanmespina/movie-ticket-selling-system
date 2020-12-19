class Idioma {

    cargarIdioma() {
        $("#tBodyMostrarIdiomas").empty();
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
                //alert(response);
                switch (response) {
                    case 'No hay Idioma, contacta con servicio tecnico':
                        alert(response);
                        break;
                    case 'Error al enviar parametros':
                        alert(response);
                        break;
                    default:
                        let idioma = JSON.parse(response);
                        for (let i = 0; i < idioma.length; i++) {
                            $("#tBodyMostrarIdiomas").append("<tr class ='tRIdioma' id='" + idioma[i].id + "'><td>" + idioma[i].id + "</td><td>" + idioma[i].idioma + "</td></tr>");

                        }

                        break;
                }

            }, async: false

        });

    }

    crearIdioma() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "crearIdioma");
        inf.append("idioma", $("#txtIdioma").val().trim());
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




    desactivarIdioma() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "desactivarIdioma");
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
    verIdioma(idIdioma) {
        let mostrar = false;
        let inf = new FormData();
        inf.append("accion", "verIdioma");
        inf.append("controlador", "Pelicula");
        inf.append("idIdioma", idIdioma);
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
                    let actIdioma = JSON.parse(response);
                    $("#txtActIdioma").val(actIdioma.idioma);
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
    quieroEditarIdioma() {
        $("#txtActIdioma").attr("disabled", false);
        $("#submitFormActIdioma").css("visibility", "visible")
        $("#submitFormActIdioma").attr("disabled", false);
        //$("#imgAct").css("visibility", "hidden")
    }
    restaurarModal() {
        $("#txtActIdioma").attr("disabled", true);
        $("#submitFormActIdioma").css("visibility", "hidden");
        $("#submitFormActIdioma").attr("disabled", true);

    }

    actualizarIdioma() {
        let inf = new FormData();
        inf.append("controlador", "Pelicula");
        inf.append("accion", "actualizarIdioma");
        inf.append("idioma", $("#txtActIdioma").val().trim());
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