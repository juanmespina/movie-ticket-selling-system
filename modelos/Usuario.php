<?php
require_once '../db/Database.php';

class Usuario
{

    public $bd;
    function __construct()
    {
        $this->bd = Database::connection();
    }

    function selectUsuario($usuario, $clave)
    {
        $sql = "SELECT * FROM usuario WHERE usuario.username='$usuario' AND usuario.contrasena='$clave' AND usuario.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function selectUsuarioCedula($cedula)
    {
        $sql = "SELECT * FROM usuario  WHERE usuario.cedula='$cedula' AND usuario.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function selectUsuarioUsername($usuario)
    {
        $sql = "SELECT * FROM usuario  WHERE usuario.cedula='$usuario' AND usuario.activo=1";
        $resultado = $this->bd->query($sql);
        return $resultado->fetch_assoc();
    }
    function insertUsuario($nombre, $apellido, $cedula, $usuario, $contrasena, $email)
    {
        $this->bd->autocommit(false);
        try {
            $sql = "INSERT INTO usuario(nombre,apellido,cedula,username,email,contrasena,activo,nivel_usuario_id)VALUES ('$nombre','$apellido','$cedula','$usuario','$email','$contrasena',1,2)";
            $resultado = $this->bd->query($sql);
            $this->bd->commit();
            return $resultado;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function updateContrasena($contrasenaNueva,$idUsuario,$cedula){
        try {
            $sql = "UPDATE usuario SET usuario.contrasena='$contrasenaNueva' WHERE usuario.id='$idUsuario'AND  usuario.cedula='$cedula'";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }

    function updateUsuarioActivo($idUsuario,$cedula)
    {
        try {
            $sql = "UPDATE usuario SET usuario.activo=0 WHERE usuario.id='$idUsuario' AND usuario.cedula='$cedula'";
            $this->bd->query($sql);
            $id = $this->bd->insert_id;
            $this->bd->commit();
            return true;
        } catch (Exception $e) {
            $this->bd->rollback();
            return false;
        }
    }
}
