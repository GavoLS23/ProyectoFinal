<?php

session_start();

include '../modelo/conexion.php';

if (isset($_SESSION['id'])) {
    if (isset($_GET['id'])) {

        $usuario = $_SESSION['id'];
        $alarma = $_GET['id'];

        $sql = "DELETE from usuario_tiene_alarma WHERE id_usuario = $usuario and id_alarma = $alarma; ";

        $res = $conexion->query($sql);

        if($res>0){
            $sql = "DELETE from alarmas WHERE id = $alarma; ";
            $res2 = $conexion->query($sql);
            if ($res>0) {
                echo "<script language='javascript'>alert('Alarma eliminada correctamente');</script>";
            }else{
                echo "<script language='javascript'>alert('Alarma no eliminada, recarga la pagina...');</script>";
            }
        }else{
            echo "<script language='javascript'>alert('Alarma vinculada con el usuario no eliminada...');</script>";
        }
        header('location: ../views/home.php');
    }
}


?>