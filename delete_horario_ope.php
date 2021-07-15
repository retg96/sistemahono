<?php
if (isset($_GET["horario"])){
require_once('includes/load.php');
$idhorario = $_GET["horario"];
$idconvenio =$_GET["idconvenio"];


	$consulta=$db->query('DELETE FROM horariooperativo WHERE IdHorarioOperativo="'.$idhorario.'"')or die(mysqli_error());
	header('location: horario_ope_detalles.php?id='.$idconvenio);

	
} else {
    echo "<p>No parameters</p>";
}
$db=null;
?>

<?php
// if (isset($_GET["horario"])){
//   require_once('includes/load.php');
// $idhorario = $_GET["horario"];
// $idconvenio =$_GET["idconvenio"];


// 	$consulta=$db->query('DELETE FROM horariooperativo WHERE id="'.$idhorario.'"')or die(mysqli_error());
// 	header('location: horario_ope_detalles.php?id='.$idconvenio);

	
// } else {
//     echo "<p>No parameters</p>";
// }
// mysql_close();
?>