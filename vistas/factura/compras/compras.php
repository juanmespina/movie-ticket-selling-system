<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-light">
        <div class="row justify-content-center ">
            <div class="col-xl-8 col-md-12 text-center mt-3 ">
                <h3>Historico de compras</h3>
                <div class="table-responsive-md mt-3">
                    <table class=" table table-striped table-light " id="tableCompras">
                        <tbody id="tBodyCompras">
                            <thead>
                                <td>Codigo Factura</td>
                                <td>Fecha de la Funcion</td>
                                <td>Fecha de Compra</td>
                                <td>Titulo</td>
                                <td>Cant. Boleto</td>
                                <td>Precio</td>
                                <td>Total</td>
                            </thead>

                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>



    <script src="../Factura.js"></script>
    <!-- <script src="../../../assets/paginationjs/pagination.min.js"></script> -->
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>