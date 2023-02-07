<?php
include '../Models/UserModel.php';
class userController
{
    //Funcion Crear usuario 
    function CreateUserController()
    {
        if (isset($_POST['enviar'])) {
            include '../Views/UserView.php';

            //Funcion str_shuffle devuelve un aleatorio de una cadena 
            $passw = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
            echo $passw;
            $password_cifrada = password_hash($passw,PASSWORD_DEFAULT);
            $user = new UserModel();
            $user->id_usuario = $_POST['id_usuario'];
            $user->password = $password_cifrada;

            if ($user->crear() == true) {
                $msg = "Se ha creado el usuario correctamente";
                header("Location:../Views/userView.php?msg=$msg </br> Su contraseña es : $passw");
            } else {
                $msg = "No se ha podido crear el usuario";
                header("Location:../Views/userView.php?msg=$msg");
            }
        }
    }

    // Funcion borrar usuario 
    function deleteUser()
    {
        if (isset($_POST['borrar'])) {
            $borrarUser = new UserModel();
            $borrarUser->id_usuario = $_POST['id_usuario'];
            $borrarUser->borrar($_POST['id_usuario']);
            header("Location:../Views/ListadoUsuario.php?msg=se ha creado");
        }
    }
}

$crearUser = new userController();
$crearUser->CreateUserController();

$deleteUser = new userController();
$deleteUser->deleteUser();
