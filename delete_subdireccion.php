<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $sub = find_by_id('subdireccion',(int)$_GET['id']);
  if(!$sub){
    $session->msg("d","ID vacío");
    redirect('subdirecciones.php');
  }
?>
<?php
  $delete_id = delete_by_id('subdireccion',(int)$sub['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: subdirecciones.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('subdirecciones.php');
  }
?>