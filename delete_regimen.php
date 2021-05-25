<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $regimen = find_by_id('regimen',(int)$_GET['id']);
  if(!$regimen){
    $session->msg("d","ID vacío");
    redirect('regimen.php');
  }
?>
<?php
  $delete_id = delete_by_id('regimen',(int)$regimen['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: regimen.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('regimen.php');
  }
?>