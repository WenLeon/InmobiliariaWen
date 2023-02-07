<?php
include_once '../DataSource/Conection.php';
include_once '../Models/Login.php';
// include_once '../Models/Pagination.php';

class loginController
{
    function login()
    {
        if (isset($_POST['ingresar'])) {
            require_once '../Index.php';
            $user = $_POST['username'];
            $pssw = $_POST['password'];
            $admin = new Login();
            $admin->login($user, $pssw);
        }
    }

}


$controladorLogin = new loginController();
$controladorLogin->login();



// $pag= new Controller();
// $pag->controladorPagination();
