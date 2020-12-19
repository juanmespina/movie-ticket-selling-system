$(document).ready(function () {
    let genero = new Genero();
    $("#formCrearGenero").on("submit", function (e) {
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            genero.crearGenero();
            genero.limpiarInput();
            console.log("Creando");

        }
        genero.cargarGeneros();
    });

    $("#formActGenero").on("submit", function (e) {
        console.log("Actualizando");
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            genero.actualizarGenero();
            genero.limpiarInput();
            $("#modal").modal("hide")

        }
        genero.cargarGeneros();
    });

    $(document).on("click", ".tRGenero", function () {

        if (genero.verGenero($(this).attr("id"))) {
            $("#modal").modal("show");
            console.log("Ver genero");
        }

    });

    $("#btnDesactivarGenero").on("click", function () {

        if (confirm("Estas seguro?")) {
            genero.desactivarGenero();
            genero.limpiarInput();
            $("#modal").modal("hide");

            console.log("Desactivando");
        }
        genero.cargarGeneros();
    });
    $("#editarGenero").on("click", function () {
        genero.quieroEditarGenero();
    });

    $(document).on("hidden.bs.modal", "#modal", function () {
        genero.restaurarModal();
    });

    console.log("Doc ready");
    genero.cargarGeneros();
});