$(document).ready(function () {
let funcion =new Funcion();
funcion.cargarPeliculas();
funcion.cargarSalas();
funcion.cargarFunciones();
$("#formCrearFuncion").on("submit", function (e) {
    if (confirm("Estas seguro?")) {
        e.preventDefault();
        funcion.crearFuncion();
        funcion.cargarFunciones();
        funcion.limpiarInput();
        console.log("Creando");
    }
    
  
});

$(document).on("click", ".btnDesactivarFuncion", function () {

    if (confirm("Estas seguro?")) {
        funcion.desactivarFuncion($(this).attr("id"));
        funcion.cargarFunciones();
    }


});


console.log("Doc ready");




});