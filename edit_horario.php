
<head>
	<?php 
	 $page_title = 'Editar Horario';
     require_once('includes/load.php');
	 include_once('layouts/header.php');
	$all_carreras=carrera();
	$all_materias=materia();
	$all_modalidades=modalidad();
	?>

	
</head>
<body>

		<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Horario</span>
         </strong>
        </div>

	
				<div class="panel-body">
				<div class="col-md-12">
				<div class="alert alert-success hide"></div>	
					<form method="post" action="editar_horario_personal.php">
						<?php 
						$idhorario = $_GET["id"];
						$conv="";
					 	$result=$db->query('SELECT * FROM horariodocentemateria WHERE IdHorarioDocenteMateria  = '.$idhorario.'')or die(mysqli_error());
					 		while($f=mysqli_fetch_array($result)) {
					 			$personaloperativo='';
					 	$query = "SELECT convenio.IdConvenio , convenio.IdPersonal, personal.NoSie FROM convenio INNER JOIN personal ON convenio.IdPersonal = personal.id WHERE convenio.IdConvenio  =".$f['IdConvenio'];
					 		$resultado = $db->query($query);
					 		while($c=mysqli_fetch_array($resultado)) {
					 			$personaloperativo = $c['IdConvenio'];
					 	?>
						  <div class="row">
                  		 <div class="col-md-6">
							<!-- <div class="datos_personal-flex"> -->
								<!-- <div> -->
								
								<input type="" name="idconvenio" value="<?php echo $c['id'] ?>" hidden>

								<div class="form-group">
									<label>Numero de horario:</label>
									<input type="" class="form-control" name="idhorario" value="<?php echo $f['IdConvenio']; ?>" readonly>
 								</div>
								 
								<div class="form-group">
									<label>Clave del personal:</label>
									<input type="" class="form-control" name="clavesie" value="<?php echo $c['NoSie']; ?>" readonly>
								</div>
								<!-- <div class="form-group">
									<label>Carrera:</label>
									<input type="" class="form-control" name="clavesie" value="<?php echo $f['IdCarrera']; ?>">
								</div> -->
								<div class="form-group">
                        <label for="smi">Carrera</label>
                        <select class="form-control" name="search" id="fr" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_carreras as $carrera): ?>
                            <option value="<?php echo (int)$carrera['id']; ?>" <?php if($f['IdCarrera'] === $carrera['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($carrera['Carrera']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
					<div class="form-group">
                        <label for="smi">Materia</label>
                        <select class="form-control" name="materia" id="fr" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_materias as $materia): ?>
                            <option value="<?php echo (int)$materia['id']; ?>" <?php if($f['IdMateria'] === $materia['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($materia['Materia']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
					<div class="form-group">
                        <label for="smi">Modalidad</label>
                        <select class="form-control" name="modalidad" id="fr" >
                          <option value="">Selecciona una opcion</option>
                          <?php  foreach ($all_modalidades as $modalidad): ?>
                            <option value="<?php echo (int)$modalidad['id']; ?>" <?php if($f['IdModalidad'] === $modalidad['id']): echo "selected"; endif; ?> >
                              <?php echo remove_junk($modalidad['Modalidad']); ?></option>
                              <?php endforeach; ?>
                        </select>                    
                    </div>
								<div class="form-group">
									<label>Aula:</label>
									<input type="" class="form-control" name="aula" value="<?php echo $f['Aula']; ?>">
								</div>
								<div class="form-group">
									<label>Grupo:</label>
									<input type="" class="form-control" name="grupo" value="<?php echo $f['Grupo']; ?>">
								</div>
							
								<!-- <div> -->
									<p>Asignacion de Horarios:</p>

									<div class="form-group">
									<label>Lunes:</label>
									<select class="form-control" name="LunesHoraI">
										<?php
										if($f['LunesHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['LunesHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['LunesHoraI'];?>" selected="selected"><?php echo $f['LunesHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="LunesHoraF">
										<?php
										if($f['LunesHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['LunesHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['LunesHoraF'];?>" selected="selected"><?php echo $f['LunesHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Martes:</label>
									<select class="form-control" name="MartesHoraI">
										<?php
										if($f['MartesHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['MartesHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['MartesHoraI'];?>" selected="selected"><?php echo $f['MartesHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>
									
									<div class="form-group">
									<select class="form-control" name="MartesHoraF">
										<?php
										if($f['MartesHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['MartesHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['MartesHoraF'];?>" selected="selected"><?php echo $f['MartesHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de salida</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Miercoles:</label>
									<select class="form-control" name="MiercolesHoraI">
										<?php
										if($f['MiercolesHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['MiercolesHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['MiercolesHoraI'];?>" selected="selected"><?php echo $f['MiercolesHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="MiercolesHoraF">
										<?php
										if($f['MiercolesHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['MiercolesHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['MiercolesHoraF'];?>" selected="selected"><?php echo $f['MiercolesHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Jueves:</label>
									<select class="form-control" name="JuevesHoraI">
										<?php
										if($f['JuevesHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['JuevesHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['JuevesHoraI'];?>" selected="selected"><?php echo $f['JuevesHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="JuevesHoraF">
										<?php
										if($f['JuevesHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['JuevesHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['JuevesHoraF'];?>" selected="selected"><?php echo $f['JuevesHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Viernes:</label>
									<select class="form-control" name="ViernesHoraI">
										<?php
										if($f['ViernesHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['ViernesHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['ViernesHoraI'];?>" selected="selected"><?php echo $f['ViernesHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="ViernesHoraF">
										<?php
										if($f['ViernesHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['ViernesHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['ViernesHoraF'];?>" selected="selected"><?php echo $f['ViernesHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Sabado:</label>
									<select class="form-control" name="SabadoHoraI">
										<?php
										if($f['SabadoHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['SabadoHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['SabadoHoraI'];?>" selected="selected"><?php echo $f['SabadoHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="SabadoHoraF">
										<?php
										if($f['SabadoHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['SabadoHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['SabadoHoraF'];?>" selected="selected"><?php echo $f['SabadoHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<label>Domingo:</label>
									<select class="form-control" name="DomingoHoraI">
										<?php
										if($f['DomingoHoraI'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['DomingoHoraI'] != "00:00:00"){?>
										<option value="<?php echo $f['DomingoHoraI'];?>" selected="selected"><?php echo $f['DomingoHoraI'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>

									<div class="form-group">
									<select class="form-control" name="DomingoHoraF">
										<?php
										if($f['DomingoHoraF'] == "00:00:00"){?>
										<option value="">Seleccione hora de inicio</option>
										<?php }
										if($f['DomingoHoraF'] != "00:00:00"){?>
										<option value="<?php echo $f['DomingoHoraF'];?>" selected="selected"><?php echo $f['DomingoHoraF'];?></option>
										<?php }?>
										<option value="">Seleccione hora de inicio</option>
										<option value="7:00">7:00</option>
										<option value="8:00">8:00</option>
										<option value="9:00">9:00</option>
										<option value="10:00">10:00</option>
										<option value="11:00">11:00</option>
										<option value="12:00">12:00</option>
										<option value="13:00">13:00</option>
										<option value="14:00">14:00</option>
										<option value="15:00">15:00</option>
										<option value="16:00">16:00</option>
										<option value="17:00">17:00</option>
										<option value="18:00">18:00</option>
										<option value="19:00">19:00</option>
										<option value="20:00">20:00</option>
										<option value="21:00">21:00</option>
									</select>
									</div>
								</div>							
							</div>
							</div>
						<div>
							<button type="submit" class="btn btn-danger" formaction="horario_perso_detalles.php?id=<?php echo $c['IdConvenio'] ?>">CANCELAR</button>
							<button type="submit" class="btn btn-primary">EDITAR</button>
						</div>
					</div>
						
					</form>	
					<?php
						}
	
  					}
 						?>				
				</div>
		</div>
	</div>
<!-- </div> -->
	<!-- <script src="js/jquery.js" ></script>
	<script src="js/abrir.js" ></script> -->
</body>
</html>