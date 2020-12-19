<?php
//require_once '../utilidades/session.php';
require_once '../modelos/Sala.php';
class SalaControlador

{
    const LETRA_FILA = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    function __construct()
    {
        session_start();
    }

    function crearSala()
    {
        if (isset($_POST['nroSala']) && isset($_POST['nroColumnas']) && isset($_POST['nroFilas'])) {
            if (is_numeric(($_POST['nroSala'])) && strlen($_POST['nroSala']) > 0) {

                if (is_numeric(($_POST['nroFilas'])) && $_POST['nroFilas'] > 0 && $_POST['nroFilas'] <= 10) {

                    if (is_numeric(($_POST['nroColumnas'])) && $_POST['nroColumnas'] > 0 && $_POST['nroColumnas'] <= 10) {

                        if (!empty($_POST['nroColumnas']) && !empty($_POST['nroFilas']) && !empty($_POST['nroSala'])) {
                            $objeto = new Sala();
                            if ($objeto->crearSala($_POST['nroSala'], $_POST['nroFilas'], $_POST['nroColumnas'], SalaControlador::LETRA_FILA)) {
                                // echo $objeto->crearSala($_POST['nroSala'], $_POST['nroFilas'], $_POST['nroColumnas'], SalaControlador::LETRA_FILA);
                                echo "Sala creada con exito";
                            } else {
                                echo 'La sala no pudo ser creada';
                            }
                        } else {

                            echo 'No se pueden enviar valores vacios';
                        }
                    } else {

                        echo ' Numero de columnas debe ser entero y debe tener mas de un digito';
                    }
                } else {

                    echo ' Numero de filas debe ser entero y debe tener mas de un digito';
                }
            } else {

                echo ' Numero de sala debe ser entero y debe tener mas de un digito';
            }
        } else {

            echo 'Problema con los parametros';
        }
    }

    function cargarSalas()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Sala();
            $arreglo = $objeto->selectSalas();
            if (count($arreglo) > 0) {

                $_SESSION['salas'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay salas guardadas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    function desactivarSala()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['salas']) && isset($_POST['idSala'])) {
            $objeto = new Sala();
            foreach ($_SESSION['salas'] as $sala) {
                if ($sala['id'] == $_POST['idSala']) {
                    if ($objeto->updateSalaActiva($_POST['idSala'])) {
                        echo true;
                    } else {
                        echo 'No se pudo desactivar la sala';
                    }
                }
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }

    function mostrarSala()
    {
        if (isset($_POST['idSala'])) {
            $objeto = new Sala();
            $arreglo = $objeto->selectSalaButacaId($_POST['idSala']);
            if (count($arreglo) > 0) {
                $_SESSION['butacasSala'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay salas guardadas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
    //Hay que moverla a un controlador Boleto

}
