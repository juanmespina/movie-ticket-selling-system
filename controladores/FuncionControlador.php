<?php
//require_once '../utilidades/session.php';
require_once '../modelos/Funcion.php';

class FuncionControlador
{
    function __construct()
    {
        session_start();
    }

    function crearFuncion()
    {
        $existe = true;
        if (
            isset($_POST['fFuncion']) && isset($_POST['hInicial']) &&
            isset($_POST['hFinal']) && isset($_POST['idSala']) && isset($_POST['idPelicula'])
        ) {
            $hInicial = strtotime($_POST['hInicial']);
            $hFinal = strtotime($_POST['hFinal']);
            $fFuncion = strtotime(str_replace('/', '-', $_POST['fFuncion']));
            if (strtotime(date("Y-m-d")) >= strtotime($fFuncion)) {
                if ($hInicial < $hFinal) {
                    $objeto = new Funcion();
                    $funciones = $objeto->selectFuncionFechaSala($_POST['idSala'], $_POST['fFuncion']);
                    if (count($funciones) > 0 && $funciones != false) {
                        for ($i = 0; $i < count($funciones); $i++) {
                            $fGInicial = strtotime($funciones[$i]['inicio']);
                            $fGFinal = strtotime($funciones[$i]['final']);
                            if (($hInicial > $fGInicial && $hFinal < $fGFinal) || ($hFinal > $fGInicial && $hFinal < $fGFinal)
                                || ($hInicial > $fGInicial && $hInicial < $fGFinal) || ($hInicial == $fGInicial && $hFinal == $fGFinal) || ($hInicial < $fGInicial && $hFinal > $fGInicial) || ($hInicial < $fGFinal && $hFinal > $fGFinal)
                            ) {
                                $existe = true;
                                echo 'Existe una funcion en esa hora, fecha y sala';
                                die();
                            }
                            $existe = false;
                        }
                    } else {
                        $existe = false;
                    }
                } else {
                    echo 'La hora de inicio no puede ser mayor que la hora de finalizacion';
                    die();
                }
            } else {

                echo ' La fecha no puede ser menor que el dia actual';
                die();
            }
        } else {

            echo 'Problema con los parametros';
            die();
        }

        if ($existe == false) {
            if ($objeto->insertFuncion($_POST['idSala'], $_POST['fFuncion'], $_POST['hInicial'], $_POST['hFinal'], $_POST['idPelicula'])) {
                echo 'Funcion creada exitosamente';
            } else {
                echo '.No se pudo crear la funcion, contacte con el soporte tecnico';
            }
        }
    }

    function cargarFunciones()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Funcion();
            $arreglo = $objeto->selectFunciones();
            if (count($arreglo) > 0) {
                $_SESSION['funciones'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay funciones, contacta con servicio tecnico';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarFuncion()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['funciones']) && isset($_POST['idFuncion'])) {
            $objeto = new Funcion();
            foreach ($_SESSION['funciones'] as $funcion) {
                if ($funcion['id'] == $_POST['idFuncion']) {
                    if ($objeto->updateFuncionActiva($_POST['idFuncion'])) {
                        echo true;
                    } else {
                        echo 'No se pudo desactivar la pelicula';
                    }
                }
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    //yava
    function cargarFuncionesPelicula()
    {
        if (isset($_POST['idPelicula'])) {
            $objeto = new Funcion();
            $arreglo = $objeto->selectPeliculasFuncionActiva($_POST['idPelicula']);
            if (count($arreglo) > 0 && $arreglo != false) {
                $_SESSION['funcionesPeli'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay funciones activas';
            }
        } else {
            echo 'Error al enviar parametros';
        }
    }
    function mostrarButacasOcupadas()
    {
        if (isset($_POST['idFuncion'])) {
            $objeto = new Funcion();
            $arreglo = $objeto->selectBoletoFuncion($_POST['idFuncion']);

            if (count($arreglo) > 0 || $arreglo != false) {
                $_SESSION["idFuncionEleg"] = $_POST['idFuncion'];
                echo json_encode($arreglo);
            } else {

                echo false;
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function previsualizarFactura()
    {
        if (isset($_POST['arrButacasSelec']) && isset($_SESSION["idFuncionEleg"])) {
            $objeto = new Funcion();
            $butacasSelec =  json_decode($_POST['arrButacasSelec']);
            $precio = $objeto->selectPrecio();
            $butacasSala = $_SESSION['butacasSala'];
            $nombreButacasSel = [];
            if (count($precio) > 0 || $precio != false) {
                $funcion = $objeto->selectFuncionesId($_SESSION["idFuncionEleg"]);
                if (count($funcion) > 0 || $funcion != false) {
                    $cont = 0;
                    for ($i = 0; $i < count($butacasSala); $i++) {

                        if (in_array($butacasSala[$i]['idButaca'], $butacasSelec)) {
                            $nombreButacasSel[$cont] = $butacasSala[$i]['butaNombre'];
                            $cont++;
                        }
                    }
                    $_SESSION['factura']['idButacasSel']=$butacasSelec;
                    $_SESSION['factura']['nombreButacasSel'] = $nombreButacasSel;
                    $_SESSION['factura']['precio'] = $precio[0]["precio"];
                    $_SESSION['factura']['idPrecio'] = $precio[0]["id"];
                    $_SESSION['factura']['total'] = $precio[0]["precio"] * count($butacasSelec);
                    $_SESSION['factura']['nombre'] = $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
                    $_SESSION['factura']['cedula'] = $_SESSION['cedula'];
                    $_SESSION['factura']['sala'] = $funcion[0]['sala'];
                    $_SESSION['factura']['inicio'] = $funcion[0]['inicio'];
                    $_SESSION['factura']['final'] = $funcion[0]['final'];
                    $_SESSION['factura']['fechaFuncion'] = $funcion[0]['fecha'];
                     $_SESSION['factura']['peliculaTitulo'] = $funcion[0]['titulo'];
                    echo json_encode($_SESSION['factura']);
                } else {

                    echo 'Error al consultar parametros';
                }
            } else {

                echo 'No hay precios disponibles';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
