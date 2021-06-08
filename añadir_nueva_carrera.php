<?php
  require_once('includes/load.php');
  include_once('layouts/header.php'); 
?>
<?php

$clave = $_POST["clave"];
$nombre = $_POST["nombre"];
$abreviatura = $_POST["abreviatura"];
$nombreCorto = $_POST["nombreCorto"];
$estatus= $_POST["estatus"];
$numAlumnos = $_POST["numAlumnos"];
$departamento = $_POST["departamento"];
$tipoCarrera = $_POST["tipoCarrera"];
$sql = "INSERT INTO carrera (Clave,Carrera,Abreviatura,NombreCorto,Numero,Estatus,IdDepartamento,IdTipoCarrera)VALUES('$clave','$nombre','$abreviatura','$nombreCorto','$numAlumnos','$estatus','$departamento','$tipoCarrera')";

if ($db->query($sql) === TRUE) {
      echo"<script type='text/javascript'>
              $(document).ready(function() {
                Swal.fire({
                  title: 'Agregado',
                  text: 'La carrera se agregó correctamente',
                  icon: 'success',
                  timer: 2000
                }).then(
                  function () {
                    location.href = 'carreras.php';
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
                    location.href = 'add_carreras.php';
                  },
                
                )
                })
          </script>";
}



$db = null;
?>


