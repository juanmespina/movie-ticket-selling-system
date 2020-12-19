<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="../../../index.php"> <img src="../../../assets/img/film.png" class="mx-2" style="width: 40px;">Cachi Cine</a>

    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <!--Inicio para navbar para admin-->
            <?php if (isset($_SESSION['idusuario'])) { ?>
                <?php if (isset($_SESSION['nombre']) && isset($_SESSION['idusuario']) && isset($_SESSION['cedula']) && $_SESSION['nivel'] == 1) { ?>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/usuario/usuarioAdmin/usuarioAdmin.php">Inicio </a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/sala/salaAdmin/salaAdmin.php">Salas </a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/pelicula/peliculaAdmin/peliculaAdmin.php">Peliculas</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/funcion/funcionAdmin/funcionAdmin.php">Funciones</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/genero/generoAdmin/generoAdmin.php">Generos de Peliculas</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/idioma/idiomaAdmin/idiomaAdmin.php">Idiomas</a>
                    </li>


                    <!-- Fin Navbar para admin-->

                <?php  } else { ?>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../index.php">Inicio</a>
                    </li>
                    <li class="nav-item m-1">

                        <a class="nav-link" href="../../../vistas/factura/compras/compras.php"> Compras</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="../../../vistas/usuario/gestionarUsuario/gestionarUsuario.php"> Gestionar Usuario</a>
                    </li>
                    <li class="nav-item m-1 ">
                        <a class="nav-link disabled "> Bienvenido, <?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?></a>

                    </li>
                <?php } ?>
                <li class="nav-item m-1">

                    <a class="nav-link" id="btnCerrarSesion" href="#"> Cerrar Sesion</a>
                </li>

                <script src="../../../vistas/layout/navbarEventos.js"></script>


            <?php  } else { ?>
                <li class="nav-item m-1">
                    <a class="nav-link" href="../../../vistas/usuario/login/login.php">Iniciar Sesion</a>
                </li>
            <?php  } ?>
        </ul>
    </div>
</nav>
<script src="../../../vistas/usuario/Usuario.js"></script>