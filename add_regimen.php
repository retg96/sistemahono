<?php
  $page_title = 'Agregar Regimen';
  require_once('includes/load.php');

//   $nacionalidades = nacionalidades();
//   $estudios = estudios();
//   $puestos = puestos();
//   $regimenes = regimenes();
//   $tipo_personas = tip_persona();
//   $areas_academicas = areas_aca();
//   $dptos = departamentos();
//   $all_sni = sni();
//   $motivo_ausencia = ausencia();
//   $personales = personal();
// $all_pagos = pagos();
$all_areas = areas_aca();
?>
<?php
 	if(isset($_POST['add_regimen'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FI');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));


			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();
			$query  = "INSERT INTO regimen (";
			$query .=" Regimen";
			$query .=") VALUES (";
			$query .=" '{$p_fi}'";
			$query .=")";
			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Regimen agregado exitosamente. ");
       redirect('regimen.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('add_regimen.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_regimen.php',false);
   }
 }

	

?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Regimen</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="add_regimen.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Regimen</label>
                            <input type="text" class="form-control"  name='FI' id='fi'>
                        </div>

                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="add_regimen" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>