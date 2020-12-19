$(document).ready(function () {
    let usuario = new Usuario();
    $("#formActContrasena").on("submit", function (e) {
        e.preventDefault();
        usuario.actualizarContrasena();

    });
    $("#btnDesactivarUsuario").on("click", function (e) {
        e.preventDefault();
        usuario.desactivarUsuario();

    });



});