<?php

include '../modelo/conexion.php';

date_default_timezone_set('America/Mexico_City');

if(!empty($_SESSION['id'])){
    $user = $_SESSION['id'];
    $alarmas = $conexion->query("SELECT * FROM vista_alarmas WHERE usuario = ".$_SESSION['id']."; ");
    
    if(!empty($_POST['addAlarma'])){
        if(!empty($_POST['hora']) && isset($_POST['dias'])){
            
            echo $_POST['hora']."</br>";
            $hora = $_POST['hora'].":00";
            $sem_insert = array();
            $contd = 0;

            $diasSQL = "";
            $valorDias = "";

            foreach($_POST['dias'] as $selected){
                if($contd==(count($_POST['dias'])-1)){
                    $diasSQL = $diasSQL.$selected;
                    $valorDias = $valorDias."1";
                }
                else{
                    $diasSQL = $diasSQL.$selected.", ";
                    $valorDias = $valorDias."1, ";
                }
                $contd++;
            }
            
            $sql = "INSERT INTO alarmas (hora, unico, ".$diasSQL.") values ('$hora',0,$valorDias) ;";

            $conexion->query($sql);

            $rs = $conexion->query("SELECT @@identity AS id; ");

            if ($row = $rs->fetch_row()) {
                $id_alarma = trim($row[0]);

                $sql = "INSERT INTO usuario_tiene_alarma (id_usuario, id_alarma) VALUES ($user, $id_alarma); ";

                $conexion->query($sql);
                echo "<script language='javascript'>alert('Alarma agregada correctamente');</script>";
            }
        }else{
            if(!empty($_POST['hora'])){


                /*$dias = array("domingo","lunes","martes","miercoles","jueves","viernes","Sábado");
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");*/
                
                $hora_actual = date("H:i");
                $hora_alarma = $_POST['hora'];
                
                $fecha_actual = date("Y-m-d");

              
                if(strtotime($hora_actual)<strtotime($hora_alarma)){
                    

                    $sql = "INSERT INTO alarmas (hora, unico, fecha) VALUES ('$hora_alarma','1','$fecha_actual'); ";

                }else{
                    
                    $fecha_unica = date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
                    
                    $sql = "INSERT INTO alarmas (hora, unico, fecha) VALUES ('$hora_alarma','1','$fecha_unica'); ";


                }

                $conexion->query($sql);

                $rs = $conexion->query("SELECT @@identity AS id; ");

                if ($row = $rs->fetch_row()) {
                    $id_alarma = trim($row[0]);

                    $sql = "INSERT INTO usuario_tiene_alarma (id_usuario, id_alarma) VALUES ($user, $id_alarma); ";

                    $conexion->query($sql);
                    echo "<script language='javascript'>alert('Alarma agregada correctamente');</script>";

                }


                //echo $hora_actual."-".$hora_alarma."|".$fecha_nueva;

                /*echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " - ".$hora_actual ;

                echo $_POST['hora'];*/
            }else{
            }
        }
        header('location: home.php');
    }
    
}