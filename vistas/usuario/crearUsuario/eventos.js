$(document).ready(function () {
    let usuario = new Usuario();
    $("#formCrearUsuario").on("submit", function (e) {
       //console.log("puto form");
        e.preventDefault();
        if (confirm("Estas seguro?")) {
            usuario.crearUsuario();

        }


    });
console.log("Doc ready");
});