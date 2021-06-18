<!-- <!DOCTYPE html>
<html lang="es">
<head> -->
	<?php 
	  $page_title = 'Horario Operativo';
    require_once('includes/load.php');
		/*session_start();
		$_SESSION['Clave'];

		if(isset($_SESSION['Clave'])){
		$clave=$_SESSION['Clave'];
		}*/
		$idconvenio = $_GET["id"];
	?>
	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-escale=1.0">
	<title>Horarios | ITA</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/estiloMenu.css">
	<link rel="stylesheet"  href="fonts/fonts.css">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Gruppo&family=Michroma&display=swap');
	</style>

	<style>span{color:#fff;}</style>
	<script  src="js/alerta.js"></script>
	
</head> -->
<!-- <body> -->
<!-- <div class="padre">
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
				<li><a href="#"> NOMBRE DE USUARIO </a><a class="icon-user"> </a></li>

			</ul>
			</div>
		</div> -->
		<div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>HORARIO OPERATIVO</h2>
				</div>
				<?php 
					 if(isset($idconvenio)){
				?>
				<div class="espacio2"></div>
				<div>
					
					<?php 
					  	$result=$db->query('SELECT * FROM convenioope WHERE id ='.$idconvenio.'') or die (mysqli_error());
					  	
    					while($fi=mysqli_fetch_array($result)) {
    						$result2=$db->query('SELECT * FROM personaloperativo WHERE id ='.$fi['IdPersonalOperativo'].'') or die (mysqli_error());
    					}
    					while($f=mysqli_fetch_array($result2)) {
						?>
							<label for="search">Nombre: </label>
							<input type="text" value="<?php echo $f['NombreCompleto']?>" readonly></input>
							
						<?php } 
							$convenio='';
							$result2=$db->query('SELECT id FROM convenioope WHERE id ='.$idconvenio.'')or die (mysqli_error());
							while($f=mysqli_fetch_array($result2)) {
									$convenio=$f['id'];
								}
						 ?>
						<br><button onclick="location.href='add_horario_ope.php?id=<?php echo $convenio; ?>'" type="submit" class="btnsE pull-right" name="Añadir">AGREGAR HORARIO</button>
				</div>
				<div class="espacio2"></div>
				<div>
					<table border=1>
					  <tr>
					  	<th>Clave Sie</th>
					    <th>Lunes</th>
					    <th>Martes</th>
					    <th>Miercoles</th>
					    <th>Jueves</th>
					    <th>Viernes</th>
					    <th>Sabado</th>
					    <th>Domingo</th>
					    <th>Numero de horas semanales</th>
					    <th>Editar/Eliminar</th>
					  </tr>
					  <tr>
					  	<?php 
					  	
					  	$query ="SELECT horariooperativo.id, horariooperativo.LunesHoraI, horariooperativo.LunesHoraF, horariooperativo.MartesHoraI, horariooperativo.MartesHoraF, horariooperativo.MiercolesHoraI, horariooperativo.MiercolesHoraF, horariooperativo.JuevesHoraI, horariooperativo.JuevesHoraF, horariooperativo.ViernesHoraI, horariooperativo.ViernesHoraF, horariooperativo.SabadoHoraI, horariooperativo.SabadoHoraF, horariooperativo.DomingoHoraI, horariooperativo.DomingoHoraF, convenioope.IdPersonalOperativo FROM horariooperativo INNER JOIN convenioope ON horariooperativo.IdConvenioOpe = convenioope.id WHERE horariooperativo.IdConvenioOpe =".$idconvenio;

					  	$cont=0;
					  	$resultado = $db->query($query);
    					while($f=mysqli_fetch_array($resultado)) {

    						$query2 ="SELECT personaloperativo.id, personaloperativo.ClaveSie FROM personaloperativo WHERE personaloperativo.id =".$f['IdPersonalOperativo'];

    						$resultado2 = $db->query($query2);
    					while($f2=mysqli_fetch_array($resultado2)) {
    						
    					$h1= new DateTime($f['LunesHoraI']);
						$h2= new DateTime($f['LunesHoraF']);
						$h3= new DateTime($f['MartesHoraI']);
						$h4= new DateTime($f['MartesHoraF']);
						$h5= new DateTime($f['MiercolesHoraI']);
						$h6= new DateTime($f['MiercolesHoraF']);
						$h7= new DateTime($f['JuevesHoraI']);
						$h8= new DateTime($f['JuevesHoraF']);
						$h9= new DateTime($f['ViernesHoraI']);
						$h10= new DateTime($f['ViernesHoraF']);
						$h11= new DateTime($f['SabadoHoraI']);
						$h12= new DateTime($f['SabadoHoraF']);
						$h13= new DateTime($f['DomingoHoraI']);
						$h14= new DateTime($f['DomingoHoraF']);

    						$horasD = $h1->diff($h2); 
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;

							$horasD = $h3->diff($h4);
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;

							$horasD = $h5->diff($h6);
								$horasdiarias = $horasD->format('%H');
								$cont+=$horasdiarias;

							$horasD = $h7->diff($h8);
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;

							$horasD = $h9->diff($h10);
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;

							$horasD = $h11->diff($h12);
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;

							$horasD = $h13->diff($h14);
							$horasdiarias = $horasD->format('%H');
							$cont+=$horasdiarias;
    						?>
    					<td><?php echo $f2['ClaveSie'];?></td>
					    <td><?php echo $f['LunesHoraI']," - ",$f['LunesHoraF'];?></td>
					    <td><?php echo $f['MartesHoraI']," - ",$f['MartesHoraF'];?></td>
					    <td><?php echo $f['MiercolesHoraI']," - ",$f['MiercolesHoraF'];?></td>
					    <td><?php echo $f['JuevesHoraI']," - ",$f['JuevesHoraF'];?></td>
					    <td><?php echo $f['ViernesHoraI']," - ",$f['ViernesHoraF'];?></td>
					    <td><?php echo $f['SabadoHoraI']," - ",$f['SabadoHoraF'];?></td>
					    <td><?php echo $f['DomingoHoraI']," - ",$f['DomingoHoraF'];?></td>
					    <td><?php echo $cont ?></td>
					    <?php }?>
					</td>

					    <td><div class="pull-center">
					    <button type="submit" class="btnsEdition icon-pencil" name="Editar" onclick="location.href='horarios_operativo_editar.php?id=<?php echo $f['id']?>'"></button>
					    <button type="submit" class="btnsDelite icon-cross" name="Eliminar" id="alertaHorario" onclick="ConfirmBorrarHorarioOperativo(<?=$f['id']?>,'<?=$idconvenio?>' )"></button></div>
					    </td>
					  </tr>
					  <?php
  						}
  					}
 					?>
					</table>

					<br><br>			
					
				</div>
				<br><button class="btns pull-left" onclick="location.href='horarios_operativo.php'">VOLVER</button><br><br><br>
			</div>
		</div>
	</div>
</div>
	<!-- <script src="js/jquery.js" ></script>
	<script src="js/abrir.js" ></script>
</body>
</html> -->