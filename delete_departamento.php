<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $carrera = find_by_id('departamento',(int)$_GET['id']);
  if(!$carrera){
    $session->msg("d","ID vacío");
    redirect('departamentos.php');
  }
?>
<?php
  $delete_id = delete_by_id('departamento',(int)$carrera['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: departamentos.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('departamentos.php');
  }
?>