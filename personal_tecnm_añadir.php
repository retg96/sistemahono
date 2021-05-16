<?php
  $page_title = 'Agregar Personal';
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
  $personales = personal();
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
			$query .=" NoSie,Nombre,ApPat,ApMat,TituloAbreviado,FechaNacimiento,IdNacionalidad,Sexo,RFC,CURP,NumeroCelular,Calle,NumExterior,NumInterior,
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
<script>
	function habilitarSelect(valor){
		if(valor==1){
		document.getElementById("interno").disabled = false;
		document.getElementById("claveP").disabled = false;
		document.getElementById("gobiernoF").disabled = false;
		document.getElementById("sep").disabled = false;
		document.getElementById("rama").disabled = false;
		document.getElementById("sni").disabled = false;
		}
		else {
		document.getElementById("interno").disabled = true;
		document.getElementById("claveP").disabled = true;
		document.getElementById("gobiernoF").disabled = true;
		document.getElementById("sep").disabled = true;
		document.getElementById("rama").disabled = true;
		document.getElementById("sni").disabled = true;
		}
		}
	</script>
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
            <span>Agregar Personal</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="personal_tecnm_añadir.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <fieldset>
                    <h2>Paso 1: Datos Personales</h2>
                        <div class="form-group">
                            <label for="">No. Sie</label>
                            <input type="text" class="form-control" name="NoSie" id="sie" placeholder="Número de Sie">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Paterno</label>
                            <input type="text" class="form-control" name="ApPat" id="apPat" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Materno</label>
                            <input type="text" class="form-control" name="ApMat" id="apMat" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="">Título Abreviado</label>
                            <input type="text" class="form-control" name="TituloAbreviado" id="titAbre" placeholder="Título Abreviado">
                        </div>
                        <div class="form-group">
                            <label for="fecNac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="Nacimiento" id="fecNac" placeholder="Fecha de Nacimiento">
                        </div>
                        <div class="form-group">
                            <label for="Nac">Nacionalidad</label>
                            <select class="form-control" name='Nacionalidad' id="nacionalidad">
                              <option value="">Selecciona una opcion</option>
                              <?php  foreach ($nacionalidades as $nacionalidad): ?>
                              <option value="<?php echo (int)$nacionalidad['id'] ?>">
                              <?php echo $nacionalidad['Nacionalidad'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        
                            <!-- <input type="text" class="form-control" name="Nac" id="Nac" placeholder="Nacionalidad"> -->
                        </div>
                        <script>
                        //   (function(){
                        //   $('#nacionalidad').change(function(){
                        //       console.log($(this).val());
                        //     });
                        // })();
                        // $("select#nacionalidad").change(function(){
                        //   var selectedNacionalidad = $(this).children("option:selected").val();
                        //   if(!$("select#nacionalidad")){
                        //     console.log("Favir de seleccionar una nacionalidad");
                        //   }else{
                        //     console.log("You have selected the country - " + selectedNacionalidad);
                        //   }
                        // });
                        </script>
                         <div class="form-group">
                            <label for="">Sexo</label>
                            <!-- <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sexo"> -->
                             <select class="form-control" name='Sexo' id="sexo">
                               <option value=''>Seleccione una opcion</option>
                               <!-- <option value='-'>-</option> -->
                               <option value='F'>Femenino</option>
                               <option value='M'>Masculino</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">RFC</label>
                            <input type="text" class="form-control" name='RFC' id="rfc" placeholder="RFC">
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" name="CURP" id="curp" placeholder="CURP">
                        </div>
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/>
                 </fieldset>

                 <fieldset>
                    <h2> Paso 2: Domicilio</h2>
                    <div class="form-group">
	                    <label for="mobile">Número de Celular</label>
	                    <input type="text" class="form-control" name="Celular" id="mobile" placeholder="Número de Celular">
	                </div>
	                <div class="form-group">
                        <label for="address">Calle</label>
                        <textarea  class="form-control" id="address" name="Calle" placeholder="Dirección" required></textarea>
	                </div>
                  <div class="form-group">
                        <label for="numExt">Número Exterior</label>
                        <input type="text" class="form-control" name="NumExterior" id="numExt" placeholder="Número Ext.">
                  </div>
                  <div class="form-group">
                        <label for="numInt">Número Interior</label>
                        <input type="text" class="form-control" name="NumInterior" id="numInt" placeholder="Número Int.">
                  </div>
                  <div class="form-group">
                        <label for="fracc">Fraccionamiento</label>
                        <input type="text" class="form-control" name="Fraccionamiento" id="fracc" placeholder="Fracc">
                  </div>
                  <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="text" class="form-control" name="CP" id="cp" placeholder="CP">
                  </div>
                  <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="Ciudad" id="ciudad" placeholder="Ciudad">
                  </div>
                  <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="Estado" id="estado" placeholder="Estado">
                  </div>
                  <div class="form-group">
                      <label for="email">Correo</label>
                      <input type="email" class="form-control" id="email" name="Email" placeholder="Correo">
	                </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                  </fieldset>

                    <fieldset>
                    <h2> Paso 3: Nivel de Estudios</h2>
                    <div class="form-group">
	                    <label for="nivEst">Nivel de Estudios</label>
                      <select class="form-control" name='NivelEstudio' id="nivelEstudio">
                        <option value="">Selecciona una opcion</option>
                          <?php  foreach ($estudios as $estudio): ?>
                          <option value="<?php echo (int)$estudio['id'] ?>">
                          <?php echo $estudio['NivelEstudio'] ?></option>
                          <?php endforeach; ?>
                      </select>

	                    <!-- <input type="text" class="form-control" name="nivEst" id="nivEst" placeholder="Nivel de Estudios"> -->
	                  </div>
                    <div class="form-group">
                        <label for="profe">Profesión</label>
                        <input type="text" class="form-control" name="Profesion" id="profe" placeholder="Profesión">
                    </div>
                    <div class="form-group">
                        <label for="funcion">Función/Puesto</label>
                        <select class="form-control" name='Puesto' id="funcion">
                        <option value="">Selecciona una opcion</option>
                          <?php  foreach ($puestos as $puesto): ?>
                          <option value="<?php echo (int)$puesto['id'] ?>">
                          <?php echo $puesto['Puesto'] ?></option>
                          <?php endforeach; ?>
                      </select>
                        <!-- <input type="text" class="form-control" name="funcion" id="funcion" placeholder="Función Puesto"> -->
                    </div>
                    <div class="form-group">
                        <label for="regimen">Régimen</label>
                        <select class="form-control" name='Regimen' id="regimen" onchange='habilitarSelect(this.value);'>
                        <option value="">Selecciona una opcion</option>
                          <?php  foreach ($regimenes as $regimen): ?>
                          <option value="<?php echo (int)$regimen['id'] ?>">
                          <?php echo $regimen['Regimen'] ?></option>
                          <?php endforeach; ?>
                      </select>
                        <!-- <input type="text" class="form-control" name="regimen" id="regimen" placeholder="Régimen"> -->
                    </div>
                    <div class="form-group">
                        <label for="">Interno</label>
                        <select class="form-control" name='Interno' id='interno' disabled='true'>
                            <option value=''>Seleccione una opcion</option>
                            <option value='S'>Si</option>
                            <option value='N'>No</option>
                        </select>
                        <!-- <input type="text" class="form-control" name="inter" id="inter" placeholder="Interno" disabled="true"> -->
                    </div>
                    <div class="form-group">
                        <label for="">Clave Presupuestal</label>
                        <input type="text" class="form-control" name="ClavePresupuestal" id="claveP" placeholder="Cve Presupuestal" disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Persona</label>
                        <select class="form-control" name='TipoPersona' id="tipopersona">
                          <option value="">Selecciona una opcion</option>
                            <?php  foreach ($tipo_personas as $persona): ?>
                            <option value="<?php echo (int)$persona['id'] ?>">
                            <?php echo $persona['TipoPersona'] ?></option>
                            <?php endforeach; ?>
                      </select>                
                    </div>
                    <div class="form-group">
                        <label for="">Área Académica</label>
                        <select class="form-control" name='AreaAcademica' id="areaacademica">
                          <option value="">Selecciona una opcion</option>
                            <?php  foreach ($areas_academicas as $area): ?>
                            <option value="<?php echo (int)$area['id'] ?>">
                            <?php echo $area['AreaAcademica'] ?></option>
                            <?php endforeach; ?>
                      </select>                      
                    </div>
                    <div class="form-group">
                        <label for="">Departamento</label>
                        <select class="form-control" name='Departamento' id="departamento">
                          <option value="">Selecciona una opcion</option>
                            <?php  foreach ($dptos as $dpto): ?>
                            <option value="<?php echo (int)$dpto['id'] ?>">
                            <?php echo $dpto['Departamento'] ?></option>
                            <?php endforeach; ?>
                        </select>                     
                    </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                    </fieldset>

                    <fieldset>
                    <h2> Paso 4: Evaluación</h2>
                    <div class="form-group">
	                    <label for="">Evaluación del Departamento</label>
                        <select class="form-control" name='EvaluacionDepartamento' id="evaluacionDepartamento">
                            <option value=''>Seleccione una opcion</option>
                            <option value='1'>Insuficiente</option>
                            <option value='2'>Suficiente</option>
                            <option value='3'>Satisfactorio</option>
                            <option value='4'>Muy Satisfactorio</option>
                            <option value='5'>Excelente</option>
                            <option value='6'>Nuevo Ingreso</option>
                        </select>	                  
                    </div>
                    <div class="form-group">
                        <label for="">Evaluación del Alumno</label>
                        <select class="form-control" name='EvaluacionAlumno' id="evaluacionAlumno">
                            <option value=''>Seleccione una opcion</option>
                            <option value='1'>Insuficiente</option>
                            <option value='2'>Suficiente</option>
                            <option value='3'>Satisfactorio</option>
                            <option value='4'>Muy Satisfactorio</option>
                            <option value='5'>Excelente</option>
                            <option value='6'>Nuevo Ingreso</option>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="">Gobierno Federal</label>
                        <input type="date" class="form-control" name='GobiernoFed' id='gobiernoF' disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">S.E.P.</label>
                        <input type="date" class="form-control"  name='SEP' id='sep' disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">Rama</label>
                        <input type="date" class="form-control" name='RAMA' id='rama' disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="smi">S.N.I.</label>
                        <select class="form-control" name='SNI' id="sni" disabled='true'>
                          <option value="">Selecciona una opcion</option>
                            <?php  foreach ($all_sni as $sni): ?>
                            <option value="<?php echo (int)$sni['id'] ?>">
                            <?php echo $sni['SNI'] ?></option>
                            <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name='FechaIngresoTec' id="fecIng">
                    </div>
                    <div class="form-group">
                        <label for="">Motivo Contratación</label>
                        <select class="form-control" name='MotivoAusencia' id="motivoAusencia">
                          <option value="">Selecciona una opcion</option>
                            <?php  foreach ($motivo_ausencia as $motivo): ?>
                            <option value="<?php echo (int)$motivo['id'] ?>">
                            <?php echo $motivo['MotivoAusencia'] ?></option>
                            <?php endforeach; ?>
                      </select>       
                   
                    </div>
                     <div class="form-group">
                        <label for="esta">Estatus</label>
                        <select class="form-control" name='Estatus' id="estatus">
                          <option value=''>Seleccione una opcion</option>";   
                            <option value='Activo'>Activo</option>
                            <option value='Inactivo'>Inactivo</option>
                        </select>                    
                    </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <!-- <button type="submit" name="submit" class="btn btn-primary">Agregar proveedor</button> -->
                        <input type="submit" name="add_personal" class="submit btn btn-success" value="Agregar" />
                    </fieldset>	

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