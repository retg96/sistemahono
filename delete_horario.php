<!-- <?php
// if (isset($_GET["horario"])){
//   require_once('includes/load.php');
//   $idhorario = $_GET["horario"];
// $nosie =$_GET["nosie"];


// 	$consulta=$db->query('DELETE FROM horariodocentemateria WHERE id="'.$idhorario.'"')or die(mysqli_error());
// 	header('location: horario_perso_detalles.php?id='.$nosie);

	
// } else {
//     echo "<p>No parameters</p>";
// }
// $db=null;
?> -->

<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(2);
$idhorario = $_GET["horario"];
$nosie =$_GET["nosie"];
  // $id= $_GET["id"];

  $periodo = find_by_id('horariodocentemateria',(int)$_GET['id']);
  if(!$periodo){
    $session->msg("d","ID vacío");
    header('Location: '."horario_perso_detalles.php?id=".$nosie);
  }

  $delete_id = delete_by_id('horariodocentemateria',(int)$periodo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('Location: '."horario_perso_detalles.php?id=".$nosie);
  } else {
      $session->msg("d","Eliminación falló");
      // header('horario_ope_detalles.php?id="'.$idconvenio.'"');
      header('Location: '."horario_perso_detalles.php?id=".$nosie);

  }


?>