<?php
require_once '../db/Database.php';
class Factura
{
    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function insertarFactura($idUsuario, $metodoPago)
    {
        $exito = false;
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "INSERT INTO factura(usuario_id,metodo_pago_id,fecha) VALUES ('$idUsuario','$metodoPago',CURDATE())";
        $exito = $this->bd->query($sql);
        $idFactura = $this->bd->insert_id;
        if ($exito || $idFactura!=false|| $idFactura!=0) {
            $this->bd->commit();
            return $idFactura;
        } else {
            $this->bd->rollback();
            return false;
        }
    }

    function insertarBoletos($idFactura, $idPrecio, $idFuncion, $arrButacas)
    {
        $exito = false;
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();

        for ($j = 0; $j < count($arrButacas); $j++) {
            $sql = "INSERT INTO boleto(funcion_id,butaca_id,factura_id,precio_id) VALUES ('$idFuncion','$arrButacas[$j]','$idFactura','$idPrecio')";
            $exito = $this->bd->query($sql);
            if ($exito == false) {
                $this->bd->rollback();
                return false;
                die();
            }
        }
        $this->bd->commit();
        return true;


        
    }

    function selectFacturaIdUsuario($idUsuario)
        {
            $sql = "SELECT factura.fecha AS fCompra, factura.id AS idFactura,COUNT(boleto.id) AS totalBoletos,funcion.fecha AS 
            fFuncion,pelicula.titulo,precio.precio,(COUNT(boleto.id)*precio.precio) AS total FROM factura INNER JOIN boleto ON 
            boleto.factura_id=factura.id INNER JOIN funcion ON funcion.id= boleto.funcion_id INNER JOIN pelicula ON 
            pelicula.id=funcion.pelicula_id INNER JOIN precio ON precio.id=boleto.precio_id WHERE factura.usuario_id='$idUsuario' GROUP BY boleto.factura_id DESC";
            $resultados = $this->bd->query($sql);
            if ($resultados->num_rows > 0) {
                while ($row = $resultados->fetch_assoc()) {
                    $rows[] = $row;
                }
                return $rows;
            } else {

                return false;
            }
        }
}
