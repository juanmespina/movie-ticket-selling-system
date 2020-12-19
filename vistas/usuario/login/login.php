<?php //require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5">

        <div class="row justify-content-center my-5">
            <div class="col-3 bg-light border border-dark text-center m-3">
                <h2>Iniciar Sesion</h2>
                <form method="post" id="formIniciarSesion" class=" mt-3">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input id="clave" class="form-control" type="password" name="clave" required>
                    </div>
                    <div class="form-row my-3">
                    <div class="col-12 justify-content-around"><input type="submit" class="btn btn-outline-dark btn-block my-2" value="Ingresar">
                        </div>
                        <div class="col-12 justify-content-around">
                            <a href="../../../vistas/usuario/crearUsuario/crearUsuario.php" class="">No tienes cuenta? Registrarse!</a>
                        </div>
                   
                    </div>

                </form>
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