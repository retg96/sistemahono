<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $fecha = find_by_id('fechanopago',(int)$_GET['id']);
  if(!$fecha){
    $session->msg("d","ID vacío");
    redirect('fecha_sin_pago.php');
  }
?>
<?php
  $delete_id = delete_by_id('fechanopago',(int)$fecha['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: fecha_sin_pago.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('fecha_sin_pago.php');
  }
?>