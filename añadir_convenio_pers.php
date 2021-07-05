<?php
  require_once('includes/load.php');
  include_once('layouts/header.php'); 

$id = $_POST["id"];
$Inicio = $_POST["FechaInicio"];
$Fin = $_POST["FechaFin"];

$sql = "INSERT INTO convenio(InicioContrato,FinContrato,IdPersonal)VALUES('$Inicio','$Fin','$id')";
// if ($db->query($sql) === TRUE) {
// 	    header('Location: '."personal_operativo.php");
// 	} else {
// 	    echo "Error: " . $sql . "<br>" . $conexion->error;
// 	}


if ($db->query($sql) === TRUE) {
      echo"<script type='text/javascript'>
              $(document).ready(function() {
                Swal.fire({
                  title: 'Agregado',
                  text: 'El convenio se agregó correctamente',
                  icon: 'success',
                  timer: 2000
                }).then(
                  function () {
                    location.href = 'convenio_pers_detalles.php?id=$id';
                  },
                )
                })
          </script>";
} else {
          echo"<script type='text/javascript'>
              $(document).ready(function() {
                Swal.fire({
                  title: 'Error',
                  text: 'intentalo nuevamente',
                  icon: 'error',
                  timer: 2000
                }).then(
                  function () {
                    location.href = 'convenio_pers_detalles.php?id=$id';
                  },
                
                )
                })
          </script>";
}



$db = null;
?>