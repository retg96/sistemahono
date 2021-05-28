<?php
  $page_title = 'Agregar Materia';
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
$carreras = carrera();
?>
<?php
 	if(isset($_POST['add_materia'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FI','FA','FE','FU','FO','FH','FL','FC','FR');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));
      $p_fa  = remove_junk($db->escape($_POST['FA']));
			$p_fe  = remove_junk($db->escape($_POST['FE']));
			$p_fu  = remove_junk($db->escape($_POST['FU']));
			$p_fo  = remove_junk($db->escape($_POST['FO']));
			$p_fh  = remove_junk($db->escape($_POST['FH']));
			$p_fl  = remove_junk($db->escape($_POST['FL']));
			$p_fc  = remove_junk($db->escape($_POST['FC']));
			$p_fr  = remove_junk($db->escape($_POST['FR']));



			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();
			$query  = "INSERT INTO materia (";
			$query .=" ClaveMateria,Materia,Semestre,AreaAbreviada,NombreCorto,HorasTeoricas,HorasPracticas,TotalCreditos,IdCarrera";
			$query .=") VALUES (";
			$query .=" '{$p_fi}','{$p_fa}','{$p_fe}','{$p_fu}','{$p_fo}','{$p_fh}','{$p_fl}','{$p_fc}','{$p_fr}'";
			$query .=")";
			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Materia agregada exitosamente. ");
       redirect('materias.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('add_materia.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_materia.php',false);
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
            <span>Agregar Materia</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="add_materia.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Clave Materia</label>
                            <input type="text" class="form-control"  name='FI' id='fi'>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"  name='FA' id='fa'>
                        </div>
                        <div class="form-group">
                            <label for="">Semestre</label>
                            <!-- <input type="text" class="form-control"  name='FE' id='fe'> -->
                            <select class="form-control" name="FE"  id='fe' required>
                          <option value="">Sin asignar</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                        </select>	
                        </div>
                        <div class="form-group">
                            <label for="">Área</label>
                            <input type="text" class="form-control"  name='FU' id='fu'>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre Corto</label>
                            <input type="text" class="form-control"  name='FO' id='fo'>
                        </div>
                        <div class="form-group">
                            <label for="">Horas Teóricas</label>
                            <input type="number" class="form-control"  name='FH' id='fh'>
                        </div>
                        <div class="form-group">
                            <label for="">Horas Prácticas</label>
                            <input type="number" class="form-control"  name='FL' id='fl'>
                        </div>
                        <div class="form-group">
                            <label for="">Total de Créditos</label>
                            <input type="text" class="form-control"  name='FC' id='fc'>
                        </div>
                        <div class="form-group">
                            <label for="">Carrera</label>
                            <!-- <input type="text" class="form-control"  name='FM' id='fm'> -->
                            <select class="form-control" name='FR' id="fr">
                                <option value="">Selecciona una opcion</option>
                                <?php  foreach ($carreras as $carrera): ?>
                                <option value="<?php echo (int)$carrera['id'] ?>">
                                <?php echo $carrera['Carrera'] ?></option>
                                <?php endforeach; ?>
                            </select>       
                        </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="add_materia" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>