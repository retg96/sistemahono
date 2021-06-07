<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $carrera = find_by_id('carrera',(int)$_GET['id']);
  if(!$carrera){
    $session->msg("d","ID vacío");
    redirect('carreras.php');
  }
?>
<?php
  $delete_id = delete_by_id('carrera',(int)$carrera['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: carreras.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('carreras.php');
  }
?>