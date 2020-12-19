$(document).ready(function () {
    let idioma = new Idioma();
    $("#formCrearIdioma").on("submit", function (e) {
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            idioma.crearIdioma();
            idioma.limpiarInput();
            console.log("Creando");

        }
        idioma.cargarIdioma();
    });

    $("#formActIdioma").on("submit", function (e) {
        console.log("Actualizando");
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            idioma.actualizarIdioma();
            idioma.limpiarInput();
            $("#modal").modal("hide")

        }
        idioma.cargarIdioma();
    });

    $(document).on("click", ".tRIdioma", function () {

        if (idioma.verIdioma($(this).attr("id"))) {
            $("#modal").modal("show");
            console.log("Ver Idioma");
        }

    });

    $("#btnDesactivarIdioma").on("click", function () {

        if (confirm("Estas seguro?")) {
            idioma.desactivarIdioma();
            idioma.limpiarInput();
            $("#modal").modal("hide");

            console.log("Desactivando");
        }
        idioma.cargarIdioma();
    });
    $("#editarIdioma").on("click", function () {
        idioma.quieroEditarIdioma();
    });

    $(document).on("hidden.bs.modal", "#modal", function () {
        idioma.restaurarModal();
    });

    console.log("Doc ready");
    idioma.cargarIdioma();
});