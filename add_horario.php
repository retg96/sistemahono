<?php 
    $page_title = 'Agregar Horario';
	require_once('includes/load.php');
	include_once('layouts/header.php');
  $id=$_GET['id'];
?>
<!-- <div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>AÑADIR NUEVO HORARIO</h2>
				</div>
				<div class="espacio2 pull center">
				</div> -->
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
            <span>Agregar Horario</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="añadir_operativo.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
				<form  method="POST" action="añadir_nuevo_horario.php">
				<div class="form-group">
                <div class="row">
                  <div class="col-md-6">
									<?php 
									$sql=$db->query('SELECT * FROM personal INNER JOIN convenio ON convenio.IdPersonal = personal.id WHERE convenio.IdConvenio="'.$id.'"') or die (mysqli_error());
									$resultado=mysqli_fetch_assoc($sql);
					    			?>
					    			<input type="hidden" name="id" value="<?php echo $resultado['id'] ?>">
									<div class="form-group">
										<label>Clave del profesor:</label><br>
										<input class="form-control" type="" name="nosie" value="<?php echo $resultado['NoSie'] ?>" readonly>
									</div>
									<div class="form-group">
										<label>Carrera:</label><br>
										<select class="form-control" name="search" id="search" required >
										<option value="">Seleccione su Carrera</option>
											<?php 
										$result=$db->query('SELECT * FROM carrera')or die(mysqli_error());
												while($f=mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['Carrera'] ?></option>

											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Materia:</label>
									</div>

									<!-- <div id="datos"></div> -->
									<div class="form-group">
										<label>Modalidad:</label>
										<select class="form-control" name="modalidad" required >
											<option value="">Seleccione su Modalidad</option>
										<?php
											$result=$db->query('SELECT * FROM modalidad')or die(mysqli_error());
												while($f=mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $f['id'] ?>"><?php echo $f['Modalidad'] ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Aula:</label><br>
										<input class="form-control" type="" name="aula" value=""  required>
									</div>
									<div class="form-group">
										<label>Grupo:</label><br>
										<input class="form-control" type="" name="grupo" value=""  required>
									</div>

								<!-- </div> -->
								<!-- <div> -->
									<p>Asignacion de Horarios:</p>
									<div class="form-group">
									<label>Lunes:</label>
										<select class="form-control" name="LunesHoraI">
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
									<label>Martes:</label>
									<select class="form-control" name="MartesHoraI">
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
									<label>Jueves:</label>
									<select class="form-control" name="JuevesHoraI">
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
									<label>Viernes:</label>
									<select class="form-control" name="ViernesHoraI">
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
								<label>Sabado:</label>
									<select class="form-control" name="SabadoHoraI">
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
									<label>Domingo:</label>
									<select class="form-control" name="DomingoHoraI">
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
									<!-- <button type="submit" class="btnsE pull-right" >AGREGAR MATERIA</button> -->
									<input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href='horario_perso_detalles.php?id=<?php echo $_GET['id'];?>'">
                      				<button type="submit" name="submit" class="btn btn-primary">Agregar</button> 
								</div>		
						</div>	

				</form>
					<!-- <button type="" onclick="location.href='horario_perso_detalles.php?id=<?php echo $_GET['id'];?>'" class="btns pull-left">CANCELAR</button><br><br><br> -->
			</div>
		</div>
	</div>
</div>