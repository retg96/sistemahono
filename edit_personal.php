<?php
$page_title = 'Editar Personal';
require_once('includes/load.php');
include_once('layouts/header.php');
?>
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


      // // Display error if any else submit form
      // if(error_message) {
      //     $('.alert-success').removeClass('hide').html(error_message);
      //     return false;
      // } else {
      //     return true;	
      // }    
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
<?php 
				$tpR = $_GET["id"];
				 $result=$db->query('SELECT * FROM personal WHERE id='.$_GET['id'])or die(mysqli_error());
				 		while($fa=mysqli_fetch_array($result)) {



				 			 $nac=$db->query('SELECT id,Nacionalidad FROM nacionalidad WHERE id="'.$fa['IdNacionalidad'].'"') or die (mysqli_error());
					$nacionalidad=mysqli_fetch_assoc($nac);

				 $dep=$db->query('SELECT id,Departamento FROM departamento WHERE id="'.$fa['IdDepartamento'].'"') or die (mysqli_error());
					$departamento=mysqli_fetch_assoc($dep);


					$aac=$db->query('SELECT id,AreaAcademica FROM areaacademica WHERE id="'.$fa['IdAreaAcademica'].'"') or die (mysqli_error());
					$areaacademica=mysqli_fetch_assoc($aac);

				$sn=$db->query('SELECT id,SNI FROM sni WHERE id="'.$fa['IdSNI'].'"') or die (mysqli_error());
					$sni=mysqli_fetch_assoc($sn);


				$au=$db->query('SELECT id,MotivoAusencia FROM motivoausencia WHERE id="'.$fa['IdMotivoAusencia'].'"') or die (mysqli_error());
					$ausencia=mysqli_fetch_assoc($au);	

				$tp=$db->query('SELECT id,TipoPersona FROM tipopersona WHERE id="'.$fa['IdTipoPersona'].'"') or die (mysqli_error());
					$persona=mysqli_fetch_assoc($tp);

				$re=$db->query( 'SELECT id,Regimen FROM regimen WHERE id="'.$fa['IdRegimen'].'"') or die (mysqli_error());
					$regimen=mysqli_fetch_assoc($re);

				$ne=$db->query('SELECT id,NivelEstudio FROM nivelestudio WHERE id="'.$fa['IdNivelEstudio'].'"') or die (mysqli_error());
					$estudios=mysqli_fetch_assoc($ne);

          $np=$db->query('SELECT id,Puesto FROM puesto WHERE id="'.$fa['IdPuesto'].'"') or die (mysqli_error());
					$puesto=mysqli_fetch_assoc($np);
				 ?>
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
					<form id="register_form" method="post" action="personal_tecnm_editar.php">
					<div class="form-group">
						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<input class="form-control" type="hidden" name="id" value="<?php echo $fa['id']; ?>">
							</div>
						<fieldset>
                    		<h2>Paso 1</h2>
							<div class="form-group">
								<label>Numero SIE:</label>
								<input class="form-control" type="" name="NoSie" value="<?php echo $fa['NoSie']; ?>" readonly>
							</div>

							<div class="form-group">
								<label>Nombre:</label>	
								<input class="form-control" type="" name="Nombre" value="<?php echo $fa['NombreCompleto']; ?>" required>
							</div>

							<div class="form-group">
								<label>Nacionalidad:</label>
								<select class="form-control" name="Nacionalidad" required>
									<option value="<?php echo $nacionalidad['id'] ?>"><?php echo $nacionalidad['Nacionalidad'] ?></option>
									<?php 
										$result=$db->query('SELECT * FROM Nacionalidad')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['Nacionalidad'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Fecha de nacimiento:</label>	
								<input class="form-control" type="date" name="Nacimiento"  value="<?php echo $fa['FechaNacimiento']; ?>"  required>
							</div>

							<div class="form-group">
								<label>Sexo:</label>	
								<select class="form-control" name="Sexo" required>
									<option value="<?php echo $fa['Sexo']; ?>">
									<?php 
									$S=$fa['Sexo'];
									$sexo="-";
											if($fa['Sexo'] == 'M'){
												$sexo = "Mujer";
											}else if($fa['Sexo']== 'H'){
												$sexo = "Hombre";
										}
										echo "$sexo"; 

										?></option>
									<option value="M">Mujer</option>
									<option value="H">Hombre</option>

								</select>
							</div>

							<div class="form-group">
								<label>RFC:</label>
								<input class="form-control" type="" name="RFC"  value="<?php echo $fa['RFC']; ?>"  required>
							</div>

							<div class="form-group">
								<label>CURP:</label>
								<input class="form-control" type="" name="CURP"  value="<?php echo $fa['CURP']; ?>" required>
							</div>
							<input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <input type="button" class="next-form btn btn-info" value="Siguiente"/>
						</fieldset>

						<fieldset>
                    		<h2> Paso 2:</h2>
							<div class="form-group">
								<label>Numero Celular:</label>
								<input class="form-control" type="" name="Celular" value="<?php echo $fa['NumeroCelular']; ?>" required>
							</div>

							<div class="form-group">
								<label>Calle:</label>
								<input class="form-control" type="" name="Calle" required value="<?php echo $fa['Calle']; ?>" required>
							</div>

							<div class="form-group">
								<label>Numero Exterior:</label>
	                            <input class="form-control" type='' name='NumExterior'required value="<?php echo $fa['NumExterior']; ?>" required>
							</div>

							<div class="form-group">
	                            <label>Numero Interior:</label>
	                            <input class="form-control" type='' name='NumInterior' value="<?php echo $fa['NumInterior']; ?>" required>
							</div>

							<div class="form-group">
	                            <label>Fraccionamiento:</label>
	                            <input class="form-control" type='' name='Fraccionamiento' required value="<?php echo $fa['Fraccionamiento']; ?>" required>
							</div>

							<div class="form-group">
	                            <label>Código Postal:</label>
	                            <input class="form-control" type='' name='CP' required value="<?php echo $fa['CP']; ?>" required>
							</div>

							<div class="form-group">
	                            <label>Ciudad:</label>
	                            <input class="form-control" type='' name='Ciudad' required value="<?php echo $fa['Ciudad']; ?>" required>
							</div>

							<div class="form-group">
	                            <label>Estado:</label>
	                        	<input class="form-control" type='' name='Estado' required value="<?php echo $fa['Estado']; ?>" required>
							</div>
							<input type="button" name="previous" class="previous-form btn btn-danger" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                  </fieldset>
				  <fieldset>
                    <h2> Paso 3: </h2>
							<div class="form-group">
								<label>Email:</label>
								<input class="form-control" type="" name="Email" value="<?php echo $fa['Email']; ?>" required>
							</div>

							<div class="form-group">
								<label>Nivel de estudios:</label>
								<select class="form-control" name="NivelEstudio" required>
									<option value="<?php echo $estudios['id']; ?>"><?php echo $estudios['NivelEstudio']; ?></option>
									<?php 
										$result=$db->query('SELECT * FROM NivelEstudio')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['NivelEstudio'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Titulo abreviado:</label>	
								<input class="form-control" type="" name="TituloAbreviado"  value="<?php echo $fa['TituloAbreviado']; ?>"  required>
							</div>

							<div class="form-group">
								<label>Profesión:</label>
								<input class="form-control" type="" name="Profesion" value="<?php echo $fa['Profesion']; ?>" required>
							</div>

							<div class="form-group">
								<label>Función / Puesto:</label>
								<!-- <input type="" name="Puesto" value="<?php echo $fa['IdPuesto']; ?>" readonly required><br> -->
								<select class="form-control" name="Puesto" id="" required>
								<option value="<?php echo $puesto['id']; ?>"><?php echo $puesto['Puesto']; ?></option>
													<?php 
														$result=$db->query('SELECT * FROM puesto')or die(mysqli_error());
														while($f=mysqli_fetch_array($result)) {
													?>
														<option value="<?php echo $f['id'] ?>"><?php echo $f['Puesto'] ?></option>
													<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Régimen:</label>
								<select class="form-control" name="Regimen" id='Regimen' onchange='habilitarSelect(this.value);' required>
									<option value="">Selecciona su regimen</option>
									<?php 
										$result=$db->query('SELECT * FROM Regimen')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['Regimen'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Interno:</label>
								<select class="form-control" name="Interno" id="interno" disabled="true" required>
									<option value="<?php echo $fa['Interno']; ?>">
										<?php 
											$inter="-";
											if($fa['Interno'] == 'S'){
												$inter = "Si";
											}else if($fa['Interno']== 'N'){
												$inter = "No";
										}
										echo "$inter"; 

										?></option>
									<option value="S">Si</option>
									<option value="N">No</option>
								</select>
							</div>

							<div class="form-group">
								<label>Clave presupuestal:</label>
								<input class="form-control" type="" name="ClavePresupuestal" id="claveP" value="<?php echo $fa['ClavePresupuestal']; ?>"disabled="true" required>
							</div>
							<input type="button" name="previous" class="previous-form btn btn-danger" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                  </fieldset>

				  <fieldset>
                    <h2> Paso 4: </h2>
							<div class="form-group">
								<label>Tipo de persona:</label>
								<select class="form-control" name="TipoPersona" required>
									<option value="<?php echo $persona['id']; ?>"><?php echo $persona['TipoPersona']; ?></option>
									<?php 
										$result=$db->query('SELECT * FROM TipoPersona')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['TipoPersona'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Área académica:</label>
								<select class="form-control" name="AreaAcademica" required>
									<option value="<?php echo $areaacademica['id']; ?>"><?php echo $areaacademica['AreaAcademica']; ?></option>
									<?php 
										$result=$db->query('SELECT * FROM AreaAcademica')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['AreaAcademica'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label>Departamento:</label>
			                        <select class="form-control" name='Departamento' required>
			                            <option value="<?php echo $departamento['id']?>"><?php echo $departamento['Departamento']?></option>
			                            <?php 
			                            $result=$db->query('SELECT * FROM departamento')or die(mysqli_error());
			                            while($f=mysqli_fetch_array($result)) {?>
			                                <option value="<?php echo$f['id']?>"><?php echo $f['Departamento']?></option>
			                            <?php }?>
            					</select>
							</div>

							<div class="form-group">
								<label>Evaluación del departamento:</label>
								<select class="form-control" name="EvaluacionDepartamento" required>
									<option value="<?php echo $fa['EvaluacionDepartamento']; ?>">
										<?php 
											$Ed = "-";
												if($fa['EvaluacionDepartamento'] == '1'){
													$Ed = "Insuficiente";
												}else if($fa['EvaluacionDepartamento'] == '2'){
													$Ed = "Suficiente";
												}else if($fa['EvaluacionDepartamento'] == '3'){
													$Ed = "Satisfactorio";
												}else if($fa['EvaluacionDepartamento'] == '4'){
													$Ed = "Muy Satisfactorio";
												}else if($fa['EvaluacionDepartamento'] == '5'){
													$Ed = "Excelente";
												}else if($fa['EvaluacionDepartamento'] == '6'){
													$Ea = "Nuevo Ingreso";
												}
											echo "$Ed"; 

											?></option>
									<option value="1">Insuficiente</option>
									<option value="2">Suficiente</option>
									<option value="3">Satisfactorio</option>
									<option value="4">Muy Satisfactorio</option>
									<option value="5">Excelente</option>
									<option value='6'>Nuevo Ingreso</option>
								</select>
							</div>

							<div class="form-group">
								<label>Evaluación del alumno:</label>
								<select class="form-control" name="EvaluacionAlumno" required>
									<option value="<?php echo $fa['EvaluacionAlumno']; ?>">
										<?php 
											$Ea = "-";
												if($fa['EvaluacionAlumno'] == '1'){
													$Ea = "Insuficiente";
												}else if($fa['EvaluacionAlumno'] == '2'){
													$Ea = "Suficiente";
												}else if($fa['EvaluacionAlumno'] == '3'){
													$Ea = "Satisfactorio";
												}else if($fa['EvaluacionAlumno'] == '4'){
													$Ea = "Muy Satisfactorio";
												}else if($fa['EvaluacionAlumno'] == '5'){
													$Ea = "Excelente";
												}else if($fa['EvaluacionAlumno'] == '6'){
													$Ea = "Nuevo Ingreso";
												}
											echo "$Ea"; 

											?></option>
									<option value="1">Insuficiente</option>
									<option value="2">Suficiente</option>
									<option value="3">Satisfactorio</option>
									<option value="4">Muy Satisfactorio</option>
									<option value="5">Excelente</option>
									<option value='6'>Nuevo Ingreso</option>
								</select>
							</div>

							<div class="form-group">
								<label>Gobierno Federal:</label>
								<input class="form-control" type="date" name="GobiernoFed" value="<?php echo $fa['GobiernoFed']; ?>" id='gobiernoF' disabled='true' required>
							</div>
							<input type="button" name="previous" class="previous-form btn btn-danger" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                  </fieldset>
				  <fieldset>
                    <h2> Paso 5: </h2>
							<div class="form-group">
								<label>S.E.P:</label>
								<input class="form-control" type="date" name="SEP" value="<?php echo $fa['SEP']; ?>" id='sep' disabled='true' required>
							</div>
							<div class="form-group">
								<label>Rama:</label>
								<input class="form-control" type="date" name="RAMA" value="<?php echo $fa['RAMA']; ?>" id='rama' disabled='true' required>
							</div>
							<div class="form-group">
								<label>S.N.I:</label>
								<select class="form-control" name="SNI" id='sni' disabled='true' required>
									<option value="<?php echo $sni['id']; ?>"><?php echo $sni['SNI']; ?></option>
									<?php 
										$result=$db->query('SELECT * FROM SNI')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['SNI'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Fecha de Ingreso:</label>	
								<input class="form-control" type="date" name="FechaIngresoTec"  value="<?php echo $fa['FechaIngresoTec']; ?>" readonly>
							</div>
							<div class="form-group">
								<label>Motivo Contratación:</label>
								<select class="form-control" name="MotivoAusencia" required>
									<option value="<?php echo $ausencia['id']; ?>"><?php echo $ausencia['MotivoAusencia']; ?></option>
									<?php 
										$result=$db->query('SELECT * FROM MotivoAusencia')or die(mysqli_error());
				    					while($f=mysqli_fetch_array($result)) {
    								?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['MotivoAusencia'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Estatus:</label>
								<select class="form-control" name="Estatus" required>
									<option value="<?php echo $fa['Estatus']; ?>">
										<?php 
											$E = "-";
												if($fa['Estatus'] == 'Activo'){
													$Ea = "Activo";
												}else if($fa['Estatus'] == 'Inactivo'){
													$Ea = "Inactivo";
												}
											echo "$Ea"; 

											?></option>
									<option value="Activo">Activo</option>
									<option value="Inactivo">Inactivo</option>
								</select>
							</div>

							<input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              			<button type="submit" class="btn btn-primary">Actualizar</button>
							<!-- <input type="button" name="previous" class="previous-form btn btn-danger" value="Regresar" />
                      <button type="submit" name="submit" class="btn btn-primary">Agregar</button>  -->
                      <!-- <input type="button" name="previous" class="btn btn-danger" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" /> -->
                  </fieldset>

								<input type="hidden" name="tpR" value="<?php echo $tpR ?>">
								

								</div>
                    </div>
                </div>
								<!-- <button type="submit" class="btnsE">EDITAR</button><br><br> -->

							<!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              			<button type="submit" class="btn btn-primary">Actualizar</button> -->
					</form>
						<!-- <button type="submit" class="btnsC" onclick="location.href='personal_tecnm_detalles.php?id=<?php echo $fa['IdPersonal'] ?>'">CANCELAR</button><br><br> -->
					<?php
						} 
					?>
      </div>
        </div>
      </div>
    </div>
  </div>

