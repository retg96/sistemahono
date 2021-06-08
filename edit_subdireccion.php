<?php
  $page_title = 'Editar Subdirección';
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
$all_personal = find_all_personal();
$all_puestos = puestos();
?>
<?php include_once('layouts/header.php'); ?>
<?php
$subdireccion = find_by_id('subdireccion',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$subdireccion){
  $session->msg("d","Error: No se encontró id de producto.");
  redirect('subdirecciones.php');
}
 	if(isset($_POST['upd_subdi'])){
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
            
            $query   = "UPDATE subdireccion SET";
            $query  .=" Subdireccion ='{$p_fi}'";
            $query  .=" WHERE id ='{$subdireccion['id']}'";
            
            $result = $db->query($query);
            if( $result ) {
                if( $db->affected_rows() === 1 ) {
                    echo"<script type='text/javascript'>
                          $(document).ready(function() {
                            Swal.fire({
                              title: 'Actualizado',
                              text: 'La subdirección se actualizó correctamente',
                              icon: 'success',
                              timer: 2000
                            }).then(
                              function () {
                                location.href = 'subdirecciones.php';
                              }
                            )
                            })
                      </script>";
                } else {
                    /* no row was changed */
                    echo"<script type='text/javascript'>
                          $(document).ready(function() {
                            Swal.fire({
                              title: 'Error',
                              text: 'No se pudo actualizar el registro',
                              icon: 'error',
                              timer: 2000
                            }).then(
                              function () {
                                location.href = 'subdirecciones.php';
                                // location.href = 'edit_subdireccion.php?id='".$subdireccion['id'].";
                              }
                            )
                            })
                      </script>";
                }
                    }
                      else {
                        /* SQL query error */
                        echo"<script type='text/javascript'>
                          $(document).ready(function() {
                            Swal.fire({
                              title: 'Error',
                              text: 'Lo siento, actualización falló',
                              icon: 'error',
                              timer: 2000
                            }).then(
                              function () {
                                location.href = 'edit_subdireccion.php';
                              }
                            )
                            })
                      </script>";
                    // . "Message: " . $db->get_last_error( ) 
                    // );
                    // redirect('edit_subdireccion.php?id='.$subdireccion['id'], false);
                    }
                   } 
                  //  else{
                  //   $session->msg("d", $errors);
                  //   redirect('edit_subdireccion.php?id='.$subdireccion['id'], false);
                  //   }
        }

?>

  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Subdirección</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="edit_subdireccion.php?id=<?php echo (int)$subdireccion['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Subdirección</label>
                            <input type="text" class="form-control"  name='FI' id='fi' value="<?php echo remove_junk($subdireccion['Subdireccion']);?>">
                        </div>

                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_subdi" class="btn btn-primary">Actualizar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>