<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php'; ?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5">

        <div class="jumbotron jumbotron-fluid bg-dark text-white border  p-5">
            <h1 class="display-4">Bienvenido, <?= $_SESSION['nombre'] ?></h1>
            <p class="lead">Instrucciones Iniciales</p>
            <hr class="my-1">
            <p>Para crear una funcion, debes primero tener una pelicula y una sala agregada,ambas deben estar activas. Recuerda que no puedes crear funciones en la misma sala, hora y fecha si ya existe otra registrada.
                Puedes crear y desactivar funciones o salas, no se pueden editar por obvias razones. Por su parte, las peliculas,los generos y los idiomas pueden ser creadas, desactivadas y editadas. Esto se hace, al tocar la fila donde se encuentra lo que se desea editar o desactivar.
                Desactivar se entiende como borrado logico.
            </p>
        </div>
        <?php require_once '../../layout/footer.php';
        ?>
    </div>
</body>

</html>