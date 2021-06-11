<?php
  $page_title = 'Agregar Departamento';
  require_once('includes/load.php');


$all_subdi = subdireccion();
?>
<?php
 	if(isset($_POST['add_depa'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FA','FI','FO','FR');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fa  = remove_junk($db->escape($_POST['FA']));
			$p_fi  = remove_junk($db->escape($_POST['FI']));
			$p_fo  = remove_junk($db->escape($_POST['FO']));
			$p_fr  = remove_junk($db->escape($_POST['FR']));


			
			$query  = "INSERT INTO departamento (";
			$query .=" Departamento,Abreviatura,TipoDepartamento,IdSubdireccion";
			$query .=") VALUES (";
			$query .=" '{$p_fa}','{$p_fi}','{$p_fo}','{$p_fr}'";
			$query .=")";
			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Área agregada exitosamente. ");
       redirect('departamentos.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('add_departamento.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_departamento.php',false);
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
            <span>Agregar Departamento</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="add_departamento.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"  name='FA' id='fa'>
                        </div>

                        <div class="form-group">
                            <label for="">Abreviatura</label>
                            <input type="text" class="form-control"  name='FI' id='fi'>
                        </div>
                        <div class="form-group">
                            <label for="">Tipo de Departamento</label>
                            <select class="form-control"  name='FO' id='fo' required>
								<option value="">Sin asignar</option>
								<option value="Imparte Clase">Imparte Clase</option>
								<option value="No Imparte Clase">No Imparte Clase</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label for="">Subdirección</label>
                            <select class="form-control" name='FR' id="fr">
                                <option value="">Selecciona una opcion</option>
                                <?php  foreach ($all_subdi as $subdi): ?>
                                <option value="<?php echo (int)$subdi['id'] ?>">
                                <?php echo $subdi['Subdireccion'] ?></option>
                                <?php endforeach; ?>
                            </select>                    
                        </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="add_depa" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>