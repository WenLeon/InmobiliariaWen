<?php
include '../DataSource/Conection.php';

class ViviendaModel
{


    private $tipo;
    private $zona;
    private $direccion;
    private $ndormitorios;
    private $tamano;
    private $extras;
    private $observaciones;
    private $id;
    private $foto;

    private $conn;
    const TABLA = "viviendas";

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


    function borrar($id)
    {
        $conn = $this->conn->conection();
        $sql = "DELETE  FROM " . self::TABLA . " WHERE id= ? ;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //---------------------------------------------------------------------------------------//
    // ACTUALIZAR

    public function actualizar()
    {
        try {
            $sql = "UPDATE " . self::TABLA . " SET tipo= :tipo, zona= :zona, direccion= :direccion, ndormitorios= :ndormitorios, precio= :precio, tamano= :tamano, extras= :extras , observaciones= :observaciones WHERE id = :id";

            $stmt = $this->conn->conection()->prepare($sql);
            $stmt->bindParam(':tipo', $this->tipo);
            $stmt->bindParam(':zona', $this->zona);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':ndormitorios', $this->ndormitorios);
            $stmt->bindParam(':precio', $this->precio);
            $stmt->bindParam(':tamano', $this->tamano);
            $stmt->bindParam(':extras', $this->extras);
            $stmt->bindParam(':observaciones', $this->observaciones);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            echo "Se ha actualizado la vivienda <br/>";
        } catch (PDOException $e) {
            echo "Conexión fallida" . $e->getMessage();
            die();
        }
    }

    public function crearVivienda()
    {
        try {
            $sql = "INSERT INTO " . self::TABLA . " (tipo, zona, direccion, ndormitorios, precio, tamano, extras,observaciones) 
                VALUES (:tipo, :zona, :direccion, :ndormitorios, :precio, :tamano, :extras, :observaciones)";
            $stmt = $this->conn->conection()->prepare($sql);

            $stmt->bindParam(':tipo', $this->tipo);
            $stmt->bindParam(':zona', $this->zona);
            $stmt->bindParam(':direccion', $this->direccion);
            $stmt->bindParam(':ndormitorios', $this->ndormitorios);
            $stmt->bindParam(':precio', $this->precio);
            $stmt->bindParam(':tamano', $this->tamano);
            $stmt->bindParam(':extras', $this->extras);
            $stmt->bindParam(':observaciones', $this->observaciones);
            $stmt->execute();
    
            $consulta = "SELECT id FROM viviendas order by id desc limit 1 ";
            $stmt1 = $this->conn->conection()->prepare($consulta);
            $stmt1->execute();
            $registro = $stmt1->fetch(PDO::FETCH_ASSOC);

            if($registro['id'] != null){
            $sql = "INSERT INTO fotos (id_vivienda, foto) 
            VALUES (:id_vivienda, :foto)";
            $stmt = $this->conn->conection()->prepare($sql);
            $stmt->bindParam(':id_vivienda',$registro['id'] );
            $stmt->bindParam(':foto', $this->foto);
            $stmt->execute();
         }
                
            
        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
            die();
        }
    }



    public function obtenerPorFiltro($tipo_vivienda, $zona, $dormitorios, $precio, $extras)
    {
        $conn = $this->conn->conection();
        $sql = "SELECT * FROM viviendas WHERE 1=1";

        if (!empty($tipo_vivienda)) {
            $sql .= " AND tipo = :tipo_vivienda";
        }
        if (!empty($zona)) {
            $sql .= " AND zona = :zona";
        }
        if (!empty($dormitorios)) {
            $sql .= " AND ndormitorios = :dormitorios";
        }
        if (!empty($extras)) {
            $sql .= " AND extras = :extras";
        }

        //Buscar por precio 
        if (!empty($precio)) {
            if ($precio == "1") {   
                $sql .= " AND precio < :precioMenor";
        
            } else if ($precio == "2") {
                $sql .= " AND precio BETWEEN :precioMenor AND :precioMayor";
            } else if ($precio == "3") {
                $sql .= " AND precio BETWEEN :precioMenor AND :precioMayor";
            } else if ($precio == "4") {
                $sql .= " AND precio > :precioMayor";
            }
        }

        $stmt = $conn->prepare($sql);

        if (!empty($tipo_vivienda)) {
            $stmt->bindParam(':tipo_vivienda', $tipo_vivienda, PDO::PARAM_STR);
        }
        if (!empty($zona)) {
            $stmt->bindParam(':zona', $zona, PDO::PARAM_STR);
        }
        if (!empty($dormitorios)) {
            $stmt->bindParam(':dormitorios', $dormitorios, PDO::PARAM_INT);
        }
        if (!empty($extras)) {
            if($extras="Piscina"){
            $stmt->bindParam(':extras', $extras, PDO::PARAM_STR);
            }else if($extras="Jardín"){
                $stmt->bindParam(':extras', $extras, PDO::PARAM_STR);
            }else if($extras="Garage"){
                $stmt->bindParam(':extras', $extras, PDO::PARAM_STR);
            }
        }

        $precio1=100000;
        $precio2=200000;
        $precio3=300000;
        if (!empty($precio)) {
            if ($precio == 1) {
                $stmt->bindParam(':precioMenor', $precio1, PDO::PARAM_INT);
            } else if ($precio == "2") {
                $stmt->bindParam(':precioMenor', $precio1, PDO::PARAM_INT);
                $stmt->bindParam(':precioMayor', $precio2, PDO::PARAM_INT);
            } else if ($precio == "3") {
                $stmt->bindParam(':precioMenor', $precio2, PDO::PARAM_INT);
                $stmt->bindParam(':precioMayor',  $precio3, PDO::PARAM_INT);
            } else if ($precio == "4") {
                $stmt->bindParam(':precioMayor',  $precio3, PDO::PARAM_INT);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}










// Funcion creando el id de la vivienda 
// public function crearVivienda()
//     {
//         try {
//             $sql = "INSERT INTO " . self::TABLA . " (id, tipo, zona, direccion, ndormitorios, precio, tamano, extras) 
//                 VALUES (:id, :tipo, :zona, :direccion, :ndormitorios, :precio, :tamano, :extras)";
//             $stmt = $this->conn->conection()->prepare($sql);
//             $stmt->bindParam(':id', $this->id);
//             $stmt->bindParam(':tipo', $this->tipo);
//             $stmt->bindParam(':zona', $this->zona);
//             $stmt->bindParam(':direccion', $this->direccion);
//             $stmt->bindParam(':ndormitorios', $this->ndormitorios);
//             $stmt->bindParam(':precio', $this->precio);
//             $stmt->bindParam(':tamano', $this->tamano);
//             $stmt->bindParam(':extras', $this->extras);
//             $stmt->execute();

//             //$id_vivienda = $this->conn->conection()->lastInsertId();

//             if (isset($this->id)) {
//                 $sql = "INSERT INTO fotos (id_vivienda, foto) 
//                 VALUES (:id_vivienda, :foto)";
//                 $stmt = $this->conn->conection()->prepare($sql);
//                 $stmt->bindParam(':id_vivienda', $this->id);
//                 $stmt->bindParam(':foto', $this->foto);
//                 $stmt->execute();
//             }
//         } catch (PDOException $e) {
//             echo "Conexión fallida: " . $e->getMessage();
//             die();
//         }
//     }
// ------------------------Pruebas en el modelo ----------------------------

// $vivienda = new ViviendaModel();
// echo '<pre>';
// print_r($vivienda->obtenerPorFiltro('Piso','','','',''));
// echo '</pre>';

// $vivienda =new ViviendaModel();
// $vivienda->crearVivienda(333,'Piso','Centro','Amsterdam',3,3000,3003,'Garage');


//  $vivienda= new ViviendaModel();
//  $vivienda->borrar(300);
// $vivienda= new ViviendaModel();


// $vivienda->__set('tipo','Piso');
// $vivienda->__set('zona', 'Centro');
// $vivienda->__set('direccion', 'suerte');
// $vivienda->__set('ndormitorios', 3);
// $vivienda->__set('precio', 434343);
// $vivienda->__set('tamano', 3);
// $vivienda->__set('extras','Garage');
// $vivienda->__set('observaciones',"holis");
// $vivienda->__set('id',400);
// $vivienda->actualizar();