<?php 
include_once 'Conection.php';

class Crud_inmobiliaria {
    private $conn;
	private $tabla;

	// //---------------------------------------------------------------------------------------//
	// Contructor 
	function __construct($tabla)
	{
		$this->tabla = $tabla;
		$this->conn =new Conection;
	}
	//---------------------------------------------------------------------------------------//\
	// Metodo para obtener todas las filas de una tabla 
	public function obtieneTodos()
	{
		// Realizar una consulta preparada que devuelva todos los
		// registros de la tabla asignada a la propiedad $tabla
		// como un objeto (usar FETCH_OBJ)
		$conn = $this->conn->conection();
		$stmt = $conn->prepare("SELECT * FROM $this->tabla");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

        //---------------------------------------------------------------------------------------//
        // Metodo para obtener por id 
        function obtieneDeID($id)
        {
            // Realizar una consulta preparada que devuelva el registro
            // de la tabla asignada a la propiedad $tabla cuyo id coincida
            // con el id que se ha recibido como parámetro
			$conn = $this->conn->conection();
            $sql = "SELECT * FROM $this->tabla WHERE id = ? ;";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    
	//---------------------------------------------------------------------------------------//
	// Metodo para borrar una fila 
	// public function eliminar($id)
	// {

	// 	$sql = $this->conexion->query("DELETE FROM $this->tabla WHERE id = '$id'");
	// 	return $sql ->fetchAll(PDO::FETCH_OBJ);
	// }

	function borrar($id)
	{
		$conn = $this->conn->conection();
		$sql = "DELETE  FROM $this->tabla WHERE id= ? ;";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $id);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	//---------------------------------------------------------------------------------------//

}
	
	
