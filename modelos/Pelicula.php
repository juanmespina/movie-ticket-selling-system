<?php require_once '../db/Database.php';
class Pelicula
{
    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function selectRating()
    {
        $sql = "SELECT * FROM rating ";
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
    function selectFormato()
    {
        $sql = "SELECT * FROM formato ";
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
    function selectIdioma()
    {
        $sql = "SELECT * FROM idioma WHERE idioma.activo=1";
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
  

    function selectGenero()
    {
        $sql = "SELECT * FROM `genero` WHERE genero.activo=1 ORDER BY `genero`.`id` ASC";
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
    function selectGeneroGenero($genero)
    {
        $sql = "SELECT * FROM `genero` WHERE genero.genero='$genero'";
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
    function selectIdiomaIdioma($idioma)
    {
        $sql = "SELECT * FROM `idioma` WHERE idioma.idioma='$idioma'";
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
    function insertarPelicula($titulo, $idGenero, $idRating, $idIdioma, $idFormato, $director, $productor, $distribuidora, $codigo, $sinopsis, $rutaImg, $ano)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "INSERT INTO pelicula(titulo,director,productor,distribuidora,activo,sinopsis,rating_id,img,codigo,genero_id,ano,idioma_id,formato_id) VALUES ('$titulo',
        '$director',' $productor','$distribuidora',1,'$sinopsis','$idRating','$rutaImg','$codigo','$idGenero',$ano,'$idIdioma',$idFormato)";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function selectPeliculas()
    {
        $sql = "SELECT pelicula.id,pelicula.titulo,pelicula.director,pelicula.productor,pelicula.distribuidora,pelicula.sinopsis,pelicula.img,pelicula.codigo,
        pelicula.ano,rating.rating,rating.id as idRating,genero.genero,genero.id as idGenero,formato.formato,formato.id as idFormato, idioma.idioma,idioma.id as idIdioma FROM pelicula INNER JOIN genero ON genero.id=pelicula.genero_id INNER JOIN rating ON 
        rating.id=pelicula.rating_id INNER JOIN formato ON formato.id= pelicula.formato_id INNER JOIN idioma ON idioma.id=pelicula.idioma_id WHERE pelicula.activo=1";
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
    function selectPeliculasPorCodigo($codigo)
    {
        $sql = "SELECT * FROM pelicula WHERE pelicula.codigo='$codigo'";
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

    function updatePeliculaActiva($idPelicula)
    {

        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        try {
            $sql = "UPDATE pelicula SET pelicula.activo=0 WHERE pelicula.id='$idPelicula'";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function updatePelicula($titulo, $idGenero, $idRating, $idIdioma, $idFormato, $director, $productor, $distribuidora, $codigo, $sinopsis, $rutaImg, $ano, $idPelicula)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "UPDATE pelicula SET titulo='$titulo', director='$director' , productor=' $productor',  distribuidora='$distribuidora',
       sinopsis='$sinopsis',  rating_id='$idRating', img='$rutaImg', codigo='$codigo', genero_id = '$idGenero', idioma_id='$idIdioma',formato_id='$idFormato',ano='$ano' WHERE pelicula.id='$idPelicula'";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function insertarGenero($genero)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "INSERT INTO genero(genero,activo) VALUES ('$genero',1)";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function insertarIdioma($idioma)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "INSERT INTO idioma(idioma,activo) VALUES ('$idioma',1)";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function updateIdioma($idioma, $idIdioma)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "UPDATE idioma SET idioma='$idioma' WHERE idioma.id='$idIdioma'";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function updateGenero($genero, $idGenero)
    {
        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        $sql = "UPDATE genero SET genero='$genero' WHERE genero.id='$idGenero'";
        $exito = $this->bd->query($sql);
        if ($exito) {
            $this->bd->commit();
            return true;
        } else {
            $this->bd->rollback();
            return false;
        }
    }
    function updateGeneroActiva($idGenero)
    {

        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        try {
            $sql = "UPDATE genero SET genero.activo=0 WHERE genero.id='$idGenero'";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
    function updateIdiomaActivo($idIdioma)
    {

        $this->bd->autocommit(false);
        $this->bd->begin_transaction();
        try {
            $sql = "UPDATE idioma SET idioma.activo=0 WHERE idioma.id='$idIdioma'";
            $this->bd->query($sql);
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
  

    function selectPeliculaId($idPelicula)
    {
        $sql = "SELECT pelicula.id,pelicula.titulo,pelicula.director,pelicula.productor,pelicula.distribuidora,pelicula.sinopsis,pelicula.img,pelicula.codigo,
        pelicula.ano,rating.rating,rating.id as idRating,genero.genero,genero.id as idGenero,formato.formato,formato.id as idFormato, idioma.idioma,idioma.id as idIdioma FROM pelicula INNER JOIN genero ON genero.id=pelicula.genero_id INNER JOIN rating ON 
        rating.id=pelicula.rating_id INNER JOIN formato ON formato.id= pelicula.formato_id INNER JOIN idioma ON idioma.id=pelicula.idioma_id WHERE pelicula.id='$idPelicula'";
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
    function selectPeliculasFuncionActiva()
    {
        $sql = "SELECT pelicula.id,pelicula.titulo,pelicula.img,pelicula.id,pelicula.sinopsis,genero.genero,rating.rating FROM pelicula
         INNER JOIN funcion ON funcion.pelicula_id= pelicula.id INNER JOIN rating ON pelicula.rating_id= rating.id INNER JOIN
          genero ON pelicula.genero_id= genero.id WHERE pelicula.activo=1 AND funcion.activo=1 GROUP BY titulo";
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
