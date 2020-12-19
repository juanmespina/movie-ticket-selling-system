<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-dark">


        <div class="row">
            <div class="col-10" id="colModal">
                <div class="modal fade m-1" id="modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ver genero</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formActGenero">
                                    <div class="form-row mt-2">
                                        <div class="col-12">
                                            <label for="txtActGenero">Genero</label>
                                            <input id="txtActGenero" class="form-control" type="text" name="" pattern="[A-ZÁÉÍÓÚ]+[a-zÁÉÍÓÚáéíóú/\s]{2,45}" disabled required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" disabled form="formActGenero" id="submitFormActGenero" style="visibility:hidden;" class="btn btn-warning">
                                <button type="button" class="btn btn-primary" id="editarGenero">Quiero editar</button>
                                <button class='btn btn-warning ' id="btnDesactivarGenero">Desactivar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-10">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarCrearGenero" aria-expanded="true" aria-controls="collapseOne">
                                    Crear genero
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarCrearGenero" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <form id="formCrearGenero">
                                    <div class="form-row mt-2">
                                        <div class="col-12">
                                            <label for="txtGenero">Genero</label>
                                            <input id="txtGenero" class="form-control" type="text" name="" pattern="[A-ZÁÉÍÓÚ]+[a-zÁÉÍÓÚáéíóú/\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>

                                    </div>
                                    <input class='btn btn-success m-2 float-right' type='submit' id='btnCrearGenero'>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarMostrarGeneros" aria-expanded="true">
                                    Mostrar generos activos
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarMostrarGeneros" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-dark text-center">
                                    <thead>
                                        <tr>
                                            <td>Id</td>
                                            <td>Genero</td>
                                        </tr>
                                    </thead>

                                    <tbody id="tBodyMostrarGeneros">

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

    <script src="../Genero.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>