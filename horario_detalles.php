<?php
  $page_title = 'Horarios';
  require_once('includes/load.php');
  $idconvenio = $_GET["id"];
  $idpersonal="";
?>
		<div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>HORARIO</h2>
				</div>
				<?php 
					 if(isset($idpersonal)){
				?>
				<div class="espacio2"></div>
				<div>
					
					<?php 
					  	$result=$db->query('SELECT * FROM convenio INNER JOIN personal ON convenio.IdPersonal = personal.id WHERE convenio.id  ="'.$idconvenio.'"') or die (mysqli_error());
					  	
    					while($fi=mysqli_fetch_array($result)) {
						?>	<label for="search">Nombre: </label>
							<input type="text" value="<?php echo $fi['NombreCompleto'] ?>" readonly></input>
							
						<?php } ?>

					<br><button onclick="location.href='horarios_añadir.php?id=<?php echo $idconvenio; ?>'" type="submit" class="btnsE pull-right" name="Añadir">AGREGAR MATERIA</button>
				</div>
				<div class="espacio2"></div>
				<div>
					<table border=1>
					  <tr>
					  	<th>Clave del maestro</th>
					    <th>Clave de materia</th>
					    <th>Numero de horas</th>
					    <th>Nombre de materia</th>
					    <th>Lunes</th>
					    <th>Martes</th>
					    <th>Miercoles</th>
					    <th>Jueves</th>
					    <th>Viernes</th>
					    <th>Sábado</th>
					    <th>Domingo</th>
					    <th>Carrera a la que imparte</th>
					    <th>Modalidad</th>
					    <th>Editar/Borrar</th>
					  </tr>
					  <tr>
					  	<?php 
					  	$result=$db->query('SELECT personal.id,personal.NoSie,horariodocentemateria.id,
horariodocentemateria.LunesHoraI,horariodocentemateria.MartesHoraI,horariodocentemateria.MiercolesHoraI,horariodocentemateria.JuevesHoraI,horariodocentemateria.ViernesHoraI,horariodocentemateria.SabadoHoraI,horariodocentemateria.DomingoHoraI,horariodocentemateria.LunesHoraF,horariodocentemateria.MartesHoraF,horariodocentemateria.MiercolesHoraF,horariodocentemateria.JuevesHoraF,horariodocentemateria.ViernesHoraF,horariodocentemateria.SabadoHoraF,horariodocentemateria.DomingoHoraF,materia.id,materia.AreaAbreviada,materia.Materia,materia.Semestre,materia.ClaveMateria,materia.NombreCorto,materia.HorasTeoricas,materia.HorasPracticas, carrera.Carrera, modalidad.Modalidad,convenio.id FROM horariodocentemateria INNER JOIN materia ON materia.id=horariodocentemateria.IdMateria INNER JOIN modalidad ON modalidad.id=horariodocentemateria.IdModalidad INNER JOIN carrera ON carrera.id=materia.IdCarrera INNER JOIN convenio ON convenio.id = horariodocentemateria.IdConvenio INNER JOIN personal ON personal.id =convenio.IdPersonal WHERE horariodocentemateria.IdConvenio = "'.$idconvenio.'" ORDER BY (materia.ClaveMateria)') or die (mysqli_error());

					  	$NumH=0;
					  	
    					while($f=mysqli_fetch_array($result)) {

					  	$NumH=$f['HorasTeoricas']+$f['HorasPracticas'];
					  	$idpersonal=$f['id'];
    						?>
    					
    					<td><?php echo $f['NoSie'];?></td>
					    <td><?php echo $f['ClaveMateria'];?></td>
					    <td><?php echo $NumH;?></td>
					    <td><?php echo $f['Materia'];?></td>
					    <td><?php echo $f['LunesHoraI']," - ",$f['LunesHoraF'];?></td>
					    <td><?php echo $f['MartesHoraI']," - ",$f['MartesHoraF'];?></td>
					    <td><?php echo $f['MiercolesHoraI']," - ",$f['MiercolesHoraF'];?></td>
					    <td><?php echo $f['JuevesHoraI']," - ",$f['JuevesHoraF'];?></td>
					    <td><?php echo $f['ViernesHoraI']," - ",$f['ViernesHoraF'];?></td>
					    <td><?php echo $f['SabadoHoraI']," - ",$f['SabadoHoraF'];?></td>
					    <td><?php echo $f['DomingoHoraI']," - ",$f['DomingoHoraF'];?></td>
					    <td><?php echo $f['Carrera'];?></td>
					    <td><?php echo $f['Modalidad'];?></td>
					    <td><div class="pull-center">
					    <button type="submit" class="btnsEdition icon-pencil" name="Editar" onclick="location.href='horarios_editar.php?id=<?php echo $f['id']?>'"></button>
					    <button type="submit" class="btnsDelite icon-cross" name="Eliminar" id="alertaHorario" onclick="ConfirmBorrarHorario(<?=$f['IdHorarioDocenteMateria']?>,'<?=$f['IdConvenio']?>' )"></button></div>
					    </td>
					  </tr>
					  <?php
  						}
  					}
 					?>
					</table>
				
					<br><br>
					
				</div>
				<br><button class="btns pull-left" onclick="location.href='horarios.php'">VOLVER</button><br><br><br>
			</div>
		</div>
	</div>
</div>