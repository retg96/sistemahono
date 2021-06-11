<?php
  require_once('includes/load.php');
  include_once('layouts/header.php'); 
?>
<?php
$idCarrera= $_POST["idCarrera"];
$clave= $_POST["clave"];
$nombre = $_POST["nombre"];
$abreviatura = $_POST["abreviatura"];
$nombreCorto = $_POST["nombreCorto"];
$estatus= $_POST["estatus"];
$numAlumnos = $_POST["numAlumnos"];
$departamento = $_POST["departamento"];
$tipoCarrera = $_POST["tipoCarrera"];

$sql = "UPDATE carrera SET Clave='$clave',Carrera='$nombre',Abreviatura='$abreviatura',NombreCorto='$nombreCorto',Numero='$numAlumnos',Estatus='$estatus',IdDepartamento='$departamento',IdTipoCarrera='$tipoCarrera' WHERE id = '$idCarrera'";

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
    echo "Error: " . $sql . "<br>" . $db->error;
}



$db = null;
?>


