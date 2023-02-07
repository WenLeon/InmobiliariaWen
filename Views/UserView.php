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
  <title>Crea un nuevo usuario</title>
</head>
<style>
  .contenedor {
    width: 100%;
    height: 80vh;
    background-image: url('../Views/imagenes/inmobiliaria.jpg');
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center
  }



  .formulario {
    background-color: lightcyan;
    border-radius: 10px;
    width: 30%;
    height: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  label {
    font-weight: bold;

  }

  input[type="text"] {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #c4c4c4;
    width: 80%;
  }

  input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #2980b9;
  }
  .nomUser{
    font-weight: bold;
  }
</style>

<body>

   <!-- ------------------------------------------------------------------------------------ -->
        <!-- Todo el header -->
        <header>
                <h2>Inmobiliaria Espacio ideal</h2>
                <div class="encabezado">
                    <span>Bienvenido: <?php echo $_SESSION['usuario']; ?></span>
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
                    <span>Última conexión: <?php echo $_COOKIE['lastLogin']; ?></span>
                    <!-- Boton de cerrar session  -->
                    <button><a href="../Models/logout.php">Cerrar sesion</a></button>
                </div>
            </header>
            <!-- ------------------------------------------------------------------------------------ -->
  <div class="contenedor">

  <div class="formulario">
    <form action="../Controllers/userController.php" method="post">

      <!-- Usuario -->
      <label for="id_usuario">ID Usuario:</label>
      <input type="text" id="id_usuario" name="id_usuario" minlength="1" maxlength="9" required><br><br>
      <p><?= $_GET['msg'] ?></p>
      <!-- Boton de enviar  -->
      <input type="submit" value="Crear Usuario" name="enviar">
      
    </form>
    </div>
  </div>
  <footer>
    <span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
  </footer>

</body>

</html>