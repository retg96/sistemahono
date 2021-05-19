<?php
  $page_title = 'Agregar Periodo de Pago';
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
$all_pagos = pagos();
?>
<?php
 	if(isset($_POST['add_periodo'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FI','FF','FCF','FP');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));
			$p_ff   = remove_junk($db->escape($_POST['FF']));
			$p_fcf   = remove_junk($db->escape($_POST['FCF']));
			$p_fp   = remove_junk($db->escape($_POST['FP']));

			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();
			$query  = "INSERT INTO periodopagos (";
			$query .=" FechaInicioPeriodo,FechaFinPeriodo,FechaComprobanteFiscal,FechaPago";
			$query .=") VALUES (";
			$query .=" '{$p_fi}', '{$p_ff}', '{$p_fcf}', '{$p_fp}'";
			$query .=")";
			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Periodo agregado exitosamente. ");
       redirect('periodo_pago.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('periodo_pago.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_periodo_pago.php',false);
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
            <span>Agregar Periodo de Pago</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="add_periodo_pago.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Fecha de Inicio</label>
                            <input type="date" class="form-control"  name='FI' id='fi'>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha de Fin</label>
                            <input type="date" class="form-control"  name='FF' id='ff'>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha de Comprobante Fiscal</label>
                            <input type="date" class="form-control"  name='FCF' id='fcf'>
                        </div>
                        <div class="form-group">
                            <label for="">Fecha de Pago</label>
                            <input type="date" class="form-control"  name='FP' id='fp'>
                        </div>

                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="add_periodo" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>