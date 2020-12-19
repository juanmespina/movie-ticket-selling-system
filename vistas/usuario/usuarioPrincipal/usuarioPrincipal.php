<?php // require_once '../../../utilidades/session.php';
require_once 'vistas/layout/head.php';
?>

<body class="text-white">

    <?php require_once 'vistas/layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-white">
        <div class="row  my-3">
            <div class="col-12 justify-content-center d-flex">
                <h3>Peliculas con funciones disponibles</h3>
            </div>
        </div>
        <div class="row justify-content-center p-3  my-3" id="divPeliculasFuncionesActivas">

            <!--  <div class="col-10">
                <div class="card" style="width: 18rem;"><img class="card-img-top" src="..." alt="Card image cap"><div class="card-body"><h5 class="card-title">Card title</h5>
<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p><a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div> -->


        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-6">
            <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <table class="table table-dark">
                                <tbody id="tBodyMostrarPelicula">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="vistas/pelicula/Pelicula.js"></script>
    <script src="vistas/pelicula/index/eventos.js"></script>
    <?php
    require_once 'vistas/layout/footer.php';
    ?>

</body>

</html>