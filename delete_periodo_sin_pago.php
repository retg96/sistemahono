<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $personal = find_by_id('rangonopago',(int)$_GET['id']);
  if(!$personal){
    $session->msg("d","ID vacío");
    redirect('periodo_sin_pago.php');
  }
?>
<?php
  $delete_id = delete_by_id('rangonopago',(int)$personal['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: periodo_sin_pago.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('periodo_sin_pago.php');
  }
?>