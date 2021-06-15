<?php
  $page_title = 'Editar Operativo';
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
$all_naciones = nacionalidades();
$all_estudios =estudios();
$all_puestos = puestos();
$all_regimenes = regimenes();
?>
<?php
$fecha = find_by_id('personaloperativo',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$fecha){
  $session->msg("d","Error: No se encontró id de producto.");
  redirect('personal_operativo.php');
}
 	if(isset($_POST['upd_carrera'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('FA','FE','FU','FR','FZ','FC','FB','FD','FF','FG','FH','FM','FP','FT','FV','FW','FX','FL');
		validate_fields($req_fields);
		if(empty($errors)){
	          $p_fa  = remove_junk($db->escape($_POST['FA']));
			      $p_fe   = remove_junk($db->escape($_POST['FE']));
            $p_fu   = remove_junk($db->escape($_POST['FU']));
            $p_fr   = remove_junk($db->escape($_POST['FR']));
            $p_fz   = remove_junk($db->escape($_POST['FZ']));
            $p_fc   = remove_junk($db->escape($_POST['FC']));

            $p_fb  = remove_junk($db->escape($_POST['FB']));
			      $p_fd   = remove_junk($db->escape($_POST['FD']));
            $p_ff   = remove_junk($db->escape($_POST['FF']));
            $p_fg   = remove_junk($db->escape($_POST['FG']));
            $p_fh   = remove_junk($db->escape($_POST['FH']));
            $p_fm   = remove_junk($db->escape($_POST['FM']));
            $p_fp   = remove_junk($db->escape($_POST['FP']));
            $p_ft   = remove_junk($db->escape($_POST['FT']));

            $p_fv   = remove_junk($db->escape($_POST['FV']));
            $p_fw   = remove_junk($db->escape($_POST['FW']));
            $p_fx   = remove_junk($db->escape($_POST['FX']));
            $p_fl   = remove_junk($db->escape($_POST['FL']));


            $sql = "INSERT INTO personaloperativo(ClaveSie, NombreCompleto, FechaNacimiento, Sexo, RFC, Curp, NumeroCelular, Calle, NoExterior, NoInterior, Fraccionamiento,CP,Ciudad,IdRegime, IdNivelEstudio, IdPuesto, IdNacionalidad, IdDepartamento) VALUES ('$ClaveSie','$Nombre','$Nacimiento','$Sexo','$RFC','$CURP','$Celular','$Calle', '$NoExterior', '$NoInterior', '$Fraccionamiento','$CP','$Ciudad','$Regimen','$NivelEstudio','$Puesto','$Nacionalidad','$Departamento')";

            $query   = "UPDATE personaloperativo SET";
            $query  .=" ClaveSie ='{$p_fa}', ";
            $query  .=" NombreCompleto ='{$p_fe}',";
            $query  .=" FechaNacimiento ='{$p_fu}',";
            $query  .=" Sexo ='{$p_fz}',";
            $query  .=" RFC ='{$p_fc}',";
            $query  .=" Curp ='{$p_fb}',";
            $query  .=" NumeroCelular ='{$p_fd}',";
            $query  .=" Calle ='{$p_ff}',";
            $query  .=" NoExterior ='{$p_fh}', ";
            $query  .=" NoInterior ='{$p_fg}',";
            $query  .=" Fraccionamiento ='{$p_fp}',";
            $query  .=" CP ='{$p_ft}',";
            $query  .=" Ciudad ='{$p_fm}',";
            $query  .=" IdRegime ='{$p_fx}',";
            $query  .=" IdNivelEstudio ='{$p_fv}',";
            $query  .=" IdPuesto ='{$p_fw}',";
            $query  .=" IdNacionalidad ='{$p_fr}',";
            $query  .=" IdDepartamento ='{$p_fl}'";
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
                redirect('personal_operativo.php', false);
                    }
                                else {
                                    /* SQL query error */
                        $session->msg('d',"Lo siento, actualización falló." 
                    . "Message: " . $db->get_last_error( ) 
                    );
                    redirect('edit_operativo.php?id='.$fecha['id'], false);
                    }

                    } else{
                    $session->msg("d", $errors);
                    redirect('edit_operativo.php?id='.$fecha['id'], false);
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
            <span>Editar Operativo</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="edit_operativo.php?id=<?php echo (int)$fecha['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Sie</label>
                            <input type="text" class="form-control"  name='FA' id='fa' value="<?php echo remove_junk($fecha['ClaveSie']);?>">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"  name='FE' id='fe' value="<?php echo remove_junk($fecha['NombreCompleto']);?>">
                        </div>

                        <div class="form-group">
                            <label for="">Fecha de Nacimiento</label>
                            <input type="date" class="form-control"  name='FU' id='fu' value="<?php echo remove_junk($fecha['FechaNacimiento']);?>">
                        </div>

                    <div class="form-group">
                        <label for="smi">Nacionalidad</label>
                        <select class="form-control" name='FR' id="fr" >
                          <?php  foreach ($all_naciones as $nacion): ?>
                            <option value="<?php echo (int)$nacion['id']; ?>" <?php if($fecha['IdNacionalidad'] === $nacion['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($nacion['Nacionalidad']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label>Sexo</label>
                        <select class="form-control" name='FZ' id="fz" >
                          <option value="<?php echo $fecha['Sexo']; ?>"><?php echo $fecha['Sexo']; ?></option>	
                          <option value='F'>Femenino</option>
                          <option value='M'>Masculino</option>	
                        </select>                    
                    </div>

                    <div class="form-group">
                            <label for="">RFC</label>
                            <input type="text" class="form-control"  name='FC' id='fc' value="<?php echo remove_junk($fecha['RFC']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">CURP</label>
                            <input type="text" class="form-control"  name='FB' id='fb' value="<?php echo remove_junk($fecha['Curp']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Celular</label>
                            <input type="number" class="form-control"  name='FD' id='fd' value="<?php echo remove_junk($fecha['NumeroCelular']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Calle</label>
                            <input type="text" class="form-control"  name='FF' id='ff' value="<?php echo remove_junk($fecha['Calle']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Número Interior</label>
                            <input type="number" class="form-control"  name='FG' id='fg' value="<?php echo remove_junk($fecha['NoExterior']);?>">
                    </div>
                    <div class="form-group">
                            <label for="">Número Exterior</label>
                            <input type="number" class="form-control"  name='FH' id='fh' value="<?php echo remove_junk($fecha['NoInterior']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Ciudad</label>
                            <input type="text" class="form-control"  name='FM' id='fm' value="<?php echo remove_junk($fecha['Ciudad']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Fraccionamiento</label>
                            <input type="text" class="form-control"  name='FP' id='fp' value="<?php echo remove_junk($fecha['Fraccionamiento']);?>">
                    </div>

                    <div class="form-group">
                            <label for="">Código Postal</label>
                            <input type="text" class="form-control"  name='FT' id='ft' value="<?php echo remove_junk($fecha['CP']);?>">
                    </div>

                    <div class="form-group">
                        <label for="smi">Nivel de Estudios</label>
                        <select class="form-control" name='FV' id="fv" >
                          <?php  foreach ($all_estudios as $estudio): ?>
                            <option value="<?php echo (int)$estudio['id']; ?>" <?php if($fecha['IdNivelEstudio'] === $estudio['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($estudio['NivelEstudio']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>

                    <div class="form-group">
                        <label for="smi">Función / Puesto</label>
                        <select class="form-control" name='FW' id="fw" >
                          <?php  foreach ($all_puestos as $puesto): ?>
                            <option value="<?php echo (int)$puesto['id']; ?>" <?php if($fecha['IdPuesto'] === $puesto['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($puesto['Puesto']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="smi">Regimen</label>
                        <select class="form-control" name='FX' id="fx" >
                          <?php  foreach ($all_regimenes as $regimen): ?>
                            <option value="<?php echo (int)$regimen['id']; ?>" <?php if($fecha['IdRegime'] === $regimen['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($regimen['Regimen']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="smi">Departamento</label>
                        <select class="form-control" name='FL' id="fl" >
                          <?php  foreach ($all_depas as $depa): ?>
                            <option value="<?php echo (int)$depa['id']; ?>" <?php if($fecha['IdDepartamento'] === $depa['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($depa['Departamento']); ?></option>
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