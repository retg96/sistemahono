<?php
$idpersonal = $_POST["idpersonaloperativo"];
$id = $_POST["id"];
$InicioContrato = $_POST["FechaInicio"];
$FinContrato = $_POST["FechaFin"];

require_once('includes/load.php');
$sql = "UPDATE convenio SET InicioContrato='$InicioContrato',FinContrato='$FinContrato' WHERE id = '$id'";

if ($db->query($sql) === TRUE) {
    header('Location: '."convenio_pers_detalles.php?id=$idpersonal");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db=null;
?>
