<?php
$id = $_POST["id"];
$idpersonal = $_POST["idpersonal"];
$LunesHoraI= $_POST["LunesHoraI"];
$LunesHoraF = $_POST["LunesHoraF"];
$MartesHoraI = $_POST["MartesHoraI"];
$MartesHoraF = $_POST["MartesHoraF"];
$MiercolesHoraI = $_POST["MiercolesHoraI"];
$MiercolesHoraF = $_POST["MiercolesHoraF"];
$JuevesHoraI = $_POST["JuevesHoraI"];
$JuevesHoraF = $_POST["JuevesHoraF"];
$ViernesHoraI = $_POST["ViernesHoraI"];
$ViernesHoraF = $_POST["ViernesHoraF"];
$SabadoHoraI = $_POST["SabadoHoraI"];
$SabadoHoraF= $_POST["SabadoHoraF"];
$DomingoHoraI = $_POST["DomingoHoraI"];
$DomingoHoraF = $_POST["DomingoHoraF"];

require_once('includes/load.php');
include_once('layouts/header.php');
// echo '<script src="https://code.jquery.com/jquery-3.5.1.js"></script>';
// echo '<script type="text/javascript" src="libs/js/sweetalert2.all.min.js"></script>';

$sql = "INSERT INTO horariooperativo (LunesHoraI, LunesHoraF, MartesHoraI, MartesHoraF, MiercolesHoraI, MiercolesHoraF, JuevesHoraI, JuevesHoraF, ViernesHoraI, ViernesHoraF, SabadoHoraI, SabadoHoraF, DomingoHoraI, DomingohoraF, IdConvenioOpe)VALUES('$LunesHoraI','$LunesHoraF','$MartesHoraI','$MartesHoraF','$MiercolesHoraI','$MiercolesHoraF','$JuevesHoraI','$JuevesHoraF','$ViernesHoraI','$ViernesHoraF','$SabadoHoraI','$SabadoHoraF','$DomingoHoraI','$DomingoHoraF','$id')";

// if ($db->query($sql) === TRUE) {
//     header('Location: '."horario_ope_detalles.php?id=".$id);
// } else {
//     echo "Error: " . $sql . "<br>" . $db->error;
// }
if ($db->query($sql) === TRUE) {
echo
"<script>
$(document).ready(function() {
                  Swal.fire({
                    title: 'Agregado',
                    text: 'EL horario se agregó correctamente',
                    icon: 'success',
                    timer: 2000
                  }).then(
                    function () {
                      location.href = 'horario_ope_detalles.php?id=$id';
                    },
                  )
                  })

// swal({
//     title: 'Successfully updated the profile!',
//     text: 'Click ok to refresh the page.',
//     icon: 'success'
//   },
//   function(){
//     window.location='horario_ope_detalles.php?id=<?php echo $id ?>';
//   });
                  


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
                  location.href = 'horario_ope_detalles.php?id=$id';
                },
              
              )
              })
        </script>";
}

$db = null;
?>