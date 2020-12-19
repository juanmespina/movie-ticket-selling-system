<?php
require_once '../db/Database.php';
class Funcion
{
    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }
    function selectFuncionFechaSala($idSala, $fFuncion)
    {
        $sql = "SELECT * FROM funcion WHERE (funcion.fecha='$fFuncion' AND funcion.sala_id='$idSala') AND funcion.activo=1";
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

    function insertFuncion($idSala, $fFuncion, $hInicial, $hFinal, $idPelicula)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "INSERT INTO funcion(inicio,final,activo,fecha,sala_id,pelicula_id) VALUES ('$hInicial',
        '$hFinal',1,'$fFuncion','$idSala','$idPelicula')";
        if ($this->bd->query($sql)) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function selectFunciones()
    {
        $sql = "SELECT funcion.id, funcion.inicio,funcion.final,funcion.fecha,sala.nombre as sala ,pelicula.titulo FROM funcion INNER JOIN sala ON sala.id=funcion.sala_id 
        INNER JOIN pelicula ON pelicula.id = funcion.pelicula_id WHERE funcion.activo=1 ORDER BY funcion.fecha ASC, funcion.inicio ASC";
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
    function updateFuncionActiva($idFuncion)
    {

        $this->bd->autocommit(false);
        $this->bd->begin_transaction();

        $sql = "UPDATE funcion SET funcion.activo=0 WHERE funcion.id='$idFuncion'";

        if ($this->bd->query($sql)) {

            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function selectFuncionesPelicula()
    {
        $sql = "SELECT funcion.id, funcion.inicio,funcion.final,funcion.fecha,sala.nombre as sala ,pelicula.titulo,pelicula.director,pelicula.productor,pelicula.distribuidora,pelicula.sinopsis,pelicula.img,pelicula.codigo, pelicula.ano,rating.rating,rating.id as idRating,genero.genero,genero.id as idGenero,formato.formato,formato.id as idFormato, idioma.idioma,idioma.id as idIdioma FROM funcion INNER JOIN sala ON sala.id=funcion.sala_id INNER JOIN pelicula ON pelicula.id = funcion.pelicula_id INNER JOIN genero ON genero.id=pelicula.genero_id INNER JOIN rating ON rating.id=pelicula.rating_id INNER JOIN formato ON formato.id= pelicula.formato_id INNER JOIN idioma ON idioma.id=pelicula.idioma_id WHERE funcion.activo=1";
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
    function selectPeliculasFuncionActiva($idPelicula)
    {
        $sql = "SELECT funcion.inicio,funcion.id AS idFuncion,funcion.final,funcion.fecha,sala.nombre,sala.id AS IdSala FROM funcion INNER JOIN pelicula ON pelicula.id= 
        funcion.pelicula_id INNER JOIN sala ON sala.id= funcion.sala_id WHERE pelicula.id='$idPelicula' AND funcion.activo=1";
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

    function selectBoletoFuncion($idFuncion)
    {
        $sql = "SELECT boleto.butaca_id AS idButaca FROM boleto WHERE boleto.funcion_id='$idFuncion'";
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

    function selectPrecio()
    {
        $sql = "SELECT * FROM precio WHERE precio.activo=1";
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

    function selectFuncionesId($idFuncion)
    {
        $sql = "SELECT funcion.id, funcion.inicio,funcion.final,funcion.fecha,sala.nombre as sala ,pelicula.titulo FROM funcion INNER JOIN sala ON sala.id=funcion.sala_id 
        INNER JOIN pelicula ON pelicula.id = funcion.pelicula_id WHERE funcion.activo=1 AND funcion.id='$idFuncion'";
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
