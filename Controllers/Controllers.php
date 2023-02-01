<?php
include_once '../DataSource/Conection.php';
include_once '../DataSource/Crud_inmobiliaria.php';
include_once '../Models/Login.php';


class controllers
{

//------------------------------------------------------------
//Funcion comprobar login 
    function comprobarLogin()
    {
        include '../Index.php';

        if (isset($_POST['ingresar'])) {
         echo"hollaaaaaaaaslldkalskdsa";
            $user= $_POST['username'];
            $pssw=$_POST['password'];

            $admin = new Login();
            $admin->login($user,$pssw);
            echo"aqui estoy ";
        }
    }

//------------------------------------------------------------
//Funcion paginacion 
    function paginacion(){

    }
}

$login= new controllers();
$login->comprobarLogin();

