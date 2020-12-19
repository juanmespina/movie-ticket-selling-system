<?php require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5">

        <div class="row justify-content-center my-5 text-center">

            <div class="col-xl-5 col-md-12 bg-light border border-dark text-center m-3">
                <h4>Gestionar Usuario</h4>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Actualizar Contrasena
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form method="post" id="formActContrasena" class=" mt-3">
                                    <div class="form-group">
                                        <label for="txtActContrasena">Clave Nueva</label>
                                        <input id="txtActContrasena" class="form-control" type="text" name="txtActContrasena" required pattern="[A-Za-z0-9*$&]{4,16}">
                                        <small>De 4 a 16 caracteres, solo se aceptan letras,*, $, & y numeros</small>
                                        <label for="txtContrasenaVieja">Clave Actual</label>
                                        <input id="txtContrasenaVieja" class="form-control" type="text" name="txtContrasenaVieja" required>
                                    </div>
                                    <div class="form-row my-3">
                                        <div class="col-12 justify-content-around"><input type="submit" class="btn btn-outline-dark btn-block my-2" value="Actualizar">
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Desactivar Usuario
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <h5>Esta opcion desactivara tu cuenta, pero tu informacion no sera borrada totalmente de nuestros servidores.</h5>
                                <button class="btn btn-danger" id="btnDesactivarUsuario">Desactivar Mi cuenta</button>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>

    </div>


    <script src="../Usuario.js"></script>
    <script src="eventos.js"></script>
    <?php
    require_once '../../layout/footer.php';
    ?>
</body>

</html>