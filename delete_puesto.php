<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $puesto = find_by_id('puesto',(int)$_GET['id']);
  if(!$puesto){
    $session->msg("d","ID vacío");
    redirect('puesto.php');
  }
?>
<?php
  $delete_id = delete_by_id('puesto',(int)$puesto['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: puesto.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('puesto.php');
  }
?>