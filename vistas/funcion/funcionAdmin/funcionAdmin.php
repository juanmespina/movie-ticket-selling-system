<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-dark">
        <div class="row justify-content-center">
            <div class=" col-md-12 col-xl-6">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarCrearFuncion" aria-expanded="true" aria-controls="collapseOne">
                                    Crear Funcion
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarCrearFuncion" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <form id="formCrearFuncion">
                                    <div class="form-row mt-2">
                                        <div class="col-6">
                                            <label for="cbSala">Salas Activas</label>
                                            <select id="cbSala" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione una sala</option>

                                            </select>
                                        </div>
                                        <div class="col-6">

                                            <label for="cbPelicula">Peliculas Activa</label>
                                            <select id="cbPelicula" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione una pelicula</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-row mt-2">

                                        <div class="col-6">
                                            <label for="fFuncion">Fecha de la funcion</label>
                                            <br>
                                            <input type="date" id="fFuncion" class="form-control" min="<?= date("Y-m-d") ?>" max="<?= date("Y") ?>-12-31" required>

                                        </div>
                                        <div class="col-6">
                                            <label for='horaInicial'> Hora de Inicio </label><br>
                                            <input type='time' id="horaInicial" name='hora' class='form-control ' min="12:00" max="19:00" required><br>
                                            <label for='hora'> Hora de Final </label><br>
                                            <input type='time' id="horaFinal" name='horaFinal' class='form-control' min="14:00" max="21:00" required>
                                        </div>

                                    </div>


                                    <input class='btn btn-success m-2 float-right clearfix' type='submit' id='btnCrearFuncion'>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarMostrarFunciones" aria-expanded="true">
                                    Mostrar Funciones activas
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarMostrarFunciones" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">

                                <div class="table-responsive-md">
                                    <table class="table table-dark text-center">
                                        <thead>
                                            <tr>
                                                <td>Sala</td>
                                                <td>Pelicula</td>
                                                <td>Hora de inicio</td>
                                                <td>Hora de finalizacion</td>
                                                <td>Fecha</td>
                                                <td> Acciones</td>
                                            </tr>
                                        </thead>

                                        <tbody id="tBodyMostrarFunciones">

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

    <script src="../Funcion.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>