$(document).ready(function () {
    let usuario = new Usuario();
    document.cookie = "cine=tiempodesesion; max-age=160; path=/";
    setInterval(function () {
        console.log("Cookie");
        $.ajax({
            type: "POST",
            url: "../../../utilidades/cookies.php",
            success: function (response) {
                if (response == true) {
                    console.log("Activo = " + response);
                } else {
                    if (confirm("Tiene mas de tres minutos inactivo, desea extender la sesion?")) {
                        document.cookie = "cine=tiempodesesion; max-age=160; path=/ "
                    } else {
                        document.getElementById('btnCerrarSesion').click()
                    }
                    console.log(response);
                }
            },
            ajaxError: function (response) {
                console.log(response);
            },
            async: false

        });

    }, 160000);
    $("#btnCerrarSesion").on("click", function () {
        usuario.cerrarSesion();

    });
});
