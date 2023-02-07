<?php



// SELECT * FROM viviendas
// INNER JOIN fotos ON viviendas.id = fotos.id_vivienda;


// / También insertamos las fotos...
//                 // Creamos un insert por cada foto
//                 if(!empty($_POST["foto_subida"][0])){ // Así evitamos que siempore inserte foto vacía
//                     for ($i = 0; $i < count($_POST["foto_subida"]); $i++) {
//                         $sql = "INSERT INTO fotos(id_vivienda, foto) VALUES (?,?)";
//                         $stmt = $this->conexion->prepare($sql);
//                         $stmt->bindParam(1, $_POST["id"]);
//                         $stmt->bindParam(2, $_POST["foto_subida"][$i]);
//                         $stmt->execute();
//                     }
//                 }
// HTML:
// <div>
//             <label for="direccion">DIRECCIÓN</label><br>
//             <input type="text" name="direccion" maxlength="100">
//         </div>