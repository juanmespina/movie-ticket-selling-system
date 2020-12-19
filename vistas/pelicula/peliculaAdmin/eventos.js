$(document).ready(function () {
    let pelicula = new Pelicula();
    pelicula.cargarRating();
    pelicula.cargarGenero();
    pelicula.cargarIdioma();
    pelicula.cargarFormato();
    pelicula.cargarPeliculas();
    $("#formCrearPelicula").on("submit", function (e) {
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            pelicula.crearPelicula();
            pelicula.limpiarInput();
            console.log("Creando");

        }
        pelicula.cargarPeliculas();

    });

    $("#formActPelicula").on("submit", function (e) {
        console.log("Actualizando")
        if (confirm("Estas seguro?")) {
            e.preventDefault();
            pelicula.actualizarPelicula();
            pelicula.limpiarInput();
            $("#modal").modal("hide")
        }
        pelicula.cargarPeliculas();


    });

    $(document).on("click", ".tRPelicula", function () {

        if (pelicula.verPelicula($(this).attr("id"))) {
            $("#modal").modal("show");
            console.log("Ver Pelicula");
        }

    });

    $("#btnDesactivarPelicula").on("click", function () {

        if (confirm("Estas seguro?")) {
            pelicula.desactivarPelicula();
            pelicula.limpiarInput();
            $("#modal").modal("hide");

            console.log("Desactivando");
        }
        pelicula.cargarPeliculas();
    });

    $("#editarPelicula").on("click", function () {
        pelicula.quieroEditarPelicula();
    });
    $(document).on("hidden.bs.modal", "#modal", function () {
        pelicula.restaurarModal();
    });
    $("#fActImagen").on("change", function (e) {

        let reader = new FileReader();

        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);

        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function () {
            $("#imgAct").attr("src", reader.result);

        };
        reader.onloadend = function () {
            pelicula.cargarPeliculas()
        };
    });
    $
    console.log("Doc ready");
    
});