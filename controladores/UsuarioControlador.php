<?php
require_once '../modelos/Usuario.php';

class UsuarioControlador
{
    function __construct()
    {
        session_start();
    }
    function iniciarSesion()
    {
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {

            // if (strlen(trim($_POST['usuario'])) > 3) {
            //     if (strlen(trim($_POST['clave'])) > 4) {
            $objeto = new Usuario();
            $existe = $objeto->selectUsuario($_POST['usuario'], $_POST['clave']);
            if (count($existe) > 0) {
                $_SESSION['cedula'] = $existe['cedula'];
                $_SESSION['nombre'] = $existe['nombre'];
                $_SESSION['apellido'] = $existe['apellido'];
                $_SESSION['idusuario'] = $existe['id'];
                $_SESSION['nivel'] = $existe['nivel_usuario_id'];
                echo json_encode($existe);
            } else {
                echo "Usuario o contrasena errado";
            }
            //     } else {
            //         echo 'Recuerda que contrasena debe tener mas de 6 caracteres';
            //     }
            // } else {
            //     echo "Recuerda que usuario debe tener mas de tres letras";
            // }
        } else {

            echo "Error en los parametros enviados";
        }
    }
    function cerrarSesion()
    {

        if (isset($_POST['cedula']) && isset($_POST['idusuario'])) {
            unset($_SESSION);
            unset($_COOKIE);
            session_destroy();
            echo true;
        } else {

            echo "Error al cerrar sesion";
        }
    }
    function crearUsuario()
    {
        if (isset($_POST['apellido']) && isset($_POST['nombre']) && isset($_POST['cedula']) && isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['clave'])) {
            if (strlen(trim($_POST['nombre'])) > 2 && strlen(trim($_POST['apellido'])) > 2) {
                if (strlen(trim($_POST['cedula'])) >= 7 && strlen(trim($_POST['cedula'])) <= 11) {
                    if (strlen(trim($_POST['usuario'])) >= 4 && strlen(trim($_POST['usuario'])) <= 16) {
                        $objeto = new Usuario();
                        if (count($objeto->selectUsuarioCedula($_POST['cedula'])) == 0) {
                            if (count($objeto->selectUsuarioUsername($_POST['usuario'])) == 0) {
                                $resultado = $objeto->insertUsuario($_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['usuario'], $_POST['clave'], $_POST['email']);
                                if ($resultado != false) {
                                    echo true;
                                } else {

                                    echo "Error al crear Usuario";
                                }
                            } else {

                                echo "Ya existe un usuario con el mismo nombre de usuario";
                            }
                        } else {

                            echo "Ya existe un usuario con la cedula registrada";
                        }
                    } else {

                        echo 'Usuario debe tener de 4 a 11 caracteres';
                    }
                } else {

                    echo 'Cedula debe tener de 7 a 11 caracteres';
                }
            } else {

                echo "Nombre y apellido no tienen caracteres";
            }
        } else {

            echo "Error en los parametros enviados. ";
        }
    }

    function buscarUsuario()
    {

        if (isset($_SESSION['idusuario']) && isset($_POST['cedula'])) {
            $objeto = new Usuario();
            $arreglo = $objeto->selectUsuarioCedula($_POST['cedula']);
            if (count($arreglo) > 0) {
                $_SESSION['usuarioBuscado'] = $arreglo;
                echo json_encode($arreglo);
            } else {

                echo 'Usuario no registrado';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }


    function desactivarUsuario()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['cedula'])) {
            $objeto = new Usuario();
            if ($objeto->updateUsuarioActivo($_SESSION['idusuario'],$_SESSION['cedula'])) {
                echo true;
            } else {

                echo 'No se pudo desactivar el usuario';
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }

    function actualizarContrasena()
    {
        if (isset($_SESSION['idusuario']) && isset($_SESSION['cedula']) && isset($_POST['contrasenaNueva']) && isset($_POST['contrasenaVieja'])) {
            $objeto = new Usuario();
            $arreglo = $objeto->selectUsuarioCedula($_SESSION['cedula']);
            if (count($arreglo) > 0) {
                if ($_POST['contrasenaVieja'] == $arreglo['contrasena']) {
                    if (strlen(trim($_POST['contrasenaNueva'])) >= 4 && strlen(trim($_POST['contrasenaNueva'])) <= 16) {
                        if ($objeto->updateContrasena($_POST['contrasenaNueva'], $_SESSION['idusuario'], $_SESSION['cedula'])) {
                            echo 'Clave actualizada correctamente';
                        } else {
                            echo 'La clave no pudo ser actualizada';
                        }
                    } else {
                        echo 'La clave debe tener entre 4 y 16 caracteres';
                    }
                } else {

                    echo 'La clave actual esta errada';
                }
            } else {
            }
        } else {

            echo 'Error al enviar parametros';
        }
    }
}
