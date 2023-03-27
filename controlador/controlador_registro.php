<?php

if(!empty($_POST['btnRegistro'])){
    if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO usuarios (nombre, apellidos, correo, password) VALUES ('$nombre','$apellidos','$correo','$password');";
        $res = $conexion->query($sql);

        if($res>0){
            echo "<script language='javascript'>alert('Registro completo | Inicia seesion en la pagina de inicio');</script>";

        }else{
            echo "<script language='javascript'>alert('Registro no realizado, llama al administrador');</script>";
        }

    }else{
        echo "Campos vacios";
    }
}