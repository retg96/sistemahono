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
$sql = "INSERT INTO horariooperativo (LunesHoraI, LunesHoraF, MartesHoraI, MartesHoraF, MiercolesHoraI, MiercolesHoraF, JuevesHoraI, JuevesHoraF, ViernesHoraI, ViernesHoraF, SabadoHoraI, SabadoHoraF, DomingoHoraI, DomingohoraF, IdConvenioOpe)VALUES('$LunesHoraI','$LunesHoraF','$MartesHoraI','$MartesHoraF','$MiercolesHoraI','$MiercolesHoraF','$JuevesHoraI','$JuevesHoraF','$ViernesHoraI','$ViernesHoraF','$SabadoHoraI','$SabadoHoraF','$DomingoHoraI','$DomingoHoraF','$id')";

if ($db->query($sql) === TRUE) {
    header('Location: '."horario_ope_detalles.php?id=".$id);
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>