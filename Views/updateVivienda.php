<?php
$id = $_GET['id'];
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
  <div class="contenedor">
    <form action="../Controllers/viviendaController.php" method="post">
      <!-- Agregar un campo oculto para almacenar el ID -->
      <input type="hidden" name="id" value="<?= $id ?>">
      <!----------------- Tipo de vivienda ---------------->
      <label for="tipo_vivienda">Tipo de Vivienda:</label>
      <select name="tipo" id="tipo">
        <option value="piso">Piso</option>
        <option value="chalet">Chalet</option>
        <option value="adosado">Adosado</option>
        <option value="casa">Casa</option>
      </select>
      <br><br>

      <!------------------ Zona ----------------------------->
      <label for="zona">Zona:</label>
      <select name="zona" id="zona">
        <option value="centro">Centro</option>
        <option value="norte">Norte</option>
        <option value="este">Este</option>
        <option value="oeste">Oeste</option>
      </select>
      <br><br>
      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion" id="direccion" pattern="[aA-zZ 0-9]{1,100}" required><br>
      <br><br>
      <!------------------ Dormitorio-------------------------->
      <label>Número de dormitorios:</label>
      <input type="radio" name="ndormitorios" value="1" >1
      <input type="radio" name="ndormitorios" value="2" required>2
      <input type="radio" name="ndormitorios" value="3">3
      <input type="radio" name="ndormitorios" value="4">4
      <input type="radio" name="ndormitorios" value="5">5 o más
      <br><br>


      <label for="precio">Precio:</label>
      <input type="number" name="precio" id="precio" required><br>
      <br><br>
      <label for="tamano">Tamaño:</label>
      <input type="text" name="tamano" id="tamano" pattern="[0-9]{5}" required><br>
      <br><br>
      <!----------------------- Extras ------------------------->
      <label>Extras:</label>
      <input type="checkbox" name="extras[]" value="Piscina">Piscina
      <input type="checkbox" name="extras[]" value="Jardin">Jardín
      <input type="checkbox" name="extras[]" value="Garage">Garaje
      <br><br>

      <label for="observaciones">Observaciones:</label>
      <textarea name="observaciones" id="observaciones"></textarea><br>
      <p><?= $id ?></p>
      <p><?= $_GET['msg']?></p>
      <input type="submit" value="actualizar" name="actualizar">
    </form>
  </div>
  </div>
    </div>
  <!-- ------------------------------------------------------------------------------------ -->
  <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span></footer>
</body>

</html>