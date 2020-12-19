<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-dark">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-md-10">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarCrearSala" aria-expanded="true" aria-controls="collapseOne">
                                    Crear Sala
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarCrearSala" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <form id="formCrearSala">
                                    <div class="form-group">
                                        <label for="txtNroSala">Número de Sala</label>
                                        <input id="txtNroSala" class="form-control" type="number" name="" minlength="1" maxlength="100" pattern="[0-9]{1,3}" required>
                                        <small>El numero de sala debe ser unico</small>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-6">
                                            <label for="txtFilas">Filas</label>
                                            <input id="txtFilas" class="form-control" type="number" name="" minlength="1" maxlength="10" pattern="[0-9]{1,2}" required>
                                            <small>10 filas maximo</small>

                                        </div>
                                        <div class="col-6">
                                            <label for='txtColumnas'> Columnas </label>
                                            <input type='number' id="txtColumnas" name='txtColumnas' class='form-control txtFila' minlength='1' maxlength='2' pattern='[0-9]{1,2}' required>
                                            <small>10 columnas maximo</small>
                                        </div>


                                    </div>
                                    <input class='btn btn-success float-right clearfix my-2' type='submit' id='btnCrearSala'>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarMostrarSalas" aria-expanded="true">
                                    Mostrar Salas
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarMostrarSalas" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive-sm">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <td>Id Sala</td>
                                                <td>Numero de sala</td>
                                                <td>Filas</td>
                                                <td>Columnas</td>
                                                <td>Acciones</td>
                                            </tr>
                                        </thead>

                                        <tbody id="tBodyMostrarSalas">

                                        </tbody>
                                    </table>
                                </div>

                            </div>


                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>

    <?php // require_once '../../layout/footer.php';
    ?>

    <script src="../Sala.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>