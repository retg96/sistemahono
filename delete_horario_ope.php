<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
$idhorario = $_GET["horario"];
$idconvenio =$_GET["idconvenio"];

  $periodo = find_by_id('horariooperativo',(int)$_GET['id']);
  if(!$periodo){
    $session->msg("d","ID vacío");
    redirect('horario_ope_detalles.php?id="'.$idconvenio.'"');
  }

  $delete_id = delete_by_id('horariooperativo',(int)$periodo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: horario_ope_detalles.php?id="'.$idconvenio.'"');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('personal_operativo.php');
  }


?>
<?php
// if (isset($_GET["horario"])){
//   require_once('includes/load.php');
// $idhorario = $_GET["horario"];
// $idconvenio =$_GET["idconvenio"];


// 	$consulta=mysqli_query($db,'DELETE FROM horariooperativo WHERE id="'.$idhorario.'"')or die(mysqli_error());
// 	header('location: horario_operativo_detalles.php?id='.$idconvenio);

	
// } else {
//     echo "<p>No parameters</p>";
// }
// mysql_close() ;
?>