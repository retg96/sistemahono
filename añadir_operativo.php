<?php
  require_once('includes/load.php');
  include_once('layouts/header.php'); 


$ClaveSie = $_POST["Clave"];
$Nombre = $_POST["Nombre"];
$Nacimiento = $_POST["Nacimiento"];
$Sexo = $_POST["Sexo"];
$RFC = $_POST["RFC"];
$CURP = $_POST["CURP"];
$Celular = $_POST["Celular"];
$Calle = $_POST["Calle"];
$NoExterior = $_POST["NoExterior"];
$NoInterior = $_POST["NoInterior"];
$Fraccionamiento = $_POST["Fraccionamiento"];
$CP = $_POST["CP"];
$Ciudad = $_POST["Ciudad"];
$Nacionalidad = $_POST["Nacionalidad"];
$NivelEstudio = $_POST["NivelEstudio"];
$Puesto = $_POST["Puesto"];
$Departamento = $_POST["Departamento"];
$Regimen = $_POST["Regimen"];

$sql = "INSERT INTO personaloperativo(ClaveSie, NombreCompleto, FechaNacimiento, Sexo, RFC, Curp, NumeroCelular, Calle, NoExterior, NoInterior, Fraccionamiento,CP,Ciudad,IdRegime, IdNivelEstudio, IdPuesto, IdNacionalidad, IdDepartamento) VALUES ('$ClaveSie','$Nombre','$Nacimiento','$Sexo','$RFC','$CURP','$Celular','$Calle', '$NoExterior', '$NoInterior', '$Fraccionamiento','$CP','$Ciudad','$Regimen','$NivelEstudio','$Puesto','$Nacionalidad','$Departamento')";

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
                  text: 'La carrera se agregó correctamente',
                  icon: 'success',
                  timer: 2000
                }).then(
                  function () {
                    location.href = 'personal_operativo.php';
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
                    location.href = 'personal_operativo.php';
                  },
                
                )
                })
          </script>";
}



$db = null;
?>