<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-dark">


        <div class="row">
            <div class="col-xl-4 col-md-10" id="colModal">
                <div class="modal fade m-1" id="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ver Idioma</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formActIdioma">
                                    <div class="form-row mt-2">
                                        <div class="col-12">
                                            <label for="txtActIdioma">Idioma</label>
                                            <input id="txtActIdioma" class="form-control" type="text" name="" pattern="[A-ZÁÉÍÓÚ]+[A-Za-zÁÉÍÓÚáéíóú/\s]{2,45}" disabled required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" disabled form="formActIdioma" id="submitFormActIdioma" style="visibility:hidden;" class="btn btn-warning">
                                <button type="button" class="btn btn-primary" id="editarIdioma">Quiero editar</button>
                                <button class='btn btn-warning ' id="btnDesactivarIdioma">Desactivar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarCrearIdioma" aria-expanded="true" aria-controls="collapseOne">
                                    Crear Idioma
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarCrearIdioma" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <form id="formCrearIdioma">
                                    <div class="form-row mt-2">
                                        <div class="col-12">
                                            <label for="txtIdioma">Idioma</label>
                                            <input id="txtIdioma" class="form-control" type="text" name="" pattern="[A-ZÁÉÍÓÚ]+[A-Za-zÁÉÍÓÚáéíóú/\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>

                                    </div>
                                    <input class='btn btn-success m-2 float-right' type='submit' id='btnCrearIdioma'>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarMostrarIdiomas" aria-expanded="true">
                                    Mostrar Idiomas activos
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarMostrarIdiomas" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-dark text-center">
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Idioma</td>
                                        </tr>
                                    </thead>

                                    <tbody id="tBodyMostrarIdiomas">

                                    </tbody>
                                </table>
                            </div>


                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>

    <?php // require_once '../../layout/footer.php';
    ?>

    <script src="../Idioma.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>