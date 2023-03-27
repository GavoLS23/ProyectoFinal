<?php
    include 'modelo/conexion.php';
    include 'controlador/controlador_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles-login.css?3.0">
    <title>Bienvenido</title>
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="img/fondo3.jpg" alt="Fotografia de un edificio escolar..." >
            <h1>La puntualidad es el alma de los negocios...</h1><br>
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Bienvenido</h2>
                <form method="POST">
                    <div class="inputBx">
                        <span>Correo electronico</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBx">
                        <span>Contrase&ntilde;a</span>
                        <input type="password" name="password">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name="remeber"> Recuerdame</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Iniciar sesion" name="btnIniciar">
                    </div>
                    <div class="inputBx">
                        <p>¿No tienes una cuenta a&uacute;n? <a href="views/registro.php">Registrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>