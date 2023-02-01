<?php
include_once '../DataSource/Conection.php';

class Login
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conection;
    }


    //Login de usuario
    function login($usuario, $clave)
    {

        try {
            $conn = $this->conn->conection();
            $sql = "SELECT password FROM usuarios where  id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $usuario);
            $stmt->execute();
            $contra = $stmt->fetch(PDO::FETCH_ASSOC);


            $clave = password_hash($clave, PASSWORD_DEFAULT);

            if ($contra['password'] != null) {

                if (password_verify($contra['password'], $clave)) {
                    $_SESSION['usuario'] = $usuario;
                    $msg = "es correcto";
                    header("Location:../Views/Listado.php?msg=$msg");
                } else {
                    $msg = "Contraseña mal introducida";
                    header("Location:../index.php?msg=$msg");
                }
            } else {
                $msg = "Id de usuario o usuario mal introducido";
                header("Location:../index.php?msg=$msg");
            }
        } catch (PDOException $e) {
            die("Error:" . $e->getMessage());
        }
    }
}

// $admin= new login();
// $admin->login("admin","1234");