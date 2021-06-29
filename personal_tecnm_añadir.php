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

<?php include_once('layouts/header.php'); ?>
<!-- <script type="text/javascript" src="libs/js/form.js"></script> -->
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
         <form id="register_form" method="post" action="añadir_personal.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <!-- <fieldset>
                    <h2>Paso 1: Datos Personales</h2> -->
                        <div class="form-group">
                            <label>Número de Sie:</label>	
                            <input type=""  class="form-control" name='NoSie' required>
                        </div>

                        <div class="form-group">
                            <label>Nombre:</label>	
							              <input type="" class="form-control" name='Nombre' required>
                        </div>

                        <div class="form-group">
                            <label>Titulo Abreviado</label>
							              <input type="date" class="form-control" name='TituloAbreviado' required>
                        </div>

                        <div class="form-group">
                            <label>Fecha de Nacimiento:</label>
							              <input type="date" class="form-control" name='Nacimiento' required>
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
							              <input type="" class="form-control" name='RFC' required>
                        </div>
                            <!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/> -->
                 <!-- </fieldset>

                 <fieldset>
                    <h2> Paso 2: Domicilio</h2> -->
                    <div class="form-group">
                        <label>CURP</label>	
							          <input type="" class="form-control" name='CURP' required>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>	
							          <input type="number" class="form-control" name='Celular' required>
                    </div>
                    <div class="form-group">
                        <label>Calle</label>	
							          <input type="" class="form-control" name='Calle' required>
                    </div>
                    <div class="form-group">
                        <label>Número Exterior</label>	
							          <input type="text" class="form-control" name='NumExterior' required>
                    </div>
                    <div class="form-group">
                        <label>Número Interior</label>	
							          <input type="text" class="form-control" name='NumInterior' required>
                    </div>
                    <div class="form-group">
                        <label>Fraccionamiento</label>	
							          <input type="text" class="form-control" name='Fraccionamiento' required>
                    </div>
                    <div class="form-group">
                        <label>Código Postal</label>	
							          <input type="text" class="form-control" name='CP' required>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>	
							          <input type="text" class="form-control" name='Ciudad' required>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>	
							          <input type="text" class="form-control" name='Estado' required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>	
							          <input type="text" class="form-control" name='Email' required>
                    </div>
                        <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" /> -->
                  <!-- </fieldset> -->

                    <!-- <fieldset>
                    <h2> Paso 3: Nivel de Estudios</h2> -->

                    <div class="form-group">
                        <label>Nivel de Estudios:</label><br>
						            <select name='NivelEstudio' class="form-control" required>
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
                        <label>Profesión</label>	
							          <input type="text" class="form-control" name='Profesion' required>
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
                      <label>Regimen</label>
                        <select class="form-control" onchange='habilitarSelect(this.value);'  name='Regimen' required>
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
                      <label>Interno:</label><br>
                      <select class="form-control" name='Interno' id='interno' disabled='true' required>
                          <option value=''>Seleccione una opcion</option>
                          <option value='S'>Si</option>
                          <option value='N'>No</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Clave Presupuestal</label>	
							          <input type="text" class="form-control" name='ClavePresupuestal' id="claveP" disabled="true" required>
                    </div>

                    <div class="form-group">
                      <label>Área Académica</label><br>
                        <select name='AreaAcademica' class="form-control" required>
                        <option value=''>Seleccione una opcion</option>
                        <?php 
                          $result=$db->query('SELECT * FROM areaacademica');
                          while($f=mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $f['id'] ?>">
                        <?php echo $f['AreaAcademica'] ?></option>
                        <?php } ?>
                        </select>      
                    </div>


                        <div class="form-group">
                            <label>Departamento:</label><br>
                              <select name='Departamento' class="form-control" required>
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

                        <div class="form-group">
                        <label>Evaluación del Departamento:</label><br>
                        <select class="form-control" name='EvaluacionDepartamento' required>
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
                        <label>Evaluación del Alumno:</label><br>
                        <select class="form-control" name='EvaluacionAlumno' required>
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
                            <label>Tipo de Persona:</label><br>
                              <select name='TipoPersona' class="form-control" required>
                              <option value=''>Seleccione una opcion</option>
                              <?php 
                                $result=$db->query('SELECT * FROM tipopersona');
                                  while($f=mysqli_fetch_array($result)) {
                                ?>
                              <option value="<?php echo $f['id'] ?>">
                                <?php echo $f['TipoPersona'] ?></option>
                            <?php } ?>
                            </select>      
                        </div>

                        <div class="form-group">
                          <label>Gobierno Federal</label>	
                          <input type='date' name='GobiernoFed' class="form-control" id='gobiernoF' disabled='true' required>
                        </div>

                        <div class="form-group">
                          <label>SEP</label>	
                          <input type='date' name='SEP' class="form-control" id='sep' disabled='true' required>
                        </div>

                        <div class="form-group">
                          <label>S.N.I:</label>	
                          <input type='date' name='SNI' class="form-control" id='sni' disabled='true' required>
                        </div>

                        <div class="form-group">
                          <label>Fecha de Ingreso</label>	
                          <input type='date' name='FechaIngresoTec' class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Motivo de Ausencia:</label><br>
                              <select name='MotivoAusencia' class="form-control" required>
                              <option value=''>Seleccione una opcion</option>
                              <?php 
                                $result=$db->query('SELECT * FROM motivoausencia');
                                  while($f=mysqli_fetch_array($result)) {
                                ?>
                              <option value="<?php echo $f['id'] ?>">
                                <?php echo $f['MotivoAusencia'] ?></option>
                            <?php } ?>
                            </select>      
                        </div>

                        <div class="form-group">
                        <label>Estatus:</label><br>
                        <select class="form-control" name='Estatus' required>
                            <option value=''>Seleccione una opcion</option>
                            <option value='Activo'>Activo</option>
                            <option value='Inactivo'>Inactivo</option>
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