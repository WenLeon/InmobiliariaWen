<?php
include_once '../DataSource/Conection.php';

class UserModel
{
    private $id_usuario;
    private $conn;
    const TABLA = "usuarios";

    public function __construct()
    {
        $this->conn = new Conection;
    }
    public function __get($property)
    {  
        return $this->$property;
    }
    public function __set($property, $value)
    {
            $this->$property = $value;
    }

    public function crear()
    {

        try {
            // Consulta para comprobar si el dato ya existe en la tabla
            $sql = "SELECT COUNT(*) as total FROM " . self::TABLA . " WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->conection()->prepare($sql);
            $stmt->bindParam(':id_usuario', $this->id_usuario);
            $stmt->execute();
            $resultado = $stmt->fetch();

            // Si el resultado es mayor a 0, significa que el dato ya existe
            if ($resultado['total'] > 0) {
                // Lanzar enunciado
             return false;
            } else {
                // //Funcuin str_shuffle devuelve un aleatorio de una cadena 
                // $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
                // $password_cifrada = password_hash($password, PASSWORD_DEFAULT);

                $sql   = "INSERT INTO " . self::TABLA . " (id_usuario, password) VALUES (:id_usuario, :password)";
                $stmt = $this->conn->conection()->prepare($sql);
                $stmt->bindParam(':id_usuario', $this->id_usuario);
                $stmt->bindParam(':password', $this->password);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo "Conexión fallida" . $e->getMessage();
            die();
        }
    }


    function borrar($id)
	{
		$conn = $this->conn->conection();
		$sql = "DELETE  FROM " . self::TABLA . " WHERE id_usuario= ? ;";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $id);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}
 