<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5 text-dark">
        <div class="row">

            <div class="col-11">

               
                   
                    <div class="modal fade m-1" id="modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Ver pelicula</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formActPelicula">
                                        <div class="form-row mt-2">
                                            <div class="col-6">
                                                <label for="txtActTitulo">Titulo de la pelicula</label>
                                                <input id="txtActTitulo" class="form-control" type="text" name="" pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" disabled required>
                                                <small>Minimo 2 caracteres, maximo 45</small>
                                            </div>
                                            <div class="col-6">

                                                <label for="cbActGenero">Genero</label>
                                                <select id="cbActGenero" class="form-control" name="" required disabled>
                                                    <option value="" selected disabled>Seleccione un genero</option>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-row mt-2">
                                            <div class="col-6">
                                                <label for="cbActRating">Rating</label>
                                                <select id="cbActRating" class="form-control" name="" required disabled>
                                                    <option value="" selected disabled>Seleccione un rating</option>

                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for='txtActDirector'> Director </label>
                                                <input type='text' id="txtActDirector" name='txtActDirector' class='form-control' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required disabled>
                                                <small>Minimo 2 caracteres, maximo 45</small>
                                            </div>


                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-6">
                                                <label for="cbActFormato">Formato</label>
                                                <select id="cbActFormato" class="form-control" name="" required disabled>
                                                    <option value="" selected disabled>Seleccione un rating</option>

                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="cbActIdioma">Idioma</label>
                                                <select id="cbActIdioma" class="form-control" name="" required disabled>
                                                    <option value="" selected disabled>Seleccione un rating</option>

                                                </select>
                                            </div>


                                        </div>
                                        <div class="form-row mt-2">
                                            <div class="col-6">
                                                <label for='txtActProductor'> Productor </label>
                                                <input type='text' id="txtActProductor" name='txtActProductor' class='form-control ' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required disabled>
                                                <small>Minimo 2 caracteres, maximo 45</small>
                                            </div>
                                            <div class="col-6">
                                                <label for='txtActDistribuidora'> Distribuidora </label>
                                                <input type='text' id="txtActDistribuidora" name='txtActDistribuidora' class='form-control ' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required disabled>
                                                <small>Minimo 2 caracteres, maximo 45</small>
                                            </div>


                                        </div>
                                        <div class="form-row mt-2 ">
                                            <div class="col-6">

                                                <label for="txtActCodigo">Codigo</label>
                                                <input name="txtActCodigo" type="text" id="txtActCodigo" class="form-control" pattern="[0-9]{6}" required disabled>
                                                <small>6 Caracteres</small>
                                            </div>
                                            <div class="col-6">
                                                <label for="txtActAno">Ano</label>
                                                <input type="number" name="txtActAno" id="txtActAno" required class="form-control" min="1900" max="<?= date("Y") ?>" disabled>
                                                <small>Desde 1900 hasta el ano en curso</small>


                                            </div>


                                        </div>
                                        <div class="form-row justify-content-center mt-2">
                                            <div class="col-6">

                                                <label for="txtActSinopsis">Sipnosis</label>
                                                <textarea name="txtActSinopsis" id="txtActSinopsis" class="form-control" pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,.-+/$#;'@¿?!¡/\s]{2,500}"  required disabled></textarea>


                                            </div>

                                            <div class="col-6">
                                                <label for="fActImagen" style="visibility:hidden;">Imagen</label>
                                                <small>Debe estar en formato JPEG</small>
                                                <input type="file" style="visibility:hidden;" name="fActImagen" id="fActImagen" accept=".jpeg,.jpg" required class="form-control-file">
                                                <img src="" class=" img-thumbnail" id="imgAct" alt="">

                                            </div>


                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" disabled form="formActPelicula" id="submitFormActPelicula" style="visibility:hidden;" class="btn btn-warning">
                                    <button type="button" class="btn btn-primary" id="editarPelicula">Quiero editar</button>
                                    <button class='btn btn-warning ' id="btnDesactivarPelicula">Desactivar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
        <div class="row justify-content-center">
            <div class=" col-md-12 col-xl-8">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarCrearPelicula" aria-expanded="true" aria-controls="collapseOne">
                                    Crear Pelicula
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarCrearPelicula" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <form id="formCrearPelicula">
                                    <div class="form-row mt-2">
                                        <div class="col-6">
                                            <label for="txtTitulo">Titulo de la pelicula</label>
                                            <input id="txtTitulo" class="form-control" type="text" name="" pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>
                                        <div class="col-6">

                                            <label for="cbGenero">Genero</label>
                                            <select id="cbGenero" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione un genero</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="col-6">
                                            <label for="cbRating">Rating</label>
                                            <select id="cbRating" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione un rating</option>

                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for='txtDirector'> Director </label>
                                            <input type='text' id="txtDirector" name='txtDirector' class='form-control' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>


                                    </div>
                                    <div class="form-row mt-2">
                                        <div class="col-6">
                                            <label for="cbFormato">Formato</label>
                                            <select id="cbFormato" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione un Formato</option>

                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="cbIdioma">Idioma</label>
                                            <select id="cbIdioma" class="form-control" name="" required>
                                                <option value="" selected disabled>Seleccione un Idioma</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mt-2">
                                        <div class="col-6">
                                            <label for='txtProductor'> Productor </label>
                                            <input type='text' id="txtProductor" name='txtProductor' class='form-control ' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>
                                        </div>
                                        <div class="col-6">
                                            <label for='txtDistribuidora'> Distribuidora </label>
                                            <input type='text' id="txtDistribuidora" name='txtDistribuidora' class='form-control ' pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,./\s]{2,45}" required>
                                            <small>Minimo 2 caracteres, maximo 45</small>

                                        </div>


                                    </div>
                                    <div class="form-row mt-2 ">
                                        <div class="col-6">

                                            <label for="txtCodigo">Codigo</label>
                                            <input name="txtCodigo" type="text" id="txtCodigo" class="form-control" pattern="[0-9]{6}" required>
                                            <small>6 Caracteres</small>

                                        </div>
                                        <div class="col-6">

                                            <label for="fImagen">Imagen</label>
                                            <input type="file" name="fImagen" id="fImagen" accept=".jpeg,.jpg" required class="form-control-file">
                                            <small>En formato JPEG</small>

                                        </div>


                                    </div>
                                    <div class="form-row justify-content-center mt-2">
                                        <div class="col-6">

                                            <label for="txtAno">Ano</label>
                                            <input type="number" name="txtAno" id="txtAno" required class="form-control" min="1900" max="<?= date("Y") ?>">
                                            <small>Desde 1900 hasta el ano en curso</small>


                                        </div>

                                        <div class="col-6">

                                            <label for="txtSinopsis">Sipnosis</label>
                                            <textarea name="txtSinopsis" id="txtSinopsis" class="form-control"  pattern="[A-Za-z1-9ÁÉÍÓÚáéíóú,.-+/$#;'@¿?!¡/\s]{2,500}" required></textarea>

                                        </div>


                                    </div>
                                    <input class='btn btn-success m-2 float-right' type='submit' id='btnCrearPelicula'>
                                </form>
                            </div>


                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#colapsarMostrarSalas" aria-expanded="true">
                                    Mostrar Peliculas activas
                                </button>
                            </h5>
                        </div>

                        <div id="colapsarMostrarSalas" class="collapse hide" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-dark text-center">
                                    <thead>
                                        <tr>
                                            <td>Codigo</td>
                                            <td>Título</td>
                                            <td>Genero</td>
                                            <td>Rating</td>
                                            <td>Director</td>
                                            <td>Productor</td>
                                            <td>Idioma</td>
                                            <td>Formato</td>
                                            <td>Imagen</td>

                                        </tr>
                                    </thead>

                                    <tbody id="tBodyMostrarPeliculas">

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

    <script src="../Pelicula.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>

</body>

</html>