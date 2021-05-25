<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $sni = find_by_id('sni',(int)$_GET['id']);
  if(!$sni){
    $session->msg("d","ID vacío");
    redirect('tipo_sni.php');
  }
?>
<?php
  $delete_id = delete_by_id('sni',(int)$sni['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: tipo_sni.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('tipo_sni.php');
  }
?>