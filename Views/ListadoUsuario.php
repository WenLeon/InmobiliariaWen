<?php
session_start();
// Comprobamos si no existe el usuario, lo redirigimos al index 
if (!isset($_SESSION['usuario'])) {
    header("Location:../Index.php");
    exit();
}
?>
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
            background-image: url('../Views/imagenes/inmobiliaria.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center
        }


        .tabla {
            width: 80%;
            height: 80%;
            background-color: lavenderblush;
        }

        .botones {
            width: 80px;
        }
    </style>

</head>

<body>

    <div>
        <?php
        include '../Models/UserModelListado.php';

        $pagination = new Pagination('usuarios');
        $registro = $pagination->getData($_GET['page'] ?? 1);

        if (count($registro) > 0) {
        ?>
             <!-- ------------------------------------------------------------------------------------ -->
        <!-- Todo el header -->
        <header>
                <h2>Inmobiliaria Espacio ideal</h2>
                <div class="encabezado">
                    <span>Bienvenido: <?php echo $_SESSION['usuario'] ?? '' ?></span>
                    <span> <a href="../Views/ListadoVivienda.php">Inicio</a></span>
                    <span> <a href="../Views/insertarVivienda.php">Insertar vivienda</a></span>
                    <span> <a href="../Views/buscarVivienda.php">Buscar vivienda</a></span>

                    <!-- Bonton de gestion de usuarios solo para el admin  -->
                    <?php
                    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == "admin") {
                        echo '<span> <a href="../Views/UserView.php">Añadir un nuevo usuario</a></span>';
                        echo '<span> <a href="../Views/ListadoUsuario.php">Borrar un usuario</a></span>';
                    } ?>
                    <!-- Bonton de ultima desconexion  -->
                    <span>Última conexión: <?php echo $_COOKIE['lastLogin'] ?? '' ?></span>
                    <!-- Boton de cerrar session  -->
                    <button><a href="../Models/logout.php">Cerrar sesion</a></button>
                </div>
            </header>
            <!-- ------------------------------------------------------------------------------------ -->
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

                                        echo "<td>" . $valor . "</td>";
                                    }
                                    ?>
                                    <td class="botones">
                                        <?php

                                        if ($fila['id_usuario'] != 'admin') {
                                            echo "<form action='../Controllers/userController.php' method='post'>
                                            <input type='hidden' name='id_usuario' value='" . $fila['id_usuario'] . "'>"
                                            ?>
                                                  <input type="submit" value="Borrar" name="borrar">
                                        </form>
                                        <?php }
                                        ?>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php $pagination->getPagination(); ?>
                </div>
            </div>
            <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span></footer>

</body>

</html>