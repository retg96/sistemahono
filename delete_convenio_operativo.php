<?php
if (isset($_GET["id"])){
require_once('includes/load.php');
$id = $_GET["id"];
$idpersonalop= $_GET["idpersonaloperativo"];


	$consulta=$db->query('DELETE FROM convenioope WHERE id= "'.$id.'"')or die(mysqli_error());
	header('Location: '."convenio_ope_detalles.php?id=$idpersonalop");


	
} else {
    echo "<p>No parameters</p>";
}
$db=null;
?>