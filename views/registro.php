<?php
    include '../modelo/conexion.php';
    include '../controlador/controlador_registro.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles-login.css">
    <title>Registrate</title>
</head>
<body>
    <section>
        <div class="contentBx">
            <div class="formBx">
                <h2>Registrate</h2>
                <form method="POST">
                    <div class="inputBx">
                        <span>Nombre</span>
                        <input type="text" name="nombre">
                    </div>
                    <div class="inputBx">
                        <span>Apellidos</span>
                        <input type="text" name="apellidos">
                    </div>
                    <div class="inputBx">
                        <span>Correo electronico</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBx">
                        <span>Contrase&ntilde;a</span>
                        <input type="password" name="password">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Registrarme" name="btnRegistro">
                    </div>
                    <div class="inputBx">
                        <p>¿Ya tienes una cuenta?? <a href="../index.php">Inicia sesi&oacute;n</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="imgBx">
            <img src="../img/fondo3.jpg" alt="Fotografia de un edificio escolar..." >
            <h1>La distinción entre el pasado, el presente y el futuro es solo una ilusión obstinadamente persistente</h1><br>
        </div>
        
    </section>
</body>
</html>