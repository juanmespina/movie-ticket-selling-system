<?php
require_once 'vistas/layout/head.php';
session_start(); ?>

<body class="text-white">

    <?php require_once 'vistas/layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-white">

        <div class="row  my-3">
            <div class="col-12 justify-content-center align-items-center d-flex">
                <h3>En cartelera!</h3>
            </div>
        </div>
        <div class="row justify-content-center p-3  my-3" id="divPeliculasFuncionesActivas">



        </div>


        <div class="row justify-content-center">

            <div class="col-12">
                <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Resumen y Disponibilidad</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Ficha tecnica
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <table class="table table-dark">
                                                    <tbody id="tBodyMostrarPelicula">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2) { ?>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Funciones Disponibles
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="table-responsive-md">
                                                        <table class="table table-light table-bordered text-center">
                                                            <tbody id="tBodyCargarFuncionesPelicula">
                                                                <thead>
                                                                    <td>Hora Inicio</td>
                                                                    <td>Hora Finalizacion</td>
                                                                    <td>Fecha</td>
                                                                    <td>Sala</td>
                                                                    <td>Reservar</td>
                                                                </thead>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2) { ?>

            <div class="row justify-content-center">

                <div class="col-12 text-dark">
                    <div id="modalSala" style="width:100%" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Elegir Asientos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 table-responsive-md" id="colMostrarSala">
                                            <table class="table table-light table-hover ">
                                                <tbody id="tBodyMostrarSala" style=" max-width:350px; overflow:auto;">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row justify-content-around w-100">
                                        <div class="col-2 text-center">
                                            <img src="assets/img/butacaLibrepng.png" style="width:24px;" alt="" srcset=""> <br>   
                                            <small>Libre</small>
                                        </div>
                                        <div class="col-2 text-center"><img src="assets/img/butacaOcupada.png" style="width:24px;" alt="" srcset="">
                                        <br>    
                                        <small>Ocupada</small></div>
                                        <div class="col-2 text-center">
                                            <img src="assets/img/butacaSelec.png" style="width:24px;" alt="" srcset=""> <br>   
                                            <small>Selecc.</small>

                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-primary " id="btnPrevFactura" disabled>Previsualizar Factura</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-12 text-dark text-center">

                    <div id="modalPrevFactura" style="width:100%" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title ">Previa a pagar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row bg-light text-dark" id="divImprimirFactura">
                                        <div class="col-12 text-center table-responsive-md" id="colImprimirFactura">
                                            <img src="assets/img/film.png" alt="" srcset="" style="width:50px;">
                                            <h4>Cachi Cine</h4>
                                            <h5>Maracaibo</h5>
                                            <h5>Corporacion Cines Del Zulia</h5>
                                            <h5>J-1231997</h5>

                                            <table class="table table-light text-center">
                                                <tbody id="tBodyPrevFactura">

                                                </tbody>
                                            </table>
                                            <h4>Este sera su unico comprobante, guardelo en un sitio seguro</h4>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <div id="paypal-button-container"></div>
                                    <!-- <button type="button" class="btn btn-primary " id="btnCrearFactura">Pagar</button> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <script src="https://www.paypal.com/sdk/js?client-id=ATynLynsCU3kf3_5q-PVSifnmgfv3Sdf73g4i7343fAUlA8keCNUASVsCm5pTroJVZzKKn7opMoCh8xo">
    </script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<?php } ?>

</div>

<script src="../../../assets\html2pdf.js-master\dist\html2pdf.bundle.min.js"></script>
<script src="vistas/sala/Sala.js"></script>
<script src="vistas/pelicula/Pelicula.js"></script>
<script src="vistas/funcion/Funcion.js"></script>
<script src="vistas/factura/Factura.js"></script>
<script src="vistas/pelicula/index/eventos.js"></script>



<?php
require_once 'vistas/layout/footer.php';
?>
</div>
</body>

</html>