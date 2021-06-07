<?php
  $page_title = 'Editar Carrera';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php

$personal = find_by_id('carrera',(int)$_GET['id']);
$tipos=tipo_carrera();
$depas =departamentos();


if(!$personal){
  $session->msg("d","Error: No se encontró id de la persona.");
  redirect('carreras.php');
}
?>
<?php
if(isset($_POST['upd_carrera'])){

		$req_fields = array('FA','FE','FU','FO','FH','FL','FC','FR');
    validate_fields($req_fields);

    if(empty($errors)){

      $p_fa  = remove_junk($db->escape($_POST['FA']));
			$p_fe  = remove_junk($db->escape($_POST['FE']));
			$p_fu  = remove_junk($db->escape($_POST['FU']));
			$p_fo  = remove_junk($db->escape($_POST['FO']));
			$p_fh  = remove_junk($db->escape($_POST['FH']));
			$p_fl  = remove_junk($db->escape($_POST['FL']));
			$p_fc  = remove_junk($db->escape($_POST['FC']));
			$p_fr  = remove_junk($db->escape($_POST['FR']));

      $query   = "UPDATE carrera SET";
      $query  .=" Clave ='{$p_fa}', ";
      $query  .=" Carrera ='{$p_fe}', ";
      $query  .=" Abreviatura ='{$p_fu}',";
      $query  .=" NombreCorto ='{$p_fo}',";
      $query  .=" Numero ='{$p_fh}',";
      $query  .=" Estatus ='{$p_fl}',";
      $query  .=" IdDepartamento='{$p_fc}',";
      $query  .=" IdTipoCarrera='{$p_fr}'";
      $query  .=" WHERE id ='{$personal['id']}'";

      $result = $db->query($query);
      			if( $result ) {
      				if($db->affected_rows() === 1 ) {
      					// $session->msg('s',"La carrera ha sido actualizado.");

      				} else {
      					/* no row was changed */
      					$session->msg('w',"No se cambió ningún registro." 
      					//. "query: " . $query 
      				 	. "Info: " . $db->get_info();
      				 	);
      				}
              print( "La materia ha sido actualizado\n" );
      				redirect('carreras.php', false);
              //redirect('edit_product.php?id='.$product['id'], false);
           	}
      			else {
      				/* SQL query error */
          		$session->msg('d',"Lo siento, actualización falló." 
             	. "Message: " . $db->get_last_error( ) 
             	);
              //print( "Failed\n" );
             	redirect('edit_carreras.php?id='.$personal['id'], false);
            }

   } else{
      $session->msg("d", $errors);
      //print( "error\n" );
     	redirect('edit_carreras.php?id='.$personal['id'], false);
   }

//exit;
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
            <span>Editar Materia</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="edit_carreras.php?id=<?php echo (int)$personal['id'] ?>" class="clearfix">
         <?php 
						$IdCarrera = $_GET["id"];
					 	$result=$db->query('SELECT * FROM carrera WHERE id='.$IdCarrera)or die(mysqli_error());
					 		while($f=mysqli_fetch_array($result)) {
					 	?>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Clave</label>
                            <input type="text" class="form-control" name='FA' id='fa' value="<?php echo remove_junk($personal['Clave']);?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label>Nombre</label>	
							              <input type="" class="form-control" name="FE"  id='fe' value="<?php echo remove_junk($personal['Carrera']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Abreviatura</label>
                            <input type="text" class="form-control" name='FU' id='fu' value="<?php echo remove_junk($personal['Abreviatura']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="curp">Nombre corto</label>
                            <input type="text" class="form-control" name='FO' id='fo' value="<?php echo remove_junk($personal['NombreCorto']);?>" autofocus>
                        </div>
                        <div class="form-group">
                          <label>Estatus:</label><br>		
						              <select class="form-control" name='FH' id='fh' required>
						                <option value="<?php echo $f['Estatus']; ?>"><?php echo $f['Estatus']; ?></option>	
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>										
						            </select>
                       </div>

                       <div class="form-group">
                        <label for="">Numero de Alumnos</label>
                        <input type="number" class="form-control" name='FL' id='fl' value="<?php echo remove_junk($personal['Numero']);?>" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="smi">Tipo de Carrera</label>
                        <select class="form-control" name='FC' id="fc">
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($tipos as $tipo): ?>
                            <option value="<?php echo (int)$tipo['id']; ?>" <?php if($personal['IdTipoCarrera'] === $tipo['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($tipo['TipoCarrera']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label for="smi">Departamento</label>
                        <select class="form-control" name='FR' id="fr" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($depas as $depa): ?>
                            <option value="<?php echo (int)$depa['id']; ?>" <?php if($personal['IdDepartamento'] === $depa['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($depa['Departamento']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>

                    </div>
                    </div>
                </div>
                <?php
  								}
 							?>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_carrera" class="btn btn-primary">Agregar</button>

          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>