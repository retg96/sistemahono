<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $tipo = find_by_id('tipopersona',(int)$_GET['id']);
  if(!$tipo){
    $session->msg("d","ID vacío");
    redirect('tipo_persona.php');
  }
?>
<?php
  $delete_id = delete_by_id('tipopersona',(int)$tipo['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: tipo_persona.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('tipo_persona.php');
  }
?>