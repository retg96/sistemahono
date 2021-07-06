<?php
if (isset($_GET["id"])){
require_once('includes/load.php');
$id = $_GET["id"];
$idpersonal= $_GET["idpersonal"];


	$consulta=$db->query('DELETE FROM convenio WHERE id="'.$id.'"')or die(mysqli_error());
	header('Location: '."convenio_pers_detalles.php?id=$idpersonal");


	
} else {
    echo "<p>No parameters</p>";
}
$db=null;
?>
