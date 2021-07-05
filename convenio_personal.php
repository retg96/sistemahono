<?php
  $page_title = 'Convenios Individuales';
  require_once('includes/load.php');
  include_once('layouts/header.php');

?>
<!-- <!DOCTYPE html>
<html lang="en">-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>

<body>

<div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Convenios Individuales</span>
       </strong>
         <!-- <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR PERSONAL</a> -->
      </div>


<div class="container" style="margin-left:-1px;">
<br>
  <!-- <h2>Dynamic Tabs</h2> -->
  <ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#home">Datos Personales</a></li>
    <li><a data-toggle="tab" href="#menu1">Horarios</a></li>
    <!-- <li><a data-toggle="tab" href="#menu2">Home</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Datos Personales</h3>
        <?php 
          $idconvenio = $_GET['id'];
          $query = "SELECT personal.id,personal.NoSie,personal.NombreCompleto,personal.Calle, personal.NumExterior, personal.NumInterior, personal.Fraccionamiento, personal.RFC,regimen.Regimen FROM personal INNER JOIN regimen ON personal.IdRegimen=regimen.id INNER JOIN convenio ON convenio.IdPersonal=personal.id WHERE convenio.id=".$_GET['id']." ";
          $resultado = $db->query($query);

          while($f=mysqli_fetch_array($resultado)) {
          $idpersonal=$f['id'];
          ?>
      <label>Numero SIE:</label>
      <input class="form-control" type='text' name='ClaveSie' value="<?php echo $f['NoSie']?>" readonly>
					
      <label>Nombre:</label>
      <input class="form-control" type='text' name='Nombre' value="<?php echo $f['NombreCompleto']?>" readonly>
                            
      <label>Domicilio:</label>
      <textarea class="form-control" type='text' name='Domicilio' readonly><?php echo $f['Calle'], ', ',$f['NumExterior'], ' ',$f['NumInterior'],', ' ,$f['Fraccionamiento'] ?></textarea>
      <label>RFC:</label>
      <input class="form-control" type='text' name='RFC' value="<?php echo $f['RFC']?>" readonly>
      <label>Regimen:</label>
      <input class="form-control" type='text' name='Regimen' value="<?php echo $f['Regimen']?>" readonly> <br>
                   		
      
</div>
<!---END-->


<div id="menu1" class="tab-pane fade">
  <h3>Horarios</h3>
  <table class="table table-bordered table-striped" id="mitabla">
        					<thead class="headd">
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
						</thead>
						<tbody class="boddy">
						<tr>
					  	<?php 
					  	
					  	$query ="SELECT horariodocentemateria.id, horariodocentemateria.LunesHoraI, horariodocentemateria.LunesHoraF, horariodocentemateria.MartesHoraI, horariodocentemateria.MartesHoraF, horariodocentemateria.MiercolesHoraI, horariodocentemateria.MiercolesHoraF, horariodocentemateria.JuevesHoraI, horariodocentemateria.JuevesHoraF, horariodocentemateria.ViernesHoraI, horariodocentemateria.ViernesHoraF, horariodocentemateria.SabadoHoraI, horariodocentemateria.SabadoHoraF, horariodocentemateria.DomingoHoraI, horariodocentemateria.DomingoHoraF, convenio.IdPersonal FROM horariodocentemateria INNER JOIN convenio ON horariodocentemateria.IdConvenio = convenio.id WHERE horariodocentemateria.IdConvenio =".$idconvenio;

					  	

					  	$resultado = $db->query($query);
    					while($f=mysqli_fetch_array($resultado)) {
                            $cont=0;
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
					  </tbody>
					</table>
          <?php } ?>
</div>
<!---END-->
<button type='' class="btn btn-danger btn-sm" onclick="location.href='convenio_pers_detalles.php?id=<?php echo $idpersonal ?>'">Regresar</button><br><br>

<script>
                  $(document).ready(function() {
                    $('#mitabla').DataTable({
                      "bAutoWidth": false,
                      // "sScrollX": "100%", //This is what made my columns increase in size.
                      // "bScrollCollapse": true,
                      // "sScrollY": "320px",
                      responsive: true,
                      processing: true,
                      lengthMenu: [[5, 10, -1], [5, 10, "All"]],
                      "aoColumns": [
                          { "sWidth": "1%" }, // 2nd column width 
                          { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width
						  { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width

                          // { "sWidth": "40%" } // 3rd column width and so on 
                        ],
                      "bInfo" : false,
                      "language":{
                        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                      }
                    });
                    $('#mitabla').parent().addClass('table-responsive');
                  } );
          </script>
          <style>
          .dataTables_wrapper .dataTables_paginate .paginate_button {
              padding : 0px;
              margin-left: 0px;
              display: inline;
              border: 0px;
              font-size: 9pt !important;
          }

          .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
              border: 0px;

          }
          .form-control {
            height: 28px;
            padding: 6px 12px;
            font-size: 9pt;
            }
            label{
              font-size: 9pt!important;
            }
            .dataTables_info{
              font-size: 9pt!important;
              text-align: left;
            }
            .mitabla{
              widht: -50px!important;
              /* font-size: 9pt!important; */
            }
            .headd, .boddy{
              font-size: 10pt!important;
            }
          </style>

</div>
  
</div>
<script>
$('#myTab a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
}) 
</script>

</body>


<?php include_once('layouts/footer.php'); ?>