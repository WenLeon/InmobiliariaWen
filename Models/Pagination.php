<?php
include "../DataSource/Conection.php";

class Pagination
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Conection;   
    }

    public function getData($page = 1)
    {


        $pagination =
            "SELECT viviendas.id, viviendas.tipo, viviendas.zona, viviendas.ndormitorios, viviendas.tamano, viviendas.precio, fotos.foto FROM viviendas LEFT JOIN fotos ON viviendas.id = fotos.id_vivienda order by viviendas.fecha_anuncio DESC;";
        $stmt = $this->conn->conection()->prepare($pagination);
        $stmt->execute();
        $num_elementos = $stmt->rowCount();
        $num_ele = 5;
        $num_paginas = ceil($num_elementos / $num_ele);

        $offset = ($page - 1) * $num_ele;

        $pagination2 = "SELECT viviendas.id, viviendas.tipo, viviendas.zona, viviendas.ndormitorios, viviendas.tamano, viviendas.precio, fotos.foto FROM viviendas LEFT JOIN fotos ON viviendas.id = fotos.id_vivienda order by viviendas.fecha_anuncio DESC LIMIT " . $offset . "," . $num_ele;
        $stmt2 = $this->conn->conection()->query($pagination2);
        $stmt2->execute();
        $registro = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        return $registro;
    }

    public function getPagination()
    {

        $pagination = "SELECT viviendas.id, viviendas.tipo, viviendas.zona, viviendas.ndormitorios, viviendas.tamano, viviendas.precio, fotos.foto FROM viviendas LEFT JOIN fotos ON viviendas.id = fotos.id_vivienda order by viviendas.fecha_anuncio DESC;";
        $stmt = $this->conn->conection()->prepare($pagination);
        $stmt->execute();
        $num_elementos = $stmt->rowCount();
        $num_ele = 5;
        $num_paginas = ceil($num_elementos / $num_ele);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        echo '<div class="pagination">';
        echo "<a href='?page=1'>Inicio</a>";
        echo '<br/>';
        for ($i = 1; $i <= $num_paginas; $i++) {
            if ($i == $page) {
                echo '<a href="?page=' . $i . '" class="active">' . $i . '</a>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }
        echo "<a href='?page=" . $num_paginas . "'>Fin</a>";
        echo '</div>';
        echo '<br/>';
    }
}



//Linea que va dentro de get data 
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
//   } else {
//     $page = 1;
//   }


// function printPagination($pagination, $registro)
// {
//         if (count($registro) > 0) {
        
//           echo "<table>
//           <thead>
//               <tr>";
//           $headers = array_keys($registro[0]);
//           foreach ($headers as $header) {
//               echo "<th>" . ucfirst($header) . "</th>";
//           }
//           echo "<th>Acciones</th>
//               </tr>
//           </thead>
//           <tbody>";
//           foreach ($registro as $fila) {
//               echo "<tr>";
//               foreach ($fila as $key => $valor) {
//                   if ($key == "foto") {
//                       echo "<td><a href='/Proyectos_2/InmobiliariaW/Views/imagenes/fotos/" . $valor . "'>" . $valor . "</a></td>";
//                   } else {
//                       echo "<td>" . $valor . "</td>";
//                   }
//               }
//               echo "<td><button><a href='borrar.php?id=" . $fila['id'] . "'>Borrar</a></button>";
//               echo "<button><a href='modificar.php?id=" . $fila['id'] . "'>Modificar</a></button></td>";
//               echo "</tr>";
//           }
//           echo "
//               </tbody>
//           </table>
//           ";
//         }
    
//     //Pintar los botones de la paginacion 
//     $pagination->getPagination();
// }


  
//Prueba de paginacion en el modelo 
//   $pagination = new Pagination();
//   $registro = $pagination->getData($_GET['page'] ?? 1);
//   printPagination($pagination, $registro);
