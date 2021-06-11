<?php
  $page_title = 'Editar Departamento';
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
$all_subdi = subdireccion();
?>
<?php
$fecha = find_by_id('departamento',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$fecha){
  $session->msg("d","Error: No se encontró id de producto.");
  redirect('departamentos.php');
}
 	if(isset($_POST['upd_depa'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FI','FCF','FR','FS');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));
			$p_fcf   = remove_junk($db->escape($_POST['FCF']));
            $p_fr   = remove_junk($db->escape($_POST['FR']));
            $p_fs  = remove_junk($db->escape($_POST['FS']));



			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();

            $query   = "UPDATE departamento SET";
            $query  .=" Departamento ='{$p_fi}', ";
            $query  .=" Abreviatura ='{$p_fcf}',";
            $query  .=" TipoDepartamento ='{$p_fr}',";
            $query  .=" IdSubdireccion ='{$p_fs}'";
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
                redirect('departamentos.php', false);
                    }
                                else {
                                    /* SQL query error */
                        $session->msg('d',"Lo siento, actualización falló." 
                    . "Message: " . $db->get_last_error( ) 
                    );
                    redirect('edit_departamento.php?id='.$fecha['id'], false);
                    }

                    } else{
                    $session->msg("d", $errors);
                    redirect('edit_departamento.php?id='.$fecha['id'], false);
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
         <form id="register_form" method="post" action="edit_departamento.php?id=<?php echo (int)$fecha['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"  name='FI' id='fi' value="<?php echo remove_junk($fecha['Departamento']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Abreviatura</label>
                            <input type="text" class="form-control"  name='FCF' id='fcf' value="<?php echo remove_junk($fecha['Abreviatura']);?>">
                        </div>


                    <div class="form-group">
                        <label for="smi">Tipo de Departamento</label>
                        <select class="form-control" name='FR' id="fr" >
                          <option value="<?php echo $fecha['TipoDepartamento']; ?>"><?php echo $fecha['TipoDepartamento']; ?></option>	
                          <option value="Imparte Clase">Imparte Clase</option>
						  <option value="No Imparte Clase">No Imparte Clase</option>	
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label for="smi">Subdirección</label>
                        <select class="form-control" name='FS' id="fs" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_subdi as $subdi): ?>
                            <option value="<?php echo (int)$subdi['id']; ?>" <?php if($fecha['IdSubdireccion'] === $subdi['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($subdi['Subdireccion']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_depa" class="btn btn-primary">Actualizar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>