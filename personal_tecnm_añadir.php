<?php
  $page_title = 'AGREGAR PERSONAL TECNM';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
//   page_require_level(2);
  // $all_categories = find_all('categories');
  // $all_photo = find_all('media');
  $nacionalidades = nacionalidades();
  $estudios = estudios();
  $puestos = puestos();
  $regimenes = regimenes();

?>
<!-- <?php
//  if(isset($_POST['add_proveedor'])){
//    $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
//    validate_fields($req_fields);
//    if(empty($errors)){
//       $p_name  = remove_junk($db->escape($_POST['nombre_prov']));
//       $p_soc   = remove_junk($db->escape($_POST['raz_soc']));
//       $p_dir   = remove_junk($db->escape($_POST['direccion']));
//       $p_telf   = remove_junk($db->escape($_POST['telefono']));
//       $p_correo  = remove_junk($db->escape($_POST['correo']));
//       $p_comp  = remove_junk($db->escape($_POST['ord_comp']));

    //  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
    //    $media_id = '0';
    //  } else {
    //    $media_id = remove_junk($db->escape($_POST['product-photo']));
    //  }
    //  $date    = make_date();
    //  $query  = "INSERT INTO proveedor (";
    //  $query .=" NOMBRE,RAZ_SOC,DIREC,TELF,EMAIL,ID_COMPRA";
    //  $query .=") VALUES (";
    //  $query .=" '{$p_name}', '{$p_soc}', '{$p_dir}', '{$p_telf}', '{$p_correo}', '{$p_comp}'";
    //  $query .=")";
    //  $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
//      if($db->query($query)){
//        $session->msg('s',"Proveedor registrado exitosamente. ");
//        redirect('add_proveedor.php', false);
//      } else {
//        $session->msg('d',' Lo siento, registro falló.');
//        redirect('Proveedores.php', false);
//      }

//    } else{
//      $session->msg("d", $errors);
//      redirect('add_proveedor.php',false);
//    }

//  }

?> -->
<?php include_once('layouts/header.php'); ?>
<script type="text/javascript" src="libs/js/form.js"></script>

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
            <span>AGREGAR PERSONAL NUEVO</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
          <form id="register_form" method="post" action="multi_form_action.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <fieldset>
                    <h2>Paso 1: Datos Personales</h2>
                        <div class="form-group">
                            <label for="sie">No. Sie</label>
                            <input type="text" class="form-control" name="sie" id="sie" placeholder="Número de Sie">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apPat">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apPat" id="apPat" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="apMat">Apellido Materno</label>
                            <input type="text" class="form-control" name="apMat" id="apMat" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="titAbre">Título Abreviado</label>
                            <input type="text" class="form-control" name="titAbre" id="titAbre" placeholder="Título Abreviado">
                        </div>
                        <div class="form-group">
                            <label for="fecNac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="fecNac" id="fecNac" placeholder="Fecha de Nacimiento">
                        </div>
                        <div class="form-group">
                            <label for="Nac">Nacionalidad</label>
                            <select name='Nac' required>
                            <option value=''>Seleccione una opcion</option>";
                                
                           <?php foreach($nacionalidades as $nacionalidad): ?>
                            <option value="<?php echo $nacionalidad['id']; ?>"><?php echo $nacionalidad['Nacionalidad']; ?></option>
                           <?php endforeach;?>
                        </select>
                            <!-- <input type="text" class="form-control" name="Nac" id="Nac" placeholder="Nacionalidad"> -->
                        </div>
                        <div class="form-group">
                            <label for="Sex">Sexo</label>
                            <!-- <input type="text" class="form-control" name="Sex" id="Sex" placeholder="Sexo"> -->
                            <select name='Sex' required>
                            <option value=''>Seleccione una opcion</option>
                            <!-- <option value='-'>-</option> -->
                            <option value='F'>Femenino</option>
                            <option value='M'>Masculino</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" placeholder="RFC">
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP</label>
                            <input type="text" class="form-control" name="curp" id="curp" placeholder="CURP">
                        </div>
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/>
                 </fieldset>

                 <fieldset>
                    <h2> Paso 2: Domicilio</h2>
                    <div class="form-group">
	                    <label for="mobile">Número de Celular</label>
	                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Número de Celular">
	                </div>
	                <div class="form-group">
                        <label for="address">Calle</label>
                        <textarea  class="form-control" name="address" placeholder="Communication Address"></textarea>
	                </div>
                  <div class="form-group">
                        <label for="numExt">Número Exterior</label>
                        <input type="text" class="form-control" name="numExt" id="numExt" placeholder="Número Ext.">
                  </div>
                  <div class="form-group">
                        <label for="numInt">Número Interior</label>
                        <input type="text" class="form-control" name="numInt" id="numInt" placeholder="Número Int.">
                  </div>
                  <div class="form-group">
                        <label for="fracc">Fraccionamiento</label>
                        <input type="text" class="form-control" name="fracc" id="fracc" placeholder="Fracc">
                  </div>
                  <div class="form-group">
                        <label for="cp">Código Postal</label>
                        <input type="text" class="form-control" name="cp" id="cp" placeholder="CP">
                  </div>
                  <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad">
                  </div>
                  <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado">
                  </div>
                  <div class="form-group">
                      <label for="email">Correo</label>
                      <input type="email" class="form-control" required id="email" name="email" placeholder="Correo">
	                </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                    </fieldset>

                    <fieldset>
                    <h2> Paso 3: Nivel de Estudios</h2>
                    <div class="form-group">
	                    <label for="nivEst">Nivel de Estudios</label>
                      <select name='Nacionalidad' required>
                            <option value=''>Seleccione una opcion</option>";
                                
                           <?php foreach($estudios as $estudio): ?>
                            <option value="<?php echo $estudio['id']; ?>"><?php echo $estudio['NivelEstudio']; ?></option>
                           <?php endforeach;?>
                      </select>
	                    <!-- <input type="text" class="form-control" name="nivEst" id="nivEst" placeholder="Nivel de Estudios"> -->
	                  </div>
                    <div class="form-group">
                        <label for="profe">Profesión</label>
                        <input type="text" class="form-control" name="profe" id="profe" placeholder="Profesión">
                    </div>
                    <div class="form-group">
                        <label for="funcion">Función/Puesto</label>
                        <select name='funcion' required>
                          <option value=''>Seleccione una opcion</option>";   
                          <?php foreach($puestos as $puesto): ?>
                          <option value="<?php echo $puesto['id']; ?>"><?php echo $puesto['Puesto']; ?></option>
                           <?php endforeach;?>
                        </select>
                        <!-- <input type="text" class="form-control" name="funcion" id="funcion" placeholder="Función Puesto"> -->
                    </div>
                    <div class="form-group">
                        <label for="regimen">Régimen</label>
                        <select name='regimen' onchange='habilitarSelect(this.value);' required>
                          <option value=''>Seleccione una opcion</option>";   
                          <?php foreach($regimenes as $regimen): ?>
                            <option value="<?php echo $regimen['id']; ?>"><?php echo $regimen['Regimen']; ?></option>
                           <?php endforeach;?>
                        </select>
                        <!-- <input type="text" class="form-control" name="regimen" id="regimen" placeholder="Régimen"> -->
                    </div>
                    <div class="form-group">
                        <label for="">Interno</label>
                          <select name="Interno" id="interno" disabled="true" required>
									          <option value="<?php echo $fa['Interno']; ?>">
										        <?php 
                              $inter="-";
                              if($fa['Interno'] == 'S'){
                                $inter = "Si";
                              }else if($fa['Interno']== 'N'){
                                $inter = "No";
                            }
                            echo "$inter"; 

										        ?>  
                              </option>
                              <option value="S">Si</option>
                              <option value="N">No</option>
								          </select>
                        <!-- <input type="text" class="form-control" name="inter" id="inter" placeholder="Interno" disabled="true"> -->
                    </div>
                    <div class="form-group">
                        <label for="cvePre">Clave Presupuestal</label>
                        <input type="text" class="form-control" name="cvePre" id="cvePre" placeholder="Cve Presupuestal">
                    </div>
                    <div class="form-group">
                        <label for="tipPer">Tipo de Persona</label>
                        <input type="text" class="form-control" name="tipPer" id="tipPer" placeholder="Tipo de Persona">
                    </div>
                    <div class="form-group">
                        <label for="areaAca">Área Académica</label>
                        <input type="text" class="form-control" name="areaAca" id="areaAca" placeholder="Área Académica">
                    </div>
                    <div class="form-group">
                        <label for="dpto">Departamento</label>
                        <input type="text" class="form-control" name="dpto" id="dpto" placeholder="Departamento">
                    </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                    </fieldset>

                    <fieldset>
                    <h2> Paso 4: Evaluación</h2>
                    <div class="form-group">
	                    <label for="evDto">Evaluación del Departamento</label>
	                    <input type="text" class="form-control" name="evDto" id="evDto" placeholder="Ev. Dpto">
	                  </div>
                    <div class="form-group">
                        <label for="evAlum">Evaluación del Alumno</label>
                        <input type="text" class="form-control" name="evAlum" id="evAlum" placeholder="Ev. Alumno">
                    </div>
                    <div class="form-group">
                        <label for="gobFed">Gobierno Federal</label>
                        <input type="text" class="form-control" name="gobFed" id="gobFed" placeholder="Gobierno Federal">
                    </div>
                    <div class="form-group">
                        <label for="sep">S.E.P.</label>
                        <input type="text" class="form-control" name="sep" id="sep" placeholder="sep">
                    </div>
                    <div class="form-group">
                        <label for="rama">Rama</label>
                        <input type="text" class="form-control" name="rama" id="rama" placeholder="Rama">
                    </div>
                    <div class="form-group">
                        <label for="smi">S.N.I.</label>
                        <input type="text" class="form-control" name="smi" id="smi" placeholder="sni">
                    </div>
                    <div class="form-group">
                        <label for="fecIng">Fecha de Ingreso</label>
                        <input type="date" class="form-control" name="fecIng" id="fecIng" placeholder="Fecha Ingreso">
                    </div>
                    <div class="form-group">
                        <label for="motCon">Motivo Contratación</label>
                        <input type="text" class="form-control" name="motCon" id="motCon" placeholder="Motivo">
                    </div>
                    <div class="form-group">
                        <label for="esta">Estatus</label>
                        <input type="text" class="form-control" name="esta" id="esta" placeholder="Estatus">
                    </div>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="submit" name="submit" class="submit btn btn-success" value="Enviar" />
                    </fieldset>	

                    </div>
                    </div>
                </div>

              <!-- <button type="submit" name="add_proveedor" class="btn btn-primary">Agregar proveedor</button>-->
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>