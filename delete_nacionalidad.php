<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $nacionalidad = find_by_id('nacionalidad',(int)$_GET['id']);
  if(!$nacionalidad){
    $session->msg("d","ID vacío");
    redirect('motivo_ausencia.php');
  }
?>
<?php
  $delete_id = delete_by_id('nacionalidad',(int)$nacionalidad['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: nacionalidad.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('nacionalidad.php');
  }
?>