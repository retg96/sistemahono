<?php
  $page_title = 'Agregar Operativos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  // page_require_level(2);
  // $all_categories = find_all('categories');
  // $all_photo = find_all('media');
  $nacionalidades = nacionalidades();
  $estudios = estudios();
  $puestos = puestos();
  $regimenes = regimenes();
  $tipo_personas = tip_persona();
  $areas_academicas = areas_aca();
  $dptos = departamentos();
  $all_sni = sni();
  $motivo_ausencia = ausencia();
  $personales = personal_operativo();
?>
<?php
 	if(isset($_POST['add_personal'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('NoSie','Nombre','ApPat','ApMat', 'TituloAbreviado','Nacimiento','Nacionalidad','Sexo','RFC','CURP','Celular', 'Calle'
					,'NumExterior','NumInterior','Fraccionamiento','CP','Ciudad','Estado','Email','NivelEstudio','Profesion','Puesto','Regimen','ClavePresupuestal','Interno','TipoPersona',
					'AreaAcademica','Departamento','EvaluacionDepartamento','EvaluacionAlumno','GobiernoFed','SEP','RAMA','SNI','FechaIngresoTec',
					'MotivoAusencia','Estatus');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_sie  = remove_junk($db->escape($_POST['NoSie']));
			$p_nombre   = remove_junk($db->escape($_POST['Nombre']));
			$p_app   = remove_junk($db->escape($_POST['ApPat']));
			$p_apm   = remove_junk($db->escape($_POST['ApMat']));
			$p_titulo  = remove_junk($db->escape($_POST['TituloAbreviado']));
			$p_fechan  = remove_junk($db->escape($_POST['Nacimiento']));
			$p_nac  = remove_junk($db->escape($_POST['Nacionalidad']));
			$p_sexo  = remove_junk($db->escape($_POST['Sexo']));
			$p_rfc  = remove_junk($db->escape($_POST['RFC']));
			$p_curp  = remove_junk($db->escape($_POST['CURP']));
			$p_mob  = remove_junk($db->escape($_POST['Celular']));
			$p_add  = remove_junk($db->escape($_POST['Calle']));
			$p_nume  = remove_junk($db->escape($_POST['NumExterior']));
			$p_numi  = remove_junk($db->escape($_POST['NumInterior']));
			$p_fracc  = remove_junk($db->escape($_POST['Fraccionamiento']));
			$p_cp  = remove_junk($db->escape($_POST['CP']));
			$p_cd  = remove_junk($db->escape($_POST['Ciudad']));
			$p_edo  = remove_junk($db->escape($_POST['Estado']));
			$p_email  = remove_junk($db->escape($_POST['Email']));
			$p_nivel  = remove_junk($db->escape($_POST['NivelEstudio']));
      $p_prof  = remove_junk($db->escape($_POST['Profesion']));
			$p_fun  = remove_junk($db->escape($_POST['Puesto']));
			$p_reg  = remove_junk($db->escape($_POST['Regimen']));
			$p_int  = remove_junk($db->escape($_POST['Interno']));
      $p_cpe  = remove_junk($db->escape($_POST['ClavePresupuestal']));
			$p_tip  = remove_junk($db->escape($_POST['TipoPersona']));
			$p_area  = remove_junk($db->escape($_POST['AreaAcademica']));
			$p_dpto  = remove_junk($db->escape($_POST['Departamento']));
			$p_evd  = remove_junk($db->escape($_POST['EvaluacionDepartamento']));
			$p_eva  = remove_junk($db->escape($_POST['EvaluacionAlumno']));
			$p_gobierno  = remove_junk($db->escape($_POST['GobiernoFed']));
			$p_sep  = remove_junk($db->escape($_POST['SEP']));
			$p_rama  = remove_junk($db->escape($_POST['RAMA']));
			$p_sni  = remove_junk($db->escape($_POST['SNI']));
			$p_fi  = remove_junk($db->escape($_POST['FechaIngresoTec']));
			$p_ma  = remove_junk($db->escape($_POST['MotivoAusencia']));
			$p_estatus  = remove_junk($db->escape($_POST['Estatus']));

			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();
			$query  = "INSERT INTO personal (";
			$query .=" NoSie,NombreCompleto,TituloAbreviado,FechaNacimiento,IdNacionalidad,Sexo,RFC,CURP,NumeroCelular,Calle,NumExterior,NumInterior,
                  Fraccionamiento,CP,Ciudad,Estado,Email,IdNivelEstudio,Profesion,Puesto,IdRegimen,Interno,ClavePresupuestal,IdTipoPersona,
                  IdAreaAcademica,IdDepartamento,EvaluacionDepartamento,EvaluacionAlumno,GobiernoFed,SEP,RAMA,IdSNI,FechaIngresoTec,
                  IdMotivoAusencia,Estatus";
			$query .=") VALUES (";
			$query .=" '{$p_sie}', '{$p_nombre}', '{$p_app}', '{$p_apm}', '{$p_titulo}', '{$p_fechan}','{$p_nac}', '{$p_sexo}', '{$p_rfc}', '{$p_curp}', '{$p_mob}', '{$p_add}','{$p_nume}', '{$p_numi}', '{$p_fracc}', '{$p_cp}', '{$p_cd}', '{$p_edo}','{$p_email}', '{$p_nivel}', '{$p_prof}', '{$p_fun}', '{$p_reg}', '{$p_int}','{$p_cpe}','{$p_tip}', '{$p_area}', '{$p_dpto}', '{$p_evd}', '{$p_eva}', '{$p_gobierno}','{$p_sep}', '{$p_rama}', '{$p_sni}', '{$p_fi}', '{$p_ma}', '{$p_estatus}'";
			$query .=")";
			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Personal agregado exitosamente. ");
       redirect('personal_tecnm_principal.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('personal_tecnm_principal.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('personal_tecnm_añadir.php',false);
   }
 }

	

?>
<?php include_once('layouts/header.php'); ?>
<!-- <script type="text/javascript" src="libs/js/form.js"></script> -->
<script>
  $(document).ready(function(){  
    var form_count = 1, previous_form, next_form, total_forms;
    total_forms = $("fieldset").length;  
    $(".next-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().next();
      next_form.show();
      previous_form.hide();
      // setProgressBarValue(++form_count);
    });  
    $(".previous-form").click(function(){
      previous_form = $(this).parent();
      next_form = $(this).parent().prev();
      next_form.show();
      previous_form.hide();
      setProgressBarValue(--form_count);
    });
    // Handle form submit and validation
    $( "#register_form" ).add_personal(function(event) {    
      // var error_message = '';
    //   if(!$("#sie").val()) {
    //     error_message+="Please Fill SIE Input";
    // }
    //   if(!$("#nombre").val()) {
    //       error_message+="Please Fill Name Input";
    //   }
    //   if(!$("#apPat").val()) {
    //       error_message+="<br>Please Fill Apellido Paterno";
    //   }
    //   if(!$("#apMat").val()) {
    //       error_message+="<br>Please Fill Apellido Paterno";
    //   }
    //   if(!$("#titAbre").val()) {
    //     error_message+="<br>Please Fill Titulo Abreviado";
    //   }
    //   if(!$("#fecNac").val()) {
    //     error_message+="<br>Please Fill Fecha Nacimiento";
    //   }
    //   if(!$("#nacionalidad").find(":selected").text()) {
    //     error_message+="<br>Please Fill Nacionalidad";
    //   }

    //   if(!$("#sexo").val()) {
    //     error_message+="<br>Please Fill Sexo";
    //   }
    //   if(!$("#rfc").val()) {
    //     error_message+="<br>Please Fill RFC";
    //   }
    //   if(!$("#curp").val()) {
    //     error_message+="<br>Please Fill CURP";
    //   }
    //   if(!$("#mobile").val()) {
    //     error_message+="<br>Please Fill Mobile";
    //   }
    //   if(!$("#address").val()) {
    //     error_message+="<br>Please Fill Calle";
    //   }
    //   if(!$("#numExt").val()) {
    //     error_message+="<br>Please Fill Numero Exterior";
    //   }
    //   if(!$("#numInt").val()) {
    //     error_message+="<br>Please Fill Numero Interior";
    //   }
    //   if(!$("#fracc").val()) {
    //     error_message+="<br>Please Fill Fraccionamiento";
    //   }
    //   if(!$("#cp").val()) {
    //     error_message+="<br>Please Fill Codigo Postal";
    //   }
    //   if(!$("#ciudad").val()) {
    //     error_message+="<br>Please Fill Ciudad";
    //   }
    //   if(!$("#estado").val()) {
    //     error_message+="<br>Please Fill Estado";
    //   }
    //   if(!$("#email").val()) {
    //     error_message+="<br>Please Fill Correo";
    //   }
    //   if(!$("#nivelEstudio").val()) {
    //     error_message+="<br>Please Fill Nivel Estudio";
    //   }
    //   if(!$("#profe").val()) {
    //     error_message+="<br>Please Fill Numero Profesion";
    //   }
    //   if(!$("#funcion").val()) {
    //     error_message+="<br>Please Fill Numero Puesto";
    //   }
    //   if(!$("#regimen").val()) {
    //     error_message+="<br>Please Fill Numero Regimen";
    //   }
    //   if(!$("#interno").val()) {
    //     error_message+="<br>Please Fill Numero Interno";
    //   }
    //   if(!$("#claveP").val()) {
    //     error_message+="<br>Please Fill Clave Personal";
    //   }
    //   if(!$("#tipopersona").val()) {
    //     error_message+="<br>Please Fill Tipo de Persona";
    //   }
    //   if(!$("#areaacademica").val()) {
    //     error_message+="<br>Please Fill AREA ACADEMICA";
    //   }
    //   if(!$("#departamento").val()) {
    //     error_message+="<br>Please Fill DPTO";
    //   }
    //   if(!$("#evaluacionDepartamento").val()) {
    //     error_message+="<br>Please Fill EVALUACION DPTO";
    //   }
    //   if(!$("#evaluacionAlumno").val()) {
    //     error_message+="<br>Please Fill EVALUACION ALUMNO";
    //   }
    //   if(!$("#gobiernoF").val()) {
    //     error_message+="<br>Please Fill GOBIERNO FEDERAL";
    //   }
    //   if(!$("#sep").val()) {
    //     error_message+="<br>Please Fill SEP";
    //   }
    //   if(!$("#rama").val()) {
    //     error_message+="<br>Please Fill Rama";
    //   }
    //   if(!$("#sni").val()) {
    //     error_message+="<br>Please Fill SNI";
    //   }
    //   if(!$("#fecIng").val()) {
    //     error_message+="<br>Please Fill Fecha Ingreso";
    //   }
    //   if(!$("#estatus").val()) {
    //     error_message+="<br>Please Fill Estatus";
    //   }


      // Display error if any else submit form
      if(error_message) {
          $('.alert-success').removeClass('hide').html(error_message);
          return false;
      } else {
          return true;	
      }    
    });  
  });
</script>
<style type="text/css">
  #register_form fieldset:not(:first-of-type) {
    display: none;
  }
</style>

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
            <span>Agregar Operativo</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="añadir_operativo.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <!-- <fieldset>
                    <h2>Paso 1: Datos Personales</h2> -->
                        <div class="form-group">
                            <label>Número de Sie:</label>	
                            <input type=""  class="form-control" name="Clave" required>
                        </div>

                        <div class="form-group">
                            <label>Nombre:</label>	
							              <input type="" class="form-control" name="Nombre" required>
                        </div>

                        <div class="form-group">
                            <label>Fecha de Nacimiento:</label>
							              <input type="date" class="form-control" name="Nacimiento" required>
                        </div>
                        <div class="form-group">
                            <label>Nacionalidad:</label><br>
						                <select name="departamento" class="form-control" name='Nacionalidad' required>
                                <option value=''>Seleccione una opcion</option>";
						                    <?php 
                                  $result=$db->query('SELECT * FROM nacionalidad');
                                  while($f=mysqli_fetch_array($result)) {
                              ?>
							                  <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Nacionalidad'] ?></option>
							                 <?php } ?>
						                </select>      
                        </div>

                        <div class="form-group">
                            <label>Sexo:</label><br>
						                <select class="form-control" name='Sexo' required>
                                <option value=''>Seleccione una opcion</option>
                                <option value='-'>-</option>
                                <option value='F'>Femenino</option>
                                <option value='M'>Masculino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>RFC</label>	
							              <input type="" class="form-control" name="RFC" required>
                        </div>
                            <!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/> -->
                 <!-- </fieldset>

                 <fieldset>
                    <h2> Paso 2: Domicilio</h2> -->
                    <div class="form-group">
                        <label>CURP</label>	
							          <input type="" class="form-control" name="CURP" required>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>	
							          <input type="number" class="form-control" name="Celular" required>
                    </div>
                    <div class="form-group">
                        <label>Calle</label>	
							          <input type="" class="form-control" name="Calle" required>
                    </div>
                    <div class="form-group">
                        <label>Número Exterior</label>	
							          <input type="text" class="form-control" name="NoExterior" required>
                    </div>
                    <div class="form-group">
                        <label>Número Interior</label>	
							          <input type="text" class="form-control" name="NoInterior" required>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>	
							          <input type="text" class="form-control" name="Ciudad" required>
                    </div>
                        <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" /> -->
                  </fieldset>

                    <!-- <fieldset>
                    <h2> Paso 3: Nivel de Estudios</h2> -->
                    <div class="form-group">
                        <label>Fraccionamiento</label>	
							          <input type="text" class="form-control" name="Fraccionamiento" required>
                    </div>
                    <div class="form-group">
                        <label>Código Postal</label>	
							          <input type="text" class="form-control" name="CP" required>
                    </div>
                    <div class="form-group">
                        <label>Nivel de Estudios:</label><br>
						            <select name="NivelEstudio" class="form-control" name='Estudios' required>
                          <option value=''>Seleccione una opcion</option>
						              <?php 
                              $result=$db->query('SELECT * FROM nivelEstudio');
                                while($f=mysqli_fetch_array($result)) {
                          ?>
							            <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['NivelEstudio'] ?></option>
							            <?php } ?>
						            </select>      
                    </div>

                        <div class="form-group">
                            <label>Función / Puesto</label><br>
						    <select name="Puesto" class="form-control" name='Puesto' required>
                            <option value=''>Seleccione una opcion</option>
						    <?php 
                              $result=$db->query('SELECT * FROM puesto');
                                while($f=mysqli_fetch_array($result)) {
                              ?>
							    <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Puesto'] ?></option>
							    <?php } ?>
						    </select>      
                        </div>

                        <div class="form-group">
                            <label>Regimen</label><br>
						    <select name="Regimen" class="form-control" name='Regimen' required>
                            <option value=''>Seleccione una opcion</option>
						    <?php 
                              $result=$db->query('SELECT * FROM regimen');
                                while($f=mysqli_fetch_array($result)) {
                              ?>
							    <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Regimen'] ?></option>
							    <?php } ?>
						    </select>      
                        </div>

                        <div class="form-group">
                            <label>Departamento:</label><br>
						    <select name="Departamento" class="form-control" required>
                            <option value=''>Seleccione una opcion</option>
						    <?php 
                              $result=$db->query('SELECT * FROM departamento');
                                while($f=mysqli_fetch_array($result)) {
                              ?>
							    <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Departamento'] ?></option>
							    <?php } ?>
						    </select>      
                        </div>


                          
                      <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" /> -->
                      <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                      <button type="submit" name="submit" class="btn btn-primary">Agregar</button> 
                
                        <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />  -->
                    <!-- </fieldset> -->


                    </div>
                    </div>
                </div>
                <!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="submit" class="btn btn-primary">Agregar proveedor</button> -->
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>