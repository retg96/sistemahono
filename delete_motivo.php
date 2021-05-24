<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $motivo = find_by_id('motivoausencia',(int)$_GET['id']);
  if(!$motivo){
    $session->msg("d","ID vacío");
    redirect('motivo_ausencia.php');
  }
?>
<?php
  $delete_id = delete_by_id('motivoausencia',(int)$motivo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: motivo_ausencia.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('motivo_ausencia.php');
  }
?>