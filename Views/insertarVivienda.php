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
    <title>Insertar vivienda</title>
    <link rel="stylesheet" href="../index.css">
    <style>
        #contenedor {
            width: 100%;
            height: 100vh;
            background-color: lightcoral;
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

                <form action="../Controllers/viviendaController.php" method="post">

                

                    <label for="tipo">Tipo de Vivienda:</label>
                    <select name="tipo" id="tipo">
                        <option value="piso">Piso</option>
                        <option value="chalet">Chalet</option>
                        <option value="adosado">Adosado</option>
                        <option value="casa">Casa</option>
                    </select>

                    <br><br>


                    <label for="zona">Zona:</label>
                    <select name="zona" id="zona">
                        <option value="centro">Centro</option>
                        <option value="norte">Norte</option>
                        <option value="este">Este</option>
                        <option value="oeste">Oeste</option>
                    </select>

                    <br><br>

                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" pattern="[aA-zZ 0-9]{1,100}" required>

                    <br><br>

                    <label>Número de dormitorios:</label>
                    <input type="radio" id="dormitorios1" name="dormitorios" value="1" required>
                    <label for="dormitorios1">1</label>

                    <input type="radio" id="dormitorios2" name="dormitorios" value="2">
                    <label for="dormitorios2">2</label>

                    <input type="radio" id="dormitorios3" name="dormitorios" value="3">
                    <label for="dormitorios3">3</label>

                    <input type="radio" id="dormitorios4" name="dormitorios" value="4">
                    <label for="dormitorios4">4</label>

                    <input type="radio" id="dormitorios5" name="dormitorios" value="5 o más">
                    <label for="dormitorios5">5 o más</label>

                    <br><br>

                    <label>Precio:</label>
                    <input type="number" name="precio" id="precio"  required>

                    <br><br>

                    <label for="tamano">Tamaño:</label>
                    <input type="text" name="tamano" id="tamano" required>

                    <br><br>

                    <label>Extras (Marque los que preceda):</label>
                    <input type="checkbox" id="Piscina" name="extras[]" value="Piscina">
                    <label for="piscina">Piscina</label>

                    <input type="checkbox" id="Jardin" name="extras[]" value="jardin">
                    <label for="jardin">Jardín</label>

                    <input type="checkbox" id="Garage" name="extras[]" value="Garage">
                    <label for="Garage">Garaje</label>

                    <br><br>
                    <label>Elegir archivo de foto:</label>
                    <select name="file">
                    <option value="">Ninguna foto</option>
                        <?php
                        $folder = 'imagenes/fotos';
                        $files = scandir($folder);
                        foreach ($files as $file) {
                            if ($file != '.' && $file != '..') {
                                echo "<option value='$file'>$file</option>";
                            }
                        }
                        ?>
                        <br><br>
                        <label>Foto</label><br>
                        <textarea id="observaciones" name="observaciones" rows="5" cols="30"></textarea>

                        <p><?= $_GET['msg'] ?? '' ?></p>
                   
                        <input type="submit" value="insertar" name="insertar">


                </form>
            </div>
        </div>
    </div>
    <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
</body>

</html>