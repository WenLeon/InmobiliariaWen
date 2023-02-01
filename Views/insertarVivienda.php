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
    <header>
        <h2>Inmobiliaria Espacio ideal</h2>
    </header>

    <div id="contenedor">

        <div class="formulario">
            <div class="contenido">

                <form action="submit-form.php" method="post">


                    <label for="tipo_vivienda">Tipo de Vivienda:</label>
                    <select name="tipo_vivienda" id="tipo_vivienda">
                        <option value="">Selecciona una opción</option>
                        <option value="piso">Piso</option>
                        <option value="chalet">Chalet</option>
                        <option value="adosado">Adosado</option>
                        <option value="casa">Casa</option>
                    </select>

                    <br><br>


                    <label for="zona">Zona:</label>
                    <select name="zona" id="zona">
                        <option value="">Selecciona una opción</option>
                        <option value="centro">Centro</option>
                        <option value="norte">Norte</option>
                        <option value="este">Este</option>
                        <option value="oeste">Oeste</option>
                    </select>

                    <br><br>

                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion">

                    <br><br>

                    <label>Número de dormitorios:</label>
                    <input type="radio" id="dormitorios1" name="dormitorios" value="1">
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
                    <input type="text" name="precio" id="precio">

                    <br><br>

                    <label for="tamano">Tamaño:</label>
                    <input type="text" name="tamano" id="tamano">

                    <br><br>

                    <label>Extras (Marque los que preceda):</label>
                    <input type="checkbox" id="piscina" name="extras[]" value="piscina">
                    <label for="piscina">Piscina</label>

                    <input type="checkbox" id="jardin" name="extras[]" value="jardin">
                    <label for="jardin">Jardín</label>

                    <input type="checkbox" id="garaje" name="extras[]" value="garaje">
                    <label for="garaje">Garaje</label>

                    <br><br>
                    <label>Elegir archivo de foto:</label>
                    <input type="file" id="foto" name="foto">
                    <br><br>
                    <label>Observaciones:</label><br>
                    <textarea id="observaciones" name="observaciones" rows="5" cols="30"></textarea>


                    <input type="submit" value="Enviar">


                </form>
            </div>
        </div>
    </div>
    <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
</body>

</html>