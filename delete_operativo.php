<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $periodo = find_by_id('personaloperativo',(int)$_GET['id']);
  if(!$periodo){
    $session->msg("d","ID vacío");
    redirect('personal_operativo.php');
  }
?>
<?php
  $delete_id = delete_by_id('personaloperativo',(int)$periodo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: personal_operativo.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('personal_operativo.php');
  }
?>