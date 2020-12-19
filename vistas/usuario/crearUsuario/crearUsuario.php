<?php //require_once '../../../utilidades/session.php';
require_once '../../layout/head.php';
?>

<body>
    <?php require_once '../../layout/navbar.php';
    ?>
    <div class="container-fluid my-5">

        <div class="row justify-content-center my-5">
            <div class="col-6 bg-light border border-dark text-center m-3">
                <h2>Registro de Usuario</h2>
                <form id="formCrearUsuario" method="post" class=" mt-3">
                    <div class="form-row mt-2">
                        <div class="col-6">
                            <label for="txtCrearUsuario">Usuario</label>
                            <input id="txtCrearUsuario" class="form-control" type="text" name="txtCrearUsuario" required pattern="[A-Za-z0-9]{4,16}">
                            <small>De 4 a 16 caracteres, solo se aceptan letras y numeros</small>
                        </div>
                        <div class="col-6">
                            <label for="txtCrearClave">Clave</label>
                            <input id="txtCrearClave" class="form-control" type="password" name="txtCrearClave" required pattern="[A-Za-z0-9*$&]{4,16}">
                            <small>De 4 a 16 caracteres, solo se aceptan letras,*, $, & y numeros</small>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-6">
                            <label for="txtCrearNombre">Nombre</label>
                            <input id="txtCrearNombre" class="form-control" type="text" name="txtCrearNombre" required pattern="[A-Z]+[A-Za-z]{1,16}">
                            <small>De 2 a 16 caracteres, solo se aceptan letras. Primera letra mayuscula. </small>
                        </div>
                        <div class="col-6">
                            <label for="txtCrearApellido">Apellido</label>
                            <input id="txtCrearApellido" class="form-control" type="text" name="txtCrearApellido" required pattern="[A-Z]+[A-Za-z]{1,16}">
                            <small>De 2 a 16 caracteres, solo se aceptan letras. Primera letra mayuscula. </small>
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col-6">
                            <label for="txtCrearCedula">Cedula</label>
                            <input id="txtCrearCedula" class="form-control" type="text" name="txtCrearCedula" required pattern="[0-9]{7,9}">
                            <small>De 7 a 9 caracteres, solo se aceptan numeros. </small>
                        </div>
                        <div class="col-6">
                            <label for="txtCrearEmail">Email</label>
                            <input id="txtCrearEmail" class="form-control" type="email" name="txtCrearEmail" required>
                        </div>
                    </div>


                    <input type="submit" class="btn btn-outline-dark float-right my-2" value="Registrar!">


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