<!-- <head> -->
	<?php 
	$page_title = 'Agregar Horario Operativo';
	require_once('includes/load.php');
	include_once('layouts/header.php');
	$idconvenio=$_GET['id'];
	?>
	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<title>Añadir carrera | ITA</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
	<link rel="stylesheet"  href="fonts/fonts.css">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Michroma&display=swap');
	</style>

	<style>span{color:#fff;}</style>
	
</head> -->
<!-- <body>
<div class="padre">
	<div class="contenedor-menuV">
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
	</div> -->

	<!-- <div class="tablaPrincipal">
		<div class="title">
			<div >
				<ul class="navigationBarM pull-left">
					<li><a href="#" class="menu-bar icon-menu3"> </a></li>
				</ul>
			</div>
			<div>
			<ul class="navigationBar pull-right">
				<li><a href="#" class="icon-user"> NOMBRE DE USUARIO </a>
					<ul>
						<li><a href="inicio sesion.html">CERRAR SESION</a></li>
					</ul>
				</li>
			</ul>
			</div>
		</div> -->

		<!-- <div class="contentTable"> -->
			<!-- <div class="contentTab"> -->
				<!-- <div>
					<h2>AÑADIR NUEVO HORARIO OPERATIVO</h2>
				</div> -->
				<div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Horario Operativo</span>
         </strong>
        </div>

		<div class="panel-body">
				<div class="col-md-12">
				<div class="alert alert-success hide"></div>
				<form method="post" action="añadir_nuevo_horario_operativo.php">
				<div class="row">
                  		 <div class="col-md-6">
							<?php 

							$querytiempo = "SELECT * FROM convenioope WHERE IdConvenioOpe  =".$idconvenio;

					    $resultadotiempo = $db->query($querytiempo);

						$dL=0;
					    $dM=0;
					    $dMi=0;
					    $dJ=0;
					    $dV=0;
					    $dS=0;
					    $dD=0;
					    $vf=array();
					    $cont=0;

					        while($t= mysqli_fetch_array($resultadotiempo)){
					           
					           	$InicioContrato=$t['FechaInicio'];
					    		$FinContrato= $t['FechaFin'];
					            $d="";

					            $f3 = date("d-m-Y", strtotime($t['FechaInicio'])); 
					            $d=date("w",strtotime($f3));

					            //echo $d," ",$f3,"<br>";
					            if($d==1){$dL++;}
					            if($d==2){$dM++;}
					            if($d==3){$dMi++;}
					            if($d==4){$dJ++;}
					            if($d==5){$dV++;}
					            if($d==6){$dS++;}
					            if($d==0){$dD++;}
					            while(strtotime($t['FechaFin']) >= strtotime($t['FechaInicio'])) { 
						            if(strtotime($t['FechaFin']) != strtotime($f3)) { 
						            	
							            $f3 = date("d-m-Y", strtotime($f3 . " + 1 day")); 
							            $d=date("w",strtotime($f3));
										//echo $d," ",$f3,"<br>";
							       		if($d==1){$dL++;}
							            if($d==2){$dM++;}
							            if($d==3){$dMi++;}
							            if($d==4){$dJ++;}
							            if($d==5){$dV++;}
							            if($d==6){$dS++;}
							            if($d==0){$dD++;}
							        } else 
							        {  
							     		break; 
							     	} 
							 	}
							 //echo "   L->",$dL,"   M->",$dM,"   Mi->",$dMi,"   J->",$dJ,"   V->",$dV,"   S->",$dS,"   D->",$dD," ";
					        }




					  	$query="SELECT convenioope.IdConvenioOpe, convenioope.IdPersonalOperativo,personaloperativo.ClaveSie  FROM convenioope INNER JOIN personaloperativo ON convenioope.IdPersonalOperativo = personaloperativo.id WHERE convenioope.IdConvenioOpe =".$idconvenio;
					  	$NumH=0;
					  	$resultado = $db->query($query);
    					while($f=mysqli_fetch_array($resultado)) {

					  	$NumH=0;
    						?>
								
									<input type="" name="id" value="<?php echo $idconvenio?>" hidden>
									<input type="" name="idpersonal" value="<?php echo $f['IdPersonalOperativo']?>" hidden>

									<div class="form-group">
										<label>Clave del personal:</label><br>
										<input type="" class="form-control" name="ClaveSie" value="<?php echo $f['ClaveSie']?>" readonly>
									</div>

								<?php }?>

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

								</div>
								<div>
								</div>
		</div>
									<button type="" class="btn btn-danger" formaction='horario_ope_detalles.php?id=<?php echo $_GET['id'];?>'" class="btnsC pull-left">CANCELAR</button>
									<button type="submit" class="btn btn-primary" >AGREGAR HORARIO</button>

									</div>
								</div>	
							
						</div>
						</div>
						</div>	

				</form>			
			</div>
		</div>
	</div>
</div>
	<!-- <script src="js/jquery.js" ></script>
	<script src="js/abrir.js" ></script>
</body>
</html> -->