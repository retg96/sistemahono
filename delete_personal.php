<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $personal = find_by_id('personal',(int)$_GET['id']);
  if(!$personal){
    $session->msg("d","ID vacío");
    redirect('personal_tecnm_principal.php');
  }
?>
<?php
  $delete_id = delete_by_id('personal',(int)$personal['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: personal_tecnm_principal.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('personal_tecnm_principal.php');
  }
?>