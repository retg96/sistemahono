<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $modalidad = find_by_id('materia',(int)$_GET['id']);
  if(!$modalidad){
    $session->msg("d","ID vacío");
    redirect('materias.php');
  }
?>
<?php
  $delete_id = delete_by_id('materia',(int)$modalidad['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: materias.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('materias.php');
  }
?>