<?php
include_once '../DataSource/Conection.php';
include_once '../Models/Login.php';
// include_once '../Models/Pagination.php';

class Controller
{


    function loginController()
    {
        if (isset($_POST['ingresar'])) {
            include '../Index.php';
            $user = $_POST['username'];
            $pssw = $_POST['password'];

            $admin = new Login();
            $admin->login($user, $pssw);


            // header("Location:../Index.php?");
        }
    }

    // function controladorPagination() {

    //     $pagination = new Pagination();
    //     $registro = $pagination->getData($_GET['page'] ?? 1);
    //     // header("Location:../Views/Listado.php?");

    //   }


    function cerrarSesion()
    {
        session_start();
        // Destruir sesión y redirigir a la página de inicio de sesión
        session_destroy();
        header('Location:../Index.php');
        exit;
    }
}


$controladorLogin = new Controller();
$controladorLogin->loginController();



// $pag= new Controller();
// $pag->controladorPagination();
