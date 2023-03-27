<?php

session_start();


if(empty($_SESSION['id'])){
  header("location: ../index.php");
}

include '../controlador/controlador_alarma.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles-home.css?4.0">
    <script src="../js/jquery-3.6.4.min.js"></script>
    <title>Inicio | Panel de control</title>
</head>
<body>
    
    <div class="container">
        <a href="../controlador/cerrar_sesion.php" class="btn-log-out">
            Cerrar sesi&oacute;n
        </a>

        <div class="saludo">
            <h1>Bienvenido  <?php echo $_SESSION['nombre'];?></h1>
        </div>
        <div class="reloj">
            <div id="time">
                <div class="circle" style='--clr: #e85410'>
                <svg>
                <circle cx='70' cy='70' r='70'></circle>
                <circle cx='70' cy='70' r='70'></circle>
                </svg>
                <div class='dot'></div>
                <div id="hours">00</div>
                </div>
                <div class="circle" style='--clr: #9d9d9d'>
                <svg>
                <circle cx='70' cy='70' r='70'></circle>
                <circle cx='70' cy='70' r='70'></circle>
                </svg>
                <div class='dot'></div>
                <div id="minutes">00</div>
                </div>
                <div class="circle" style='--clr: #f8b688'>
                <svg>
                <circle cx='70' cy='70' r='70'></circle>
                <circle cx='70' cy='70' r='70'></circle>
                </svg>
                <div class='dot'></div>
                <div id="seconds">00</div>
                </div>
                <div class="ap">
                <div id="ampm">AM</div>
                </div>
            </div>
        </div>

        <div class="mensaje-sig">
            <h3>Programar siguiente alarma:</h3>
            
            <p><a href="#modal" class="btn-add">Agregar alarma</a></p>
            <p><a href="#" onclick="emergencia()" class="btn-log-out">Emergencia</a></p>
        </div>
        
        <section class="container-t">
          <table class="table">
          <thead>
            <tr>
              <th>Hora</th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miercoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            <?php


            $contador = 0;

            foreach ($alarmas as $alarma){
              echo "<tr id=".$alarma['alarma'].">";

              $lun=$alarma['lunes']=="1"?"Activo":"Inactivo";
              $mar=$alarma['martes']=="1"?"Activo":"Inactivo";
              $mie=$alarma['miercoles']=="1"?"Activo":"Inactivo";
              $jue=$alarma['jueves']=="1"?"Activo":"Inactivo";
              $vie=$alarma['viernes']=="1"?"Activo":"Inactivo";

              echo "<td class='hora_unica'>".$alarma['hora']."</td>";

              
              
              echo "<td>".$lun."</td>";
              echo "<td>".$mar."</td>";
              echo "<td>".$mie."</td>";
              echo "<td>".$jue."</td>";
              echo "<td>".$vie."</td>";
              echo "<td><a class='btn-eliminar' href='../controlador/eliminar_alarma.php?id=".$alarma['alarma']."'>Eliminar</a></td>";


              echo "</tr>";
              $contador++;
            }

            ?>
          </tbody>
          </table>
        </section>
    </div>

    <!--Codigo HTML5 del modal-->
    <div id="modal" class="modalmask">
      <div class="modalbox rotate">
        <a href="#close" title="Close" class="close">X</a>
        <h2>Agregar nueva alarma</h2>
        <form method="POST">
          <section class="formulario-alarma">
            <hr />
            <label class="subti"><h4>Hora:</h4></label>
            <div class="horario">
              <input type="time" name="hora"/>
            </div>
            <hr />
            <label class="subti"><h4>Por dia:</h4></label>
            <div class="elegir-dias">
              <input value="lunes" name="dias[]" id="lunes" type="checkbox" />
              <label for="lunes">Lunes</label>
              <input value="martes" name="dias[]" id="martes" type="checkbox" />
              <label for="martes">Martes</label>
              <input value="miercoles" name="dias[]" id="miercoles" type="checkbox" />
              <label for="miercoles">Miercoles</label>
              <input value="jueves" name="dias[]" id="jueves" type="checkbox" />
              <label for="jueves">Jueves</label>
              <input value="viernes" name="dias[]" id="viernes" type="checkbox" />
              <label for="viernes">Viernes</label>
            </div>
            <br>
            <p class="btn-right">
              <input name="addAlarma" class="btn-add" type="submit" value="Enviar" />
            </p>
          </section>
        </form>
      </div>
    </div>

    <script src="../js/reloj-js.js?3.1"></script>
    <script src="../js/contador.js?11.0"></script>

</body>
</html>
