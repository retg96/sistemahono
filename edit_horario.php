
<head>
	<?php 
	 $page_title = 'Editar Horario';
     require_once('includes/load.php');
	 include_once('layouts/header.php');
    //  include_once('layouts/header.php');
	?>
	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<title>Editar horario personal operativo | ITA</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
	<link rel="stylesheet"  href="fonts/fonts.css">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Michroma&display=swap');
	</style>

	<style>span{color:#fff;}</style> -->
	
</head>
<body>
<!-- <div class="padre"> -->
	<!-- <div class="contenedor-menuV">
		<div class="espacio" >
			<div>
			<h4> MENU </h4>
		</div>
		</div>

		<div class="espacio"></div>
		<div class="pull-center">
			<img src='img/logoITA.jpg' class='imgRedonda'/>
		</div>
		<div class="espacio2"></div>
		<div>
			<ul class="menu">
				<li><a href="#">PERSONAL DOCENTE</a>
					<ul>
					<li><a href="personal_tecnm_principal.php">PERSONAL DOCENTE</a></li>
					<li><a href="horarios.php">HORARIOS DOCENTE</a></li>
					<li><a href="convenios.php">CONVENIOS DOCENTE</a></li>
					</ul>
				</li>
				<li><a href="#">PERSONAL OPERATIVO</a>
					<ul>
					<li><a href="personal_tecnm_operativo.php">PERSONAL OPERATIVO</a></li>
					<li><a href="horarios_operativo.php">HORARIOS OPERATIVOS</a></li>
					<li><a href="convenios_operativo.php">CONVENIOS OPERATIVO</a></li>
					</ul>
				</li>
				<li><a href="pagos.php">PAGOS</a></li>
				<li><a href="#">TABLAS</a>
					<ul>
					<li><a href="seleccion_tablas.php">SELECCION TABLAS</a>
					<li><a href="control_acceso.php">CONTROL DE ACCESO</a></li>
					<li><a href="materias.php">Materias</a></li>
					<li><a href="carreras.php">Carreras</a></li>
					<li><a href="subdireccion.php">Subdirecciones</a></li>
					<li><a href="departamento.php">Departamentos</a></li>
					</ul>
				
				</li>
				<li><a href="inicio_sesion.html" class=" close ">CERRAR SESION </a> <a href="inicio_sesion.html" class=" icon-enter"> </a> </li>

			</ul>
		</div>
	</div>

	<div class="tablaPrincipal">
		<div class="title">
			<div >
				<ul class="navigationBarM pull-left">
					<li><a href="#" class="menu-bar icon-menu3"> </a></li>
				</ul>
			</div>
			<div>
			<ul class="navigationBar pull-right">
				<li><a href="#"> NOMBRE DE USUARIO </a><a class="icon-user"> </a></li>

			</ul>
			</div>
		</div> -->
		<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Horario</span>
         </strong>
        </div>

		<!-- <div class="contentTable"> -->
			<!-- </div> -->
			<!-- <div class="contentTab"> -->
				<!-- <div>
					<h2>EDITAR REGISTRO DEL HORARIO</h2>
				</div> -->
				<!-- <div class="espacio2"></div> -->
				<div class="panel-body">
				<div class="col-md-12">
				<div class="alert alert-success hide"></div>	
					<form method="post" action="editar_horario_operativo_existente.php">
						<?php 
						$idhorario = $_GET["id"];
						$conv="";
					 	$result=$db->query('SELECT * FROM horariodocentemateria WHERE id = '.$idhorario.'')or die(mysqli_error());
					 		while($f=mysqli_fetch_array($result)) {
					 			$personaloperativo='';
					 	$query = "SELECT convenio.id, convenio.IdPersonal, personal.NoSie FROM convenio INNER JOIN personal ON convenio.IdPersonal = personal.id WHERE convenio.id =".$f['IdConvenio'];
					 		$resultado = $db->query($query);
					 		while($c=mysqli_fetch_array($resultado)) {
					 			$personaloperativo = $c['id'];
					 	?>
						  <div class="row">
                  		 <div class="col-md-6">
							<!-- <div class="datos_personal-flex"> -->
								<!-- <div> -->
								
								<input type="" name="idconvenio" value="<?php echo $c['id'] ?>" hidden>

								<div class="form-group">
									<label>Numero de horario:</label>
									<input type="" class="form-control" name="idhorario" value="<?php echo $f['id']; ?>" readonly>
 								</div>
								 
								<div class="form-group">
									<label>Clave del personal:</label>
									<input type="" class="form-control" name="clavesie" value="<?php echo $c['NoSie']; ?>" readonly>
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
							<button type="submit" class="btn btn-danger" formaction="horario_perso_detalles.php?id=<?php echo $c['id'] ?>">CANCELAR</button>
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