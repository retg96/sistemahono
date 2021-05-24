<?php
  $page_title = 'Editar Motivo';
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

?>
<?php
$motivo = find_by_id('motivoausencia',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$motivo){
  $session->msg("d","Error: No se encontró id de producto.");
  redirect('modalidad.php');
}
 	if(isset($_POST['upd_motivo'])){
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
            
            $query   = "UPDATE motivoausencia SET";
            $query  .=" MotivoAusencia ='{$p_fi}'";
            $query  .=" WHERE id ='{$motivo['id']}'";
            
            $result = $db->query($query);
            if( $result ) {
                if( $db->affected_rows() === 1 ) {
                    $session->msg('s',"La modalidad ha sido actualizado correctamente.");
                } else {
                    /* no row was changed */
                    $session->msg('w',"No se cambió ningún registro." 
                    //. "query: " . $query 
                     . "Info: " . $db->get_info( )
                     );
                }
                redirect('motivo_ausencia.php', false);
                    }
                                else {
                                    /* SQL query error */
                        $session->msg('d',"Lo siento, actualización falló." 
                    . "Message: " . $db->get_last_error( ) 
                    );
                    redirect('edit_motivo.php?id='.$motivo['id'], false);
                    }

                    } else{
                    $session->msg("d", $errors);
                    redirect('edit_motivo.php?id='.$motivo['id'], false);
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
            <span>Editar Motivo</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="edit_motivo.php?id=<?php echo (int)$motivo['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Motivo de Ausencia</label>
                            <input type="text" class="form-control"  name='FI' id='fi' value="<?php echo remove_junk($motivo['MotivoAusencia']);?>">
                        </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_motivo" class="btn btn-primary">Actualizar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>