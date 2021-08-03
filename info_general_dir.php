<?php
  $page_title = 'Concentrado de Información';
  require_once('includes/load.php');
  include_once('layouts/header.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
//  $all_personal = find_all_personal();
//  $convenios = convenio();
//  $all_convenios = find_all_convenios();
?>
		<!-- <div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>CONCENTRADO DE INFORMACIÓN</h2>
				</div>
				<div class="espacio2"></div>
				<div class="espacio2"></div> -->
        <div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>CONCENTRADO DE INFORMACIÓN</span>
       </strong>
         <!-- <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR FORMATO</a> -->
      </div>
     <div class="panel-body">
				<table class="table table-bordered table-striped" id="mitabla">
					  <thead>
					  	<tr>
					  	 	<th rowspan="2">Número</th>
					   		<th colspan="1">Periodo Escolar</th>
					   		<th rowspan="2">R.F.C.</th>
					    	<th rowspan="2">Fecha de ingreso</th>
					    	<th rowspan="2">Oring Cont</th>
					   		<th rowspan="2">Hrs/Pag/Hon</th>
					    	<th colspan="2">Materias que imparte</th>
					    	<th rowspan="2">Área Con</th>
					    	<th colspan="2">Hrs Sem/Mes por materia</th>
					    	<th rowspan="2">Cantidad Gpos</th>
					   		<th rowspan="2">Carrera</th>
					   		<th colspan="2">Títuto técnico(TT) Título de licenciatura (TL) Pasante de licenciatura (PL) con grado (CG) y sin grado (SG) </th>
					   	</tr>
					   	<tr>
					   		<th>Nombre del trabajador</th>
					    	<th scope="col">Clave</th>
					    	<th scope="col">Nombre</th>
					   		<th scope="col">T</th>
					    	<th scope="col">P</th>
					   		<th scope="col">Profesión</th>
					   		<th scope="col">Situación</th>			
					   	</tr>
					  </thead>
					  <tbody>
					  	<?php 
					  	$sie='';
					  		$query = "SELECT horariodocentemateria.Grupo, materia.id, materia.TotalCreditos, materia.ClaveMateria, materia.Materia, materia.HorasTeoricas, materia.HorasPracticas, convenio.IdPersonal FROM horariodocentemateria INNER JOIN materia ON horariodocentemateria.IdMateria = materia.id 	INNER JOIN convenio ON horariodocentemateria.IdConvenio = convenio.IdConvenio"; 

 					  		$resultado = $db->query($query); 
					  		 if (!empty($resultado) && $resultado->num_rows > 0) { 
					  		while($fila = mysqli_fetch_array($resultado)){  
					  			if(isset($fila['Grupo'])){
					  				$cant_grupos=1;
					  			}
					  		$query2 = "SELECT materia.id, carrera.Carrera FROM materia INNER JOIN carrera ON materia.IdCarrera = carrera.id WHERE materia.id = ".$fila['id'];
					  		$resultado2 = $db->query($query2); 
					  		 if (!empty($resultado2) && $resultado2->num_rows > 0) { 
					  		while($fila2 = mysqli_fetch_array($resultado2)){  

					  		$query3 ="SELECT personal.NoSie, personal.NombreCompleto, personal.RFC, personal.Profesion, personal.FechaIngresoTec, convenio.IdPersonal FROM personal INNER JOIN convenio ON personal.id = convenio.IdPersonal WHERE convenio.IdPersonal = ".$fila['IdPersonal'];

					  		$resultado3 = $db->query($query3); 
					  		 if (!empty($resultado3) && $resultado3->num_rows > 0) { 
					  		while($fila3 = mysqli_fetch_array($resultado3)){ 
				  				
					  		$query4 = "SELECT personal.id, personal.NoSie, nivelestudio.NivelEstudio, regimen.Regimen, departamento.Abreviatura  FROM personal INNER JOIN nivelestudio ON personal.IdNivelEstudio=nivelestudio.id INNER JOIN regimen ON personal.IdRegimen=regimen.id INNER JOIN departamento ON personal.IdDepartamento=departamento.id WHERE personal.id = ".$fila3['IdPersonal'];

					  			$resultado4 = $db->query($query4); 
					  		 if (!empty($resultado4) && $resultado4->num_rows > 0) { 
					  		while($fila4 = mysqli_fetch_array($resultado4)){ 

					  			if($sie==$fila3['NoSie']){ ?>
					  				<tr>
					  			<th scope="row"></th>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td></td>
					  			<td><?php echo $fila['TotalCreditos'] ?></td>
					  			<td><?php echo $fila['ClaveMateria'] ?></td>
					  			<td><?php echo $fila['Materia'] ?></td>
					  			<td><?php echo $fila4['Abreviatura'] ?></td>
					  			<td><?php echo $fila['HorasTeoricas'] ?></td>
					  			<td><?php echo $fila['HorasPracticas'] ?></td>
					  			<td><?php echo $cant_grupos ?></td>
					  			<td><?php echo $fila2['Carrera'] ?></td>
					  			<td></td>
					  			<td></td>

					  		</tr>
					  			<?php }else{
						?>
					  		<tr>
					  			<th scope="row"><?php echo $fila3['NoSie'] ?></th>
					  			<td><?php echo $fila3['NombreCompleto'] ?></td>
					  			<td><?php echo $fila3['RFC'] ?></td>
					  			<td><?php echo $fila3['FechaIngresoTec'] ?></td>
					  			<td><?php echo $fila4['Regimen'] ?></td>
					  			<td><?php echo $fila['TotalCreditos'] ?></td>
					  			<td><?php echo $fila['ClaveMateria'] ?></td>
					  			<td><?php echo $fila['Materia'] ?></td>
					  			<td><?php echo $fila4['Abreviatura'] ?></td>
					  			<td><?php echo $fila['HorasTeoricas'] ?></td>
					  			<td><?php echo $fila['HorasPracticas'] ?></td>
					  			<td><?php echo $cant_grupos ?></td>
					  			<td><?php echo $fila2['Carrera'] ?></td>
					  			<td><?php echo $fila3['Profesion'] ?></td>
					  			<td><?php echo $fila4['NivelEstudio'] ?></td>
					  		</tr>
					  	<?php 
					  	 }
					 	 }
						 }
						  $sie=$fila3['NoSie'];
						 }
						 }
						}
					}
				}
			}
					  	?>
					  </tbody>
					</table>
          
				<div class="espacio2"></div>
				<div>
			    </div>
			</div>
		</div>
	</div>
</div>
  <?php include_once('layouts/footer.php'); ?>