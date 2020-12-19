<?php
require_once '../db/Database.php';
class Sala
{
    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }
    function crearSala($nroSala, $nroFilas, $nroColumnas, $letraFila)
    {
        $exito = false;
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $contadorButaca = 0;
        $sql = "INSERT INTO sala(nombre,columnas,filas,activo) VALUES ('$nroSala','$nroColumnas','$nroFilas',1)";
        $exito = $this->bd->query($sql);
        $idSala = $this->bd->insert_id;

        if ($exito) {
            for ($j = 0; $j < ($nroColumnas * $nroFilas); $j++) {
                $contadorButaca++;
                $sql3 = "INSERT INTO butaca(nombre,activo,sala_id) VALUES ('$contadorButaca',1,'$idSala')";
                $exito = $this->bd->query($sql3);
                if ($exito == false) {
                    $this->bd->rollback();
                    return false;
                    die();
                }
            }
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
            die();
        }
    }
    function selectSalas()
    {
        $sql = "SELECT sala.id,sala.nombre,sala.columnas,sala.filas FROM sala  WHERE sala.activo=1 ";
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
    function updateSalaActiva($idSala)
    {

        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        try {
            $sql = "UPDATE sala SET sala.activo=0 WHERE sala.id='$idSala'";
            $this->bd->query($sql);
            $sql2 = "UPDATE butaca SET butaca.activo=0 WHERE butaca.sala_id='$idSala'";
            $this->bd->query($sql2);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function selectSalaButacaId($idSala)
    {
        $sql = "SELECT sala.id,sala.columnas,sala.filas,sala.nombre AS salaNombre,butaca.id AS idButaca,butaca.nombre AS butaNombre
        FROM sala INNER JOIN butaca ON butaca.sala_id=sala.id WHERE sala.id='$idSala' AND sala.activo=1";
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

//Hay que moverlas mas adelante
  
}
