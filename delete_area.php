<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $area = find_by_id('areaacademica',(int)$_GET['id']);
  if(!$area){
    $session->msg("d","ID vacío");
    redirect('areas_academicas.php');
  }
?>
<?php
  $delete_id = delete_by_id('areaacademica',(int)$area['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: areas_academicas.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('areas_academicas.php');
  }
?>