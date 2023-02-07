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
  <title>Modifica una vivienda</title>
</head>

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
  <form action="../Controllers/viviendaController.php" method="post">
    <!-- Agregar un campo oculto para almacenar el ID -->
    <input type="hidden" name="id" value="<?= $id ?>">
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" id="tipo" required><br>

    <label for="zona">Zona:</label>
    <input type="text" name="zona" id="zona" required><br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" id="direccion"><br>

    <label for="ndormitorios">Número de dormitorios:</label>
    <input type="number" name="ndormitorios" id="ndormitorios" required><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" required><br>

    <label for="tamano">Tamaño:</label>
    <input type="number" name="tamano" id="tamano" required><br>

    <label for="extras">Extras:</label>
    <input type="text" name="extras" id="extras"><br>

    <label for="observaciones">Observaciones:</label>
    <textarea name="observaciones" id="observaciones"></textarea><br>
    <p><?= $id ?></p>

    <input type="submit" value="actualizar" name="actualizar">
  </form>
  </div>
  <!-- ------------------------------------------------------------------------------------ -->
  <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span></footer>
</body>

</html>