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
                <form>
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

                    <label>Número de dormitorios:</label>
                    <input type="radio" name="dormitorios" value="1">1
                    <input type="radio" name="dormitorios" value="2">2
                    <input type="radio" name="dormitorios" value="3">3
                    <input type="radio" name="dormitorios" value="4">4
                    <input type="radio" name="dormitorios" value="5">5 o más
                    <br><br>

                    <label>Precio:</label>
                    <input type="radio" name="precio" value="<100000">&lt; 100.000
                    <input type="radio" name="precio" value="100000-200000">100.000-200.000
                    <input type="radio" name="precio" value="200000-300000">200.000-300.000
                    <input type="radio" name="precio" value=">300000">&gt; 300.000
                    <br><br>

                    <label>Extras:</label>
                    <input type="checkbox" name="extras" value="piscina">Piscina
                    <input type="checkbox" name="extras" value="jardin">Jardín
                    <input type="checkbox" name="extras" value="garaje">Garaje
                    <br><br>

                    <input type="submit" value="Buscar vivienda">
                </form>
            </div>
        </div>
        
    </div>
    <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
</body>

</html>