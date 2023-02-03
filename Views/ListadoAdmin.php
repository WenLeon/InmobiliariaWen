<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../index.css">
    <title>Listado viviendas</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FCD8D4;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .pagination a {
            text-decoration: none;
            color: black;
            padding: 8px 16px;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #B97A95;
            color: white;
        }

        .contenedor {
            width: 100%;
            height: 80vh;
            background-color: antiquewhite;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center
        }

      

        .encabezado {
            width: 100%;
            height: 8vh;
            background-color: lightsteelblue;
            text-align: left;
            font-size: medium;
            line-height: 30px;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }

     
        .tabla{
            width: 80%;
            height: 80%;
            background-color: #FCD8D4;
        }
     
      
    </style>

</head>

<body>

    <div>
        <?php
        include '../Models/Pagination.php';
        session_start();
        $pagination = new Pagination();
        $registro = $pagination->getData($_GET['page'] ?? 1);

        if (count($registro) > 0) {
        ?>
            <header>
                <h2>Inmobiliaria Espacio ideal</h2>
                <div class="encabezado">
                    <span>Bienvenido: <?php echo $_SESSION['usuario']; ?></span>
                       
                        <span> <a href="">Añadir un nuevo usuario</a></span>
                        <span>Última conexión: <?php echo $_COOKIE['ultimo_login']; ?></span>
                        <button><a href="../Models/logout.php">Desconectarse</a></button>
                </div>
            </header>
            <div class="contenedor">

                <div class="tabla">
                    <table>
                        <thead>
                            <tr>
                                <?php
                                $headers = array_keys($registro[0]);
                                foreach ($headers as $header) {
                                    echo "<th>" . ucfirst($header) . "</th>";
                                }
                                ?>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($registro as $fila) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($fila as $key => $valor) {
                                        if ($key == "foto") {
                                            echo "<td><a href='/Proyectos_2/InmobiliariaW/Views/imagenes/fotos/" . $valor . "'>" . $valor . "</a></td>";
                                        } else {
                                            echo "<td>" . $valor . "</td>";
                                        }
                                    }
                                    ?>
                                    <td>
                                        <button>
                                            <a href='borrar.php?id=<?php echo $fila['id']; ?>'>Borrar</a>
                                        </button>
                                        <button>
                                            <a href='modificar.php?id=<?php echo $fila['id']; ?>'>Modificar</a>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php $pagination->getPagination(); ?>
                </div>
            </div>
            <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span></footer>
        <?php
        } else {
            echo "No se encontraron registros";
        }
        ?>

    </div>

</body>

</html>