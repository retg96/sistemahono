<?php
/* To use with CURL:
curl -d"id=1&product-name=Filtro de gasolina&partNo=FILT_AB0F01&category=1&location=X1&photo=1&quantity=90&buy-price=5&sale-price=7.5&update-product" localhost/htdocs_2019.03.12/edit_product.php?id=1
*/
?>

<?php
  $page_title = 'Editar Persona';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php

$personal = find_by_id('personal',(int)$_GET['id']);
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
$all_personales = find_all('personal');
// $all_categories = find_all('categories');
// $all_proveedores = find_all('proveedor');
// $all_photo = find_all('media');
if(!$personal){
  $session->msg("d","Error: No se encontró id de la persona.");
  redirect('personal_tecnm_principal.php');
}
?>
<?php
if(isset($_POST['update-personal'])){
	// 	$req_fields = array('product-name','partNo','category','photo','quantity',
    //   'buy-price', 'location', 'prove');

    $req_fields = array('NoSie','Nombre','ApPat','ApMat', 'TituloAbreviado','Nacimiento','Nacionalidad','Sexo','RFC','CURP','Celular', 'Calle'
					,'NumExterior','NumInterior','Fraccionamiento','CP','Ciudad','Estado','Email','NivelEstudio','Profesion','Puesto','Regimen','ClavePresupuestal','Interno','TipoPersona',
					'AreaAcademica','Departamento','EvaluacionDepartamento','EvaluacionAlumno','GobiernoFed','SEP','RAMA','SNI','FechaIngresoTec',
					'MotivoAusencia','Estatus');

      // $req_fields = array('product-name','partNo','category','photo','quantity',
      // 'buy-price', 'sale-price', 'location', 'prove');
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
			$p_int  = remove_junk($db->escape(isset($_POST['Interno']) ? $_POST['Interno'] : ""));
      $p_cpe  = remove_junk($db->escape(isset($_POST['ClavePresupuestal'])? $_POST['ClavePresupuestal'] : ""));
			$p_tip  = remove_junk($db->escape($_POST['TipoPersona']));
			$p_area  = remove_junk($db->escape($_POST['AreaAcademica']));
			$p_dpto  = remove_junk($db->escape($_POST['Departamento']));
			$p_evd  = remove_junk($db->escape($_POST['EvaluacionDepartamento']));
			$p_eva  = remove_junk($db->escape($_POST['EvaluacionAlumno']));
			$p_gobierno  = remove_junk($db->escape(isset($_POST['GobiernoFed'])? $_POST['GobiernoFed'] : ""));
			$p_sep  = remove_junk($db->escape(isset($_POST['SEP'])? $_POST['SEP'] : ""));
			$p_rama  = remove_junk($db->escape(isset($_POST['RAMA'])? $_POST['RAMA'] : ""));
			$p_sni  = remove_junk($db->escape(isset($_POST['SNI'])? $_POST['SNI'] : ""));
			$p_fi  = remove_junk($db->escape($_POST['FechaIngresoTec']));
			$p_ma  = remove_junk($db->escape($_POST['MotivoAusencia']));
			$p_estatus  = remove_junk($db->escape($_POST['Estatus']));
    //   $p_name  = remove_junk($db->escape($_POST['product-name']));
    //   $p_partNo = remove_junk($db->escape($_POST['partNo'])); 
    //   $p_cat   = (int)$_POST['category'];
    //   $p_qty   = remove_junk($db->escape($_POST['quantity']));
    //   $p_buy   = remove_junk($db->escape($_POST['buy-price']));
      // $p_sale  = remove_junk($db->escape($_POST['sale-price']));

    //   $p_loc   = remove_junk($db->escape($_POST['location']));
    //   $p_prove = remove_junk($db->escape($_POST['prove']));
    //   if (is_null($_POST['photo']) || $_POST['photo'] === "") {
    //    $media_id = '0';
    //   } else {
    //    $media_id = remove_junk($db->escape($_POST['photo']));
    //   }
      $query   = "UPDATE personal SET";
      $query  .=" NoSie ='{$p_sie}', ";
      $query  .=" Nombre ='{$p_nombre}', ";
      $query  .=" ApPat ='{$p_app}', ";
      $query  .=" ApMat ='{$p_apm}',";
      $query  .=" TituloAbreviado ='{$p_titulo}',";
      $query  .=" FechaNacimiento ='{$p_fechan}',";
      $query  .=" IdNacionalidad ='{$p_nac}',";
      $query  .=" Sexo='{$p_sexo}',";
      $query  .=" RFC='{$p_rfc}',";
      $query  .=" CURP='{$p_curp}',";
      $query  .=" NumeroCelular='{$p_mob}',";
      $query  .=" Calle='{$p_add}',";
      $query  .=" NumExterior='{$p_nume}',";
      $query  .=" NumInterior='{$p_numi}',";
      $query  .=" Fraccionamiento='{$p_fracc}',";
      $query  .=" CP='{$p_cp}',";
      $query  .=" Ciudad='{$p_cd}',";
      $query  .=" Estado='{$p_edo}',";
      $query  .=" Email='{$p_email}',";
      $query  .=" IdNivelEstudio='{$p_nivel}',";
      $query  .=" Profesion='{$p_prof}',";
      $query  .=" Puesto='{$p_fun}',";
      $query  .=" IdRegimen='{$p_reg}',";
      $query  .=" Interno='{$p_int}',";
      $query  .=" ClavePresupuestal='{$p_cpe}',";
      $query  .=" IdTipoPersona='{$p_tip}',";
      $query  .=" IdAreaAcademica='{$p_area}',";
      $query  .=" IdDepartamento='{$p_dpto}',";
      $query  .=" EvaluacionDepartamento='{$p_evd}',";
      $query  .=" EvaluacionAlumno='{$p_eva}',";
      $query  .=" GobiernoFed='{$p_gobierno}',";
      $query  .=" SEP='{$p_sep}',";
      $query  .=" RAMA='{$p_rama}',";
      $query  .=" IdSNI='{$p_sni}',";
      $query  .=" FechaIngresoTec='{$p_fi}',";
      $query  .=" IdMotivoAusencia='{$p_ma}',";
      $query  .=" Estatus='{$p_estatus}'";
      $query  .=" WHERE id ='{$personal['id']}'";

      $result = $db->query($query);
      			if( $result ) {
      				if( $db->affected_rows() === 1 ) {
      					$session->msg('s',"Personal ha sido actualizado.");
      				} else {
      					/* no row was changed */
      					$session->msg('w',"No se cambió ningún registro." 
      					//. "query: " . $query 
      				 	. "Info: " . $db->get_info( )
      				 	);
      				}
              print( "Producto ha sido actualizado\n" );
      				redirect('personal_tecnm_principal.php', false);
              //redirect('edit_product.php?id='.$product['id'], false);
           	}
      			else {
      				/* SQL query error */
          		$session->msg('d',"Lo siento, actualización falló." 
             	. "Message: " . $db->get_last_error( ) 
             	);
              //print( "Failed\n" );
             	redirect('edit_personal.php?id='.$personal['id'], false);
            }

   } else{
      $session->msg("d", $errors);
      //print( "error\n" );
     	redirect('edit_personal.php?id='.$personal['id'], false);
   }

//exit;
}

?>
<?php include_once('layouts/header.php'); ?>

<!--here-->
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
    $( "#register_form" ).submit(function(event) {    
      var error_message = '';
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
            <span>Editar Persona</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="edit_personal.php?id=<?php echo (int)$personal['id'] ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <fieldset>
                    <h2>Paso 1: Datos Personales</h2>
                        <div class="form-group">
                            <label for="">No. Sie</label>
                            <input type="text" class="form-control" name="NoSie" id="sie" value="<?php echo remove_junk($personal['NoSie']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="Nombre" id="nombre" value="<?php echo remove_junk($personal['Nombre']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Paterno</label>
                            <input type="text" class="form-control" name="ApPat" id="apPat" value="<?php echo remove_junk($personal['ApPat']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Materno</label>
                            <input type="text" class="form-control" name="ApMat" id="apMat" value="<?php echo remove_junk($personal['ApMat']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="">Título Abreviado</label>
                            <input type="text" class="form-control" name="TituloAbreviado" id="titAbre" value="<?php echo remove_junk($personal['TituloAbreviado']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="fecNac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="Nacimiento" id="fecNac" value="<?php echo remove_junk($personal['FechaNacimiento']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="Nac">Nacionalidad</label>
                            <select class="form-control" name='Nacionalidad' id="nacionalidad">
                              <option value="">Selecciona una opcion</option>
                              <?php  foreach ($nacionalidades as $nacionalidad): ?>
                                <option value="<?php echo (int)$nacionalidad['id']; ?>" <?php if($personal['IdNacionalidad'] === $nacionalidad['id']): echo "selected"; endif; ?> >
                                <?php echo remove_junk($nacionalidad['Nacionalidad']); ?></option>
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
                             <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['Sexo']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="">RFC</label>
                            <input type="text" class="form-control" name='RFC' id="rfc" value="<?php echo remove_junk($personal['RFC']);?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" name="CURP" id="curp" value="<?php echo remove_junk($personal['CURP']);?>" autofocus>
                        </div>
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/>
                 </fieldset>

                 <fieldset>
                    <h2> Paso 2: Domicilio</h2>
                    <div class="form-group">
	                    <label for="mobile">Número de Celular</label>
	                    <input type="text" class="form-control" name="Celular" id="mobile" value="<?php echo remove_junk($personal['NumeroCelular']);?>" autofocus>
	                </div>
	                <div class="form-group">
                        <label for="address">Calle</label>
                        <input type="text"  class="form-control" id="address" name="Calle" value="<?php echo remove_junk($personal['Calle']);?>" autofocus>
	                </div>
                  <div class="form-group">
                        <label for="numExt">Número Exterior</label>
                        <input type="text" class="form-control" name="NumExterior" id="numExt" value="<?php echo remove_junk($personal['NumExterior']);?>" autofocus>
                  </div>
                  <div class="form-group">
                        <label for="numInt">Número Interior</label>
                        <input type="text" class="form-control" name="NumInterior" id="numInt" value="<?php echo remove_junk($personal['NumInterior']);?>" autofocus>
                  </div>
                  <div class="form-group">
                        <label for="fracc">Fraccionamiento</label>
                        <input type="text" class="form-control" name="Fraccionamiento" id="fracc" value="<?php echo remove_junk($personal['Fraccionamiento']);?>" autofocus>
                  </div>
                  <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="text" class="form-control" name="CP" id="cp" value="<?php echo remove_junk($personal['CP']);?>" autofocus>
                  </div>
                  <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="Ciudad" id="ciudad" value="<?php echo remove_junk($personal['Ciudad']);?>" autofocus>
                  </div>
                  <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="Estado" id="estado" value="<?php echo remove_junk($personal['Estado']);?>" autofocus>
                  </div>
                  <div class="form-group">
                      <label for="email">Correo</label>
                      <input type="email" class="form-control" id="email" name="Email" value="<?php echo remove_junk($personal['Email']);?>" autofocus>
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
                            <option value="<?php echo (int)$estudio['id']; ?>" <?php if($personal['IdNivelEstudio'] === $estudio['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($estudio['NivelEstudio']); ?></option>
                              <?php endforeach; ?>
                      </select>



	                    <!-- <input type="text" class="form-control" name="nivEst" id="nivEst" placeholder="Nivel de Estudios"> -->
	                  </div>
                    <div class="form-group">
                        <label for="profe">Profesión</label>
                        <input type="text" class="form-control" name="Profesion" id="profe" value="<?php echo remove_junk($personal['Profesion']);?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="funcion">Función/Puesto</label>
                        <select class="form-control" name='Puesto' id="funcion">
                        <option value="">Selecciona una opcion</option>
                        <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['Puesto']); ?></option>
                            <?php endforeach; ?>
                      </select>
                        <!-- <input type="text" class="form-control" name="funcion" id="funcion" placeholder="Función Puesto"> -->
                    </div>
                    <div class="form-group">
                        <label for="regimen">Régimen</label>
                        <select class="form-control" name='Regimen' id="regimen" onchange='habilitarSelect(this.value);'>
                        <option value="">Selecciona una opcion</option>
                        <?php  foreach ($regimenes as $regimen): ?>
                            <option value="<?php echo (int)$regimen['id']; ?>" <?php if($personal['IdRegimen'] === $regimen['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($regimen['Regimen']); ?></option>
                              <?php endforeach; ?>
                      </select>
                        <!-- <input type="text" class="form-control" name="regimen" id="regimen" placeholder="Régimen"> -->
                    </div>
                    <div class="form-group">
                        <label for="">Interno</label>
                        <select class="form-control" name='Interno' id='interno' disabled='true'>
                            <option value=''>Seleccione una opcion</option>
                            <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['Interno']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input type="text" class="form-control" name="inter" id="inter" placeholder="Interno" disabled="true"> -->
                    </div>
                    <div class="form-group">
                        <label for="">Clave Presupuestal</label>
                        <input type="text" class="form-control" name="ClavePresupuestal" id="claveP" value="<?php echo remove_junk($personal['ClavePresupuestal']);?>" autofocus disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Persona</label>
                        <select class="form-control" name='TipoPersona' id="tipopersona">
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($tipo_personas as $persona): ?>
                            <option value="<?php echo (int)$persona['id']; ?>" <?php if($personal['IdTipoPersona'] === $persona['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($persona['TipoPersona']); ?></option>
                              <?php endforeach; ?>
                      </select>                
                    </div>

                    <div class="form-group">
                        <label for="">Área Académica</label>
                        <select class="form-control" name='AreaAcademica' id="areaacademica">
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($areas_academicas as $area): ?>
                            <option value="<?php echo (int)$area['id']; ?>" <?php if($personal['IdAreaAcademica'] === $area['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($area['AreaAcademica']); ?></option>
                              <?php endforeach; ?>
                      </select>                      
                    </div>

                    <div class="form-group">
                        <label for="">Departamento</label>
                        <select class="form-control" name='Departamento' id="departamento">
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($dptos as $dpto): ?>
                            <option value="<?php echo (int)$dpto['id']; ?>" <?php if($personal['IdDepartamento'] === $dpto['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($dpto['Departamento']); ?></option>
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
                            <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['EvaluacionDepartamento']); ?></option>
                            <?php endforeach; ?>
                        </select>	                  
                    </div>
                    <div class="form-group">
                        <label for="">Evaluación del Alumno</label>
                        <select class="form-control" name='EvaluacionAlumno' id="evaluacionAlumno">
                            <option value=''>Seleccione una opcion</option>
                            <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['EvaluacionAlumno']); ?></option>
                            <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="">Gobierno Federal</label>
                        <input type="date" class="form-control" name='GobiernoFed' id='gobiernoF' value="<?php echo remove_junk($personal['GobiernoFed']);?>" autofocus disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">S.E.P.</label>
                        <input type="date" class="form-control"  name='SEP' id='sep' value="<?php echo remove_junk($personal['SEP']);?>" autofocus disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="">Rama</label>
                        <input type="date" class="form-control" name='RAMA' id='rama' value="<?php echo remove_junk($personal['RAMA']);?>" autofocus disabled='true'>
                    </div>
                    <div class="form-group">
                        <label for="smi">S.N.I.</label>
                        <select class="form-control" name='SNI' id="sni" disabled='true'>
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_sni as $sni): ?>
                            <option value="<?php echo (int)$sni['id']; ?>" <?php if($personal['IdSNI'] === $sni['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($sni['SNI']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name='FechaIngresoTec' id="fecIng" value="<?php echo remove_junk($personal['FechaIngresoTec']);?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo Contratación</label>
                        <select class="form-control" name='MotivoAusencia' id="motivoAusencia">
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($motivo_ausencia as $motivo): ?>
                            <option value="<?php echo (int)$motivo['id']; ?>" <?php if($personal['IdMotivoAusencia'] === $motivo['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($motivo['MotivoAusencia']); ?></option>
                              <?php endforeach; ?>
                      </select>       
                   
                    </div>
                     <div class="form-group">
                        <label for="esta">Estatus</label>
                        <select class="form-control" name='Estatus' id="estatus">
                          <option value=''>Seleccione una opcion</option>";
                          <?php  foreach ($all_personales as $perso): ?>
                              <option value="<?php echo (int)$perso['id']; ?>" <?php if($personal['id'] === $perso['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($perso['Estatus']); ?></option>
                            <?php endforeach; ?>  
                        </select>                    
                    </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <!-- <button type="submit" name="submit" class="btn btn-primary">Agregar proveedor</button> -->
                        <input type="submit" name="update-personal" class="submit btn btn-success" value="Agregar" />
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

