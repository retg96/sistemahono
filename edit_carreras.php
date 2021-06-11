<?php
  $page_title = 'Editar Carrera';
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
$all_depas = departamentos();
$carreras = carrera();
$tipos = tipo_carrera();
?>
<?php
$fecha = find_by_id('carrera',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$fecha){
  $session->msg("d","Error: No se encontró id de producto.");
  redirect('carreras.php');
}
 	if(isset($_POST['upd_carrera'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FI','FCF','FA','FE','FU','FO','FR','FS');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));
			$p_fcf   = remove_junk($db->escape($_POST['FCF']));
      $p_fa   = remove_junk($db->escape($_POST['FA']));
      $p_fe   = remove_junk($db->escape($_POST['FE']));
      $p_fu   = remove_junk($db->escape($_POST['FU']));
      $p_fo   = remove_junk($db->escape($_POST['FO']));
      $p_fr   = remove_junk($db->escape($_POST['FR']));
      $p_fs   = remove_junk($db->escape($_POST['FS']));


			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();

            $query   = "UPDATE carrera SET";
            $query  .=" Clave ='{$p_fi}', ";
            $query  .=" Carrera ='{$p_fcf}',";
            $query  .=" Abreviatura ='{$p_fa}',";
            $query  .=" NombreCorto ='{$p_fe}',";
            $query  .=" Numero ='{$p_fu}',";
            $query  .=" Estatus ='{$p_fo}',";
            $query  .=" IdDepartamento ='{$p_fr}',";
            $query  .=" IdTipoCarrera ='{$p_fs}'";
            $query  .=" WHERE id ='{$fecha['id']}'";
            
            $result = $db->query($query);
            if( $result ) {
                if( $db->affected_rows() === 1 ) {
                    $session->msg('s',"El periodo de pago ha sido actualizado correctamente.");
                } else {
                    /* no row was changed */
                    $session->msg('w',"No se cambió ningún registro." 
                    //. "query: " . $query 
                     . "Info: " . $db->get_info( )
                     );
                }
                redirect('carreras.php', false);
                    }
                                else {
                                    /* SQL query error */
                        $session->msg('d',"Lo siento, actualización falló." 
                    . "Message: " . $db->get_last_error( ) 
                    );
                    redirect('edit_carreras.php?id='.$fecha['id'], false);
                    }

                    } else{
                    $session->msg("d", $errors);
                    redirect('edit_carreras.php?id='.$fecha['id'], false);
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
            <span>Editar Carrera</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="edit_carreras.php?id=<?php echo (int)$fecha['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Clave</label>
                            <input type="text" class="form-control"  name='FI' id='fi' value="<?php echo remove_junk($fecha['Clave']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Carrera</label>
                            <input type="text" class="form-control"  name='FCF' id='fcf' value="<?php echo remove_junk($fecha['Carrera']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Abreviatura</label>
                            <input type="text" class="form-control"  name='FA' id='fa' value="<?php echo remove_junk($fecha['Abreviatura']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre Corto</label>
                            <input type="text" class="form-control"  name='FE' id='fe' value="<?php echo remove_junk($fecha['NombreCorto']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Alumnos</label>
                            <input type="number" class="form-control"  name='FU' id='fu' value="<?php echo remove_junk($fecha['Numero']);?>">
                        </div>
                        <div class="form-group">
                        <label>Estatus</label>
                        <select class="form-control" name='FO' id="fo" >
                          <!-- <option value="">Selecciona una opcion</option> -->
                          <option value="<?php echo $fecha['Estatus']; ?>"><?php echo $fecha['Estatus']; ?></option>	
                          <option value="Activo">Activo</option>
                          <option value="Inactivo">Inactivo</option>	
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label for="smi">Departamento</label>
                        <select class="form-control" name='FR' id="fr" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_depas as $depa): ?>
                            <option value="<?php echo (int)$depa['id']; ?>" <?php if($fecha['IdDepartamento'] === $depa['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($depa['Departamento']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="smi">Tipo de Carrera</label>
                        <select class="form-control" name='FS' id="fs" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($tipos as $tipo): ?>
                            <option value="<?php echo (int)$tipo['id']; ?>" <?php if($fecha['IdTipoCarrera'] === $tipo['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($tipo['TipoCarrera']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_carrera" class="btn btn-primary">Actualizar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>