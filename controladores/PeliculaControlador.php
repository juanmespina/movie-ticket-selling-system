<?php
//require_once '../utilidades/session.php';
require_once '../modelos/Pelicula.php';

class PeliculaControlador
{
    function __construct()
    {
        session_start();
    }
    function cargarRating()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectRating();
            if (count($arreglo) > 0) {
                $_SESSION['rating'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay ratings, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function cargarFormato()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectFormato();
            if (count($arreglo) > 0) {
                $_SESSION['formato'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay formatos, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function cargarIdioma()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectIdioma();
            if (count($arreglo) > 0) {
                $_SESSION['idioma'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay idiomas, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function cargarGenero()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectGenero();
            if (count($arreglo) > 0) {
                $_SESSION['genero'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay generos, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }


    function crearPelicula()
    {
        if (
            isset($_POST['titulo']) && isset($_POST['idGenero']) && isset($_POST['idRating']) && isset($_POST['idIdioma']) && isset($_POST['idFormato']) && isset($_POST['director']) && isset($_POST['productor'])
            && isset($_POST['distribuidora']) && isset($_POST['codigo'])  && isset($_POST['sinopsis']) && isset($_POST['ano']) && isset($_FILES['imagen'])


        ) {
            $codigo = $_POST['codigo'];
            if (
                !empty($_POST['titulo']) && !empty($_POST['idGenero']) && !empty($_POST['idRating']) && !empty($_POST['idIdioma']) && !empty($_POST['idFormato']) && !empty($_POST['director']) && !empty($_POST['productor'])
                && !empty($_POST['distribuidora']) && !empty($_POST['codigo'])  && !empty($_POST['sinopsis']) && !empty($_POST['ano']) && !empty($_FILES['imagen'])
            ) {
                if (
                    $_FILES["imagen"]["type"] == "image/jpeg"
                ) {
                    $objeto = new Pelicula();
                    $rutaImg = "../assets/img/imgpelicula/" . $codigo . '.jpg';
                    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImg)) {
                        if ($objeto->selectPeliculasPorCodigo($_POST['codigo']) == false) {
                            if ($objeto->insertarPelicula(
                                $_POST['titulo'],
                                $_POST['idGenero'],
                                $_POST['idRating'],
                                $_POST['idIdioma'],
                                $_POST['idFormato'],
                                $_POST['director'],
                                $_POST['productor'],
                                $_POST['distribuidora'],
                                $_POST['codigo'],
                                $_POST['sinopsis'],
                                $rutaImg,
                                $_POST['ano']
                            )) {
                                echo 'Creado con exito';
                            } else {
                                echo 'No se pudo crear pelicula';
                            }
                        } else {
                            echo 'Existe una pelicula con el mismo codigo, debe ser unico';
                        }
                    } else {
                        echo 'La imagen no pudo ser guardada.';
                    }
                } else {
                    echo 'El formato de la imagen debe ser jpeg';
                }
            } else {
                echo 'No se permiten valores vacios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function cargarPeliculas()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectPeliculas();
            if (count($arreglo) > 0) {
                $_SESSION['peliculas'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay peliculas, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarPelicula()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['pelElegida'])) {
            $objeto = new Pelicula();
            if ($objeto->updatePeliculaActiva($_SESSION['pelElegida']['id'])) {
                echo true;
            } else {
                echo 'No se pudo desactivar la pelicula';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }

    function verPelicula()
    {

        if (isset($_POST['idPelicula']) && isset($_SESSION['peliculas']) && isset($_SESSION['idusuario'])) {
            $idPelicula = $_POST['idPelicula'];
            $peliculaAct = $_SESSION['peliculas'];
            $resultado = False;
            for ($i = 0; $i < count($peliculaAct); $i++) {
                if ($peliculaAct[$i]['id'] == $idPelicula) {
                    $_SESSION['pelElegida'] = $peliculaAct[$i];
                    $resultado = json_encode($peliculaAct[$i]);
                }
            }
            if ($resultado == false) {
                echo false;
            } else {
                echo $resultado;
            }
        } else {
            echo "Error en los parametros.";
        }
    }
    function actualizarPelicula()
    {
        if (
            isset($_POST['titulo']) && isset($_POST['idGenero']) && isset($_POST['idRating'])  && isset($_POST['idIdioma']) && isset($_POST['idFormato']) && isset($_POST['director']) && isset($_POST['productor'])
            && isset($_POST['distribuidora']) && isset($_POST['codigo'])  && isset($_POST['sinopsis']) && isset($_POST['ano']) && isset($_FILES['imagen'])

        ) {

            if (
                !empty($_POST['titulo']) && !empty($_POST['idGenero']) && !empty($_POST['idRating']) && !empty($_POST['idIdioma']) && !empty($_POST['idFormato']) && !empty($_POST['director']) && !empty($_POST['productor'])
                && !empty($_POST['distribuidora']) && !empty($_POST['codigo'])  && !empty($_POST['sinopsis']) && !empty($_POST['ano']) && !empty($_FILES['imagen'])
            ) {

                $codigo = $_POST['codigo'];
                if (
                    $_FILES["imagen"]["type"] == "image/jpeg"
                ) {
                    $objeto = new Pelicula();
                    $rutaImg = "../assets/img/imgpelicula/" . $codigo . '.jpg';
                    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImg)) {
                        // echo $_POST['titulo'].' '.$_POST['idGenero'].' '.$_POST['idRating']. ' '.$_POST['director'].' '.$_POST['productor'].' '.$_POST['distribuidora'].' '.$_POST['codigo']
                        // .' '.$_POST['sinopsis'].' '.$rutaImg.' '. $_POST['ano'].' '. $_SESSION['pelElegida']['id'];

                        if ($objeto->updatePelicula(
                            $_POST['titulo'],
                            $_POST['idGenero'],
                            $_POST['idRating'],
                            $_POST['idIdioma'],
                            $_POST['idFormato'],
                            $_POST['director'],
                            $_POST['productor'],
                            $_POST['distribuidora'],
                            $_POST['codigo'],
                            $_POST['sinopsis'],
                            $rutaImg,
                            $_POST['ano'],
                            $_SESSION['pelElegida']['id']
                        )) {
                            echo 'Actualizada con exito';
                        } else {
                            echo 'No se pudo actualizar pelicula';
                        }
                    } else {
                        echo 'La imagen no pudo ser guardada.';
                    }
                } else {
                    echo 'El formato de la imagen debe ser jpeg';
                }
            }else{
                echo 'No se permiten valores vacios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }

    function crearGenero()
    {
        if (isset($_POST['genero']) && isset($_SESSION['idusuario'])) {
            if (!empty($_POST['genero'])) {
                $objeto = new Pelicula();
                if ($objeto->selectGeneroGenero($_POST['genero']) == false) {
                    if ($objeto->insertarGenero($_POST['genero'])) {
                        echo 'Guardado con exito';
                    } else {
                        echo 'No se pudo crear el genero';
                    }
                } else {

                    echo 'Ya existe un genero con ese nombre, elige otro';
                }
            } else {
                echo 'No ser permiten valores vacios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function verGenero()
    {

        if (isset($_POST['idGenero']) && isset($_SESSION['genero']) && isset($_SESSION['idusuario'])) {
            $idGenero = $_POST['idGenero'];
            $generoAct = $_SESSION['genero'];
            $resultado = False;
            for ($i = 0; $i < count($generoAct); $i++) {
                if ($generoAct[$i]['id'] == $idGenero) {
                    $_SESSION['genElegido'] = $generoAct[$i];
                    $resultado = json_encode($generoAct[$i]);
                }
            }
            if ($resultado == false) {
                echo false;
            } else {
                echo $resultado;
            }
        } else {
            echo "Error en los parametros.";
        }
    }

    function verIdioma()
    {

        if (isset($_POST['idIdioma']) && isset($_SESSION['idioma']) && isset($_SESSION['idusuario'])) {
            $idIdioma = $_POST['idIdioma'];
            $idiomaAct = $_SESSION['idioma'];
            $resultado = False;
            for ($i = 0; $i < count($idiomaAct); $i++) {
                if ($idiomaAct[$i]['id'] == $idIdioma) {
                    $_SESSION['idiomaElegido'] = $idiomaAct[$i];
                    $resultado = json_encode($idiomaAct[$i]);
                }
            }
            if ($resultado == false) {
                echo false;
            } else {
                echo $resultado;
            }
        } else {
            echo "Error en los parametros.";
        }
    }
    function actualizarGenero()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['genero'])) {
            if (!empty($_POST['genero'])) {
                $objeto = new Pelicula();
                if ($objeto->updateGenero(
                    $_POST['genero'],
                    $_SESSION['genElegido']['id']
                )) {
                    echo 'Actualizado con exito';
                } else {
                    echo 'No se pudo actualizar genero';
                }
            } else {
                echo 'No se permiten valores vacios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function actualizarIdioma()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['idioma'])) {

            if (!empty($_POST['idioma'])) {
                $objeto = new Pelicula();
                if ($objeto->updateIdioma(
                    $_POST['idioma'],
                    $_SESSION['idiomaElegido']['id']
                )) {
                    echo 'Actualizado con exito';
                } else {
                    echo 'No se pudo actualizar idioma';
                }
            } else {
                echo 'No se permiten valores vacios';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarGenero()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['genElegido'])) {
            $objeto = new Pelicula();
            if ($objeto->updateGeneroActiva($_SESSION['genElegido']['id'])) {
                echo true;
            } else {
                echo 'No se pudo desactivar el genero';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarIdioma()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['idiomaElegido'])) {
            $objeto = new Pelicula();
            if ($objeto->updateIdiomaActivo($_SESSION['idiomaElegido']['id'])) {
                echo true;
            } else {
                echo 'No se pudo desactivar el genero';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function crearIdioma()
    {
        if (isset($_SESSION['idusuario']) && isset($_POST['idioma'])) {
            $objeto = new Pelicula();
            if (!empty($_POST['idioma'])) {
                if ($objeto->selectIdiomaIdioma($_POST['idioma']) == false) {
                    if ($objeto->insertarIdioma($_POST['idioma'])) {
                        echo 'Guardado con exito';
                    } else {
                        echo 'No se pudo crear el Idioma';
                    }
                } else {

                    echo 'Ya existe un idioma con ese nombre, elige otro';
                }
            } else {
                echo 'No se permiten valores vacios ';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }



    function cargarPeliculasIndex()
    {
        $objeto = new Pelicula();
        $arreglo = $objeto->selectPeliculasFuncionActiva();
        if (count($arreglo) > 0) {
            $_SESSION['peliculasIndex'] = $arreglo;
            echo json_encode($arreglo);
        } else {

            echo 'No hay funciones activas';
        }
    }

    function mostrarPelicula()
    {
        if (isset($_POST['idPelicula'])) {
            $objeto = new Pelicula();
            $arreglo = $objeto->selectPeliculaId($_POST['idPelicula']);
            if (count($arreglo) > 0 && $arreglo != false) {
                echo json_encode($arreglo);
            } else {

                echo 'Error al mostrar pelicula, recargue la pagina por favor';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
