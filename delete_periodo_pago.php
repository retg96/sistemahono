<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $periodo = find_by_id('periodopagos',(int)$_GET['id']);
  if(!$periodo){
    $session->msg("d","ID vacío");
    redirect('periodo_pago.php');
  }
?>
<?php
  $delete_id = delete_by_id('periodopagos',(int)$periodo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: periodo_pago.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('periodo_pago.php');
  }
?>