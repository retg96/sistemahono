<?php
  $page_title = 'Convenios Individuales';
  require_once('includes/load.php');
?>
<head>
    <meta charset="utf-8">
    <title>Patrones Responsive Web Design</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
/* .box {
    max-width: 1200px;
    width: 95%;
    margin: 0 auto;
} */

@media (min-width: 768px) {
    .con-sidebar,.box_2 {
        display: flex;
        gap: 2rem;
    }
    .detalles{
        flex: 1;
    }
    .tabla {
        flex: 3;
    } 
}


</style>
		<div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>Detalles Convenio operativo</h2>
				</div>
				<div class="espacio2"></div>
				<div>
				<?php 
					$idconvenio = $_GET['id'];
					$query = "SELECT personaloperativo.id,personaloperativo.ClaveSie,personaloperativo.NombreCompleto,personaloperativo.Calle, personaloperativo.NoExterior, personaloperativo.NoInterior, personaloperativo.Fraccionamiento, personaloperativo.RFC,regimen.Regimen FROM personaloperativo INNER JOIN regimen ON personaloperativo.IdRegime=regimen.id INNER JOIN convenioope ON convenioope.IdPersonalOperativo=personaloperativo.id WHERE convenioope.id=".$_GET['id']." ";
					$resultado = $db->query($query);

					while($f=mysqli_fetch_array($resultado)) {
						$idpersonal=$f['id'];
				?>
					
                   <div class='box con-sidebar'>
                   		<div>
                            <label>Numero SIE:</label><br>
                            <input type='text' name='ClaveSie' value="<?php echo $f['ClaveSie']?>" readonly><br>
                            <label>Nombre:</label><br>
                            <input type='text' name='Nombre' value="<?php echo $f['NombreCompleto']?>" readonly><br>
                            
                            <label>Domicilio:</label><br>
                            <textarea type='text' name='Domicilio' readonly><?php echo $f['Calle'], ', ',$f['NoExterior'], ' ',$f['NoInterior'],', ' ,$f['Fraccionamiento'] ?></textarea><br>
                            <label>RFC:</label><br>
                            <input type='text' name='RFC' value="<?php echo $f['RFC']?>" readonly><br>
                        	<label>Regimen:</label><br>
                            <input type='text' name='Regimen' value="<?php echo $f['Regimen']?>" readonly><br>
                   		</div>
                        <div class="box_2">
						<!-- <div class="titulo">
                        	<h2>HORARIO</h2>
						</div> -->
                       		<table border=1>
					  <tr>

					    <th>Lunes</th>
					    <th>Martes</th>
					    <th>Miércoles</th>
					    <th>Jueves</th>
					    <th>Viernes</th>
					    <th>Sábado</th>
					    <th>Domingo</th>
					    <th>Numero de horas semanales</th>
					  </tr>
					  <tr>
					  	<?php 
					  	
					  	$query ="SELECT horariooperativo.id, horariooperativo.LunesHoraI, horariooperativo.LunesHoraF, horariooperativo.MartesHoraI, horariooperativo.MartesHoraF, horariooperativo.MiercolesHoraI, horariooperativo.MiercolesHoraF, horariooperativo.JuevesHoraI, horariooperativo.JuevesHoraF, horariooperativo.ViernesHoraI, horariooperativo.ViernesHoraF, horariooperativo.SabadoHoraI, horariooperativo.SabadoHoraF, horariooperativo.DomingoHoraI, horariooperativo.DomingoHoraF, convenioope.IdPersonalOperativo FROM horariooperativo INNER JOIN convenioope ON horariooperativo.IdConvenioOpe = convenioope.id WHERE horariooperativo.IdConvenioOpe =".$idconvenio;

					  	$cont=0;

					  	$resultado = $db->query($query);
    					while($f=mysqli_fetch_array($resultado)) {

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
					    <td><?php echo $f['LunesHoraI']," - ",$f['LunesHoraF'];?></td>
					    <td><?php echo $f['MartesHoraI']," - ",$f['MartesHoraF'];?></td>
					    <td><?php echo $f['MiercolesHoraI']," - ",$f['MiercolesHoraF'];?></td>
					    <td><?php echo $f['JuevesHoraI']," - ",$f['JuevesHoraF'];?></td>
					    <td><?php echo $f['ViernesHoraI']," - ",$f['ViernesHoraF'];?></td>
					    <td><?php echo $f['SabadoHoraI']," - ",$f['SabadoHoraF'];?></td>
					    <td><?php echo $f['DomingoHoraI']," - ",$f['DomingoHoraF'];?></td>
					    <td><?php echo $cont ?></td>
					    
					
					  </tr>
					  <?php } ?>
					</table>
                    <?php
					}
				
					?>

				</div>
				</div>
				<br><button type='' class='btnSE pull-left' onclick="location.href='convenio_ope_detalles.php?id=<?php echo $idpersonal ?>'">VOLVER</button><br><br><br>
                
			</div>
		</div>
	</div>
</div>
