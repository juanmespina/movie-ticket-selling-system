$(document).ready(function () {
    let sala = new Sala();
    sala.cargarSalas();
    // $("#btnDesplegarFilas").on("click", function () {
    //     sala.crearFilas();
    // });
    $("#formCrearSala").on("submit", function (e) {

        if (confirm("Estas seguro?")) {
            e.preventDefault();
            sala.crearSala();    
            sala.cargarSalas();
            sala.limpiarInput();
        }


    });

    $(document).on("click", ".btnDesactivarSala", function () {

        if (confirm("Estas seguro?")) {
            sala.desactivarSala($(this).attr("id"));
            sala.cargarSalas();
        }


    });



});