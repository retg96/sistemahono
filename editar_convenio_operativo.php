<?php
$idpersonal = $_POST["idpersonaloperativo"];
$id = $_POST["id"];
$InicioContrato = $_POST["FechaInicio"];
$FinContrato = $_POST["FechaFin"];

require_once('includes/load.php');
$sql = "UPDATE convenioope SET FechaInicio='$InicioContrato',FechaFin='$FinContrato' WHERE IdConvenioOpe = '$id'";

if ($db->query($sql) === TRUE) {
    header('Location: '."convenio_ope_detalles.php?id=$idpersonal");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db=null;
?>
