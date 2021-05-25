<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $nivel = find_by_id('nivelestudio',(int)$_GET['id']);
  if(!$nivel){
    $session->msg("d","ID vacío");
    redirect('nivel_estudios.php');
  }
?>
<?php
  $delete_id = delete_by_id('nivelestudio',(int)$nivel['id']);
  if($delete_id){
      // $session->msg("s","Proovedor Eliminado Correctamente");
      // redirect('Proveedores.php');
      header('location: nivel_estudios.php?m=1');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('nivel_estudios.php');
  }
?>