<?php 
  require_once('includes/load.php');
  $id=$_GET['id'];
?>
<div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>AÑADIR NUEVO HORARIO</h2>
				</div>
				<div class="espacio2 pull center">
				</div>
				<form novalidate method="POST" action="añadir_nuevo_horario.php">
						<div class="datos_personal-flex">
								<div>
									<?php 
									$sql=$db->query('SELECT * FROM personal INNER JOIN convenio ON convenio.IdPersonal = personal.id WHERE convenio.id="'.$id.'"') or die (mysqli_error());
									$resultado=mysqli_fetch_assoc($sql);
					    			?>
					    			<input type="hidden" name="id" value="<?php echo $resultado['id'] ?>">
									<label>Clave del profesor:</label><br>
									<input type="" name="nosie" value="<?php echo $resultado['NoSie'] ?>" readonly><br>
									<label>Carrera:</label><br>
									<select name="search" id="search" required >
									<option value="">Seleccione su Carrera</option>
										<?php 
									$result=$db->query('SELECT * FROM carrera')or die(mysqli_error());
					    					while($f=mysqli_fetch_array($result)) {
					    			?>
					    			<option value="<?php echo $f['id'] ?>"><?php echo $f['Carrera'] ?></option>

										<?php } ?>
									</select><br>
									<label>Materia:</label><br>
									<div id="datos"></div>
									<label>Modalidad:</label><br>
									<select name="modalidad" required >
										<option value="">Seleccione su Modalidad</option>
									<?php
										$result=$db->query('SELECT * FROM modalidad')or die(mysqli_error());
					    					while($f=mysqli_fetch_array($result)) {
					    			?>
									<option value="<?php echo $f['id'] ?>"><?php echo $f['Modalidad'] ?></option>
									<?php } ?>
									</select><br>
									<label>Aula:</label><br>
									<input type="" name="aula" value=""  required><br>
									<label>Grupo:</label><br>
									<input type="" name="grupo" value=""  required><br>
										
								</div>
								<div>
									<p>Asignacion de Horarios:</p>
									<label>Lunes:</label>
									<select name="LunesHoraI">
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
									<select name="LunesHoraF">
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
									</select><br>
									<label>Martes:</label>
									<select name="MartesHoraI">
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
									<select name="MartesHoraF">
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
									</select><br>
									<label>Miercoles:</label>
									<select name="MiercolesHoraI">
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
									<select name="MiercolesHoraF">
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
									</select><br>
									<label>Jueves:</label>
									<select name="JuevesHoraI">
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
									<select name="JuevesHoraF">
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
									</select><br>
									<label>Viernes:</label>
									<select name="ViernesHoraI">
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
									<select name="ViernesHoraF">
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
									</select><br>
								<label>Sabado:</label>
									<select name="SabadoHoraI">
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
									<select name="SabadoHoraF">
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
									</select><br>
									<label>Domingo:</label>
									<select name="DomingoHoraI">
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
									<select name="DomingoHoraF">
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
									</select><br>
									<br><button type="submit" class="btnsE pull-right" >AGREGAR MATERIA</button>
								</div>		
						</div>	

				</form>
					<button type="" onclick="location.href='horario_perso_detalles.php?id=<?php echo $_GET['id'];?>'" class="btns pull-left">CANCELAR</button><br><br><br>
			</div>
		</div>
	</div>
</div>