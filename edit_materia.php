<?php
  $page_title = 'Editar Materia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php

$personal = find_by_id('materia',(int)$_GET['id']);
$semestres = semestre();
$carreras = carrera();


if(!$personal){
  $session->msg("d","Error: No se encontró id de la persona.");
  redirect('materias.php');
}
?>
<?php
if(isset($_POST['upd_materia'])){

		$req_fields = array('FA','FE','FU','FO','FH','FL','FC','FR','FI');
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
      $p_fi  = remove_junk($db->escape($_POST['FI']));

      $query   = "UPDATE materia SET";
      $query  .=" Materia ='{$p_fa}', ";
      $query  .=" Semestre ='{$p_fe}', ";
      $query  .=" ClaveMateria ='{$p_fu}',";
      $query  .=" NombreCorto ='{$p_fo}',";
      $query  .=" AreaAbreviada ='{$p_fh}',";
      $query  .=" HorasTeoricas ='{$p_fl}',";
      $query  .=" HorasPracticas='{$p_fc}',";
      $query  .=" TotalCreditos='{$p_fr}',";
      $query  .=" IdCarrera='{$p_fi}'";
      $query  .=" WHERE id ='{$personal['id']}'";

      $result = $db->query($query);
      			if( $result ) {
      				if( $db->affected_rows() === 1 ) {
      					$session->msg('s',"La materia ha sido actualizado.");
      				} else {
      					/* no row was changed */
      					$session->msg('w',"No se cambió ningún registro." 
      					//. "query: " . $query 
      				 	. "Info: " . $db->get_info( )
      				 	);
      				}
              print( "La materia ha sido actualizado\n" );
      				redirect('materias.php', false);
              //redirect('edit_product.php?id='.$product['id'], false);
           	}
      			else {
      				/* SQL query error */
          		$session->msg('d',"Lo siento, actualización falló." 
             	. "Message: " . $db->get_last_error( ) 
             	);
              //print( "Failed\n" );
             	redirect('edit_materia.php?id='.$personal['id'], false);
            }

   } else{
      $session->msg("d", $errors);
      //print( "error\n" );
     	redirect('edit_materia.php?id='.$personal['id'], false);
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
         <form id="register_form" novalidate method="post" action="edit_materia.php?id=<?php echo (int)$personal['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name='FA' id='fa' value="<?php echo remove_junk($personal['Materia']);?>" autofocus>
                        </div>

              
                         <div class="form-group">
                            <label for="">Semestre</label>
                            <!-- <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sexo"> -->
                            <select class="form-control" name="FE"  id='fe'>
                              <option value="<?php echo $personal['Semestre']; ?>" selected="selected"><?php echo $personal['Semestre']; ?></option>
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
                            <label for="">Clave</label>
                            <input type="text" class="form-control" name='FU' id='fu' value="<?php echo remove_junk($personal['ClaveMateria']);?>" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="curp">Nombre corto</label>
                            <input type="text" class="form-control" name='FO' id='fo' value="<?php echo remove_junk($personal['NombreCorto']);?>" autofocus>
                        </div>

                    <div class="form-group">
                        <label for="profe">Area Abreviada</label>
                        <input type="text" class="form-control" name='FH' id='fh' value="<?php echo remove_junk($personal['AreaAbreviada']);?>" autofocus>
                    </div>


                    <div class="form-group">
                        <label for="">Horas teóricas</label>
                        <input type="number" class="form-control" name='FL' id='fl' value="<?php echo remove_junk($personal['HorasTeoricas']);?>" autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Horas Practicas</label>
                        <input type="number" class="form-control" name='FC' id='fc' value="<?php echo remove_junk($personal['HorasPracticas']);?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Total de Creditos</label>
                        <input type="number" class="form-control"  name='FR' id="fr" value="<?php echo remove_junk($personal['TotalCreditos']);?>" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="smi">Carrera</label>
                        <select class="form-control" name='FI' id="fi" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($carreras as $carrera): ?>
                            <option value="<?php echo (int)$carrera['id']; ?>" <?php if($personal['IdCarrera'] === $carrera['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($carrera['Carrera']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>

                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="upd_materia" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>