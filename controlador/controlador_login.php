<?php


session_start();

if(!empty($_POST['btnIniciar'])){

   if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $usuario = $_POST['email'];
        $password = $_POST['password'];

        $sql = $conexion->query("SELECT * FROM usuarios WHERE correo = '$usuario' and password = '$password'; ");

        if ($datos = $sql->fetch_object()) {
            
            echo "<script language='javascript'>alert('Acceso permitido');</script>";

            $_SESSION['id'] = $datos->id;
            $_SESSION['nombre'] = $datos->nombre;
            $_SESSION['apellidos'] = $datos->apellidos;

            
            header('Location: views/home.php');

        }else{
            echo "<script language='javascript'>alert('Credenciales incorrectas');</script>";
        }

        
    }else{
        echo "<script language='javascript'>alert('Campos vacios');</script>";
    }
}


