<?php
//require_once '../utilidades/session.php';
require_once '../modelos/Factura.php';


class FacturaControlador
{
    function __construct()
    {
        session_start();
    }

    function crearFactura()
    {
        if (isset($_SESSION['factura'])) {
            $factura = $_SESSION['factura'];
            $objeto = new Factura();
            $idFactura = $objeto->insertarFactura($_SESSION['idusuario'], 1);
            if ($idFactura != false) {
                if ($objeto->insertarBoletos($idFactura, $factura['idPrecio'], $_SESSION["idFuncionEleg"], $_SESSION['factura']['idButacasSel'])) {
                    $_SESSION['factura']['idFactura'] = $idFactura;
                    echo 'Factura y Boletos creados con exito';
                } else {
                    echo 'Contacte a servicio tecnico, no se registraron los boletos';
                }
            } else {
                echo 'Error al crear factura';
            }
        } else {

            echo 'Problema con los parametros';
        }
    }

    function imprimirFactura()
    {
        if (isset($_SESSION['factura'])) {
            $factura = $_SESSION['factura'];
            echo json_encode($factura);
        } else {

            echo 'Problema con los parametros';
        }
    }

    function cargarCompras()
    {
        if (isset($_SESSION['idusuario'])) {
            $objeto = new Factura();
            $arreglo = $objeto->selectFacturaIdUsuario($_SESSION['idusuario']);
            if (count($arreglo) > 0) {
                $_SESSION['compras'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'No hay compras realizadas';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
