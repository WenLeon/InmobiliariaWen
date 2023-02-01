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
            $user= $_POST['username'];
            $pssw=$_POST['password'];
            $admin = new Login();
            $admin->login($user,$pssw);
        }
    }

//------------------------------------------------------------
//Funcion paginacion 
    function paginacion(){

    }
}

$login= new controllers();
$login->comprobarLogin();

