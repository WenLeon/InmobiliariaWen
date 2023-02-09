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
    <title>Busca una vivienda</title>
    <link rel="stylesheet" href="../index.css">
    <style>
        #contenedor {
            width: 100%;
            height: 100vh;
            background-image: url('Views/imagenes/inmobiliaria.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .formulario {
            width: 80%;
            height: 80vh;
            background-color: lightblue;
            padding: 30px;
            display: flex;
            align-items: center;
        }

        .pintarVivienda {
            width: 80%;
            height: 80%;
            background-color: red;
        }

        .contenido {
            width: 60%;
            height: 80%;
            background-color: blue;
        }
    </style>
</head>

<body>
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
    <div id="contenedor">
        <div class="formulario">
            <div class="contenido">

                <form action="" method="post">
                    <!----------------- Tipo de vivienda ---------------->
                    <label for="tipo_vivienda">Tipo de Vivienda:</label>
                    <select name="tipo" id="tipo">
                        <option value="">Selecciona una opción</option>
                        <option value="piso">Piso</option>
                        <option value="chalet">Chalet</option>
                        <option value="adosado">Adosado</option>
                        <option value="casa">Casa</option>
                    </select>

                    <br><br>

                    <!------------------ Zona ----------------------------->
                    <label for="zona">Zona:</label>
                    <select name="zona" id="zona">
                        <option value="">Selecciona una opción</option>
                        <option value="centro">Centro</option>
                        <option value="norte">Norte</option>
                        <option value="este">Este</option>
                        <option value="oeste">Oeste</option>
                    </select>

                    <br><br>
                    <!------------------ Dormitorio-------------------------->
                    <label>Número de dormitorios:</label>
                    <input type="radio" name="dormitorios" value="1">1
                    <input type="radio" name="dormitorios" value="2">2
                    <input type="radio" name="dormitorios" value="3">3
                    <input type="radio" name="dormitorios" value="4">4
                    <input type="radio" name="dormitorios" value="5">5 o más
                    <br><br>
                    <!----------------------- Precio ------------------------->
                    <label>Precio:</label>
                    <input type="radio" name="precio" value="1">&lt; 100.000
                    <input type="radio" name="precio" value="2">100.000-200.000
                    <input type="radio" name="precio" value="3">200.000-300.000
                    <input type="radio" name="precio" value="4">&gt; 300.000
                    <br><br>

                

                    <input type="submit" value="Buscar vivienda" name="buscar">

                </form>
            </div>

            <div class="pintarVivienda">
                <?php 
                foreach($resultado as $key => $value){
                    echo "$key";
                }
                ?> 
            </div>
        </div>

    </div>
    <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
</body>

</html>