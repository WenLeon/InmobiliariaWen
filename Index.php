<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a inmobiliaria Espacio Ideal</title>
    <link rel="stylesheet" href="index.css">
    <style>
        /* Estilo formulario index interno  */
        .login {
            width: 25%;
            height: 70%;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .formularios {
            width: 60%;
            height: 60%;
            background-color: lightgray;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 60px;
            opacity: 0.9;
            border-radius: 20px;
        }

        input[type="text"],
        input[type="password"] {

            padding: 12px 20px;
            box-sizing: border-box;
            border: 0.1px solid gray;
            border-radius: 4px;
        }

        input[type="submit"] {

            padding: 12px 20px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid gray;
            border-radius: 4px;
            background-color: salmon;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        h3 {
            color: lightslategrey;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h2>Inmobiliaria Espacio ideal</h2>
    </header>

    <div id="contenedor">

        <div class="login">

            <div class="formularios" >
                <form method="post" action="Controllers/loginController.php">
                    <h3>Ingresa a inmobiliaria</h3>
                    <input type="text" id="username" name="username" placeholder="Usuario">
                    <br>

                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <br><br>
                    <p><strong><?=$_GET['msg'] ?></strong></p> <!--Mensaje -->

                    <input type="submit" name='ingresar' value="Ingresar">
                </form>

            </div>
        </div>
    </div>
    <footer><span>COPYRIGHT © 2023 Wendy León Barragán. | ALL RIGHTS RESERVED</span>
        </div>
    </footer>
</body>

</html>



