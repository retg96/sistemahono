<?php
  $page_title = 'Horarios';
  require_once('includes/load.php');
  $idconvenio = $_GET["id"];
?>
<?php include_once('layouts/header.php'); ?>
<?php 
		    if(isset($idconvenio)){
	    ?>

        <?php 
			// $result=$db->query('SELECT * FROM horariodocentemateria WHERE id ='.$idconvenio.'') or die (mysqli_error());
      $result=$db->query('SELECT * FROM convenio WHERE id ='.$idconvenio.'') or die (mysqli_error());

				while($fi=mysqli_fetch_array($result)) {
    				$result2=$db->query('SELECT * FROM personal WHERE id ='.$fi['IdPersonal'].'') or die (mysqli_error());
    			}
    			while($f=mysqli_fetch_array($result2)) {
		?>
			<!-- <label for="search">Nombre: </label>
			<input type="text" value="<?php echo $f['NombreCompleto']; ?>" readonly></input> -->
							
		<?php } 
			$convenio='';
			$result2=$db->query( 'SELECT id FROM convenio WHERE id ='.$idconvenio.'')or die (mysqli_error());
      // $result2=$db->query( 'SELECT id FROM horariodocentemateria WHERE id ='.$idconvenio.'')or die (mysqli_error());
			while($f=mysqli_fetch_array($result2)) {
			$convenio=$f['id'];
			}
	    ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Horarios Personal</span>
       </strong>
         <a href="add_horario_ope.php?id=<?php echo $convenio; ?>" class="btn btn-info pull-right">AGREGAR HORARIO</a>
      </div>


        <!-- <button onclick="location.href='horario_operativo_añadir.php?id=<?php echo $convenio; ?>'" type="submit" class="btnsE pull-right" name="Añadir">AGREGAR HORARIO</button> -->

      <div class="panel-body">
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
			<tr>
                <th>Sie</th>
                <th>Materia</th>
                <th>Modalidad</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
                <th>Domingo</th>
                <th>Total de Horas</th>
                <th class="text-center" style="width: 10%;">Acciones</th>
			</tr>
            </thead>
            <tbody class="boddy">
            <?php 
					  	
					  	$query ="SELECT horariodocentemateria.id,horariodocentemateria.IdMateria,horariodocentemateria.IdModalidad, horariodocentemateria.LunesHoraI, horariodocentemateria.LunesHoraF, horariodocentemateria.MartesHoraI, horariodocentemateria.MartesHoraF, horariodocentemateria.MiercolesHoraI, horariodocentemateria.MiercolesHoraF, horariodocentemateria.JuevesHoraI, horariodocentemateria.JuevesHoraF, horariodocentemateria.ViernesHoraI, horariodocentemateria.ViernesHoraF, horariodocentemateria.SabadoHoraI, horariodocentemateria.SabadoHoraF, horariodocentemateria.DomingoHoraI, horariodocentemateria.DomingoHoraF, convenio.IdPersonal FROM horariodocentemateria INNER JOIN convenio ON horariodocentemateria.IdConvenio = convenio.id WHERE horariodocentemateria.IdConvenio =".$idconvenio;
              // $query ="SELECT horariodocentemateria.id,horariodocentemateria.IdMateria,horariodocentemateria.IdModalidad, horariodocentemateria.LunesHoraI, horariodocentemateria.LunesHoraF, horariodocentemateria.MartesHoraI, horariodocentemateria.MartesHoraF, horariodocentemateria.MiercolesHoraI, horariodocentemateria.MiercolesHoraF, horariodocentemateria.JuevesHoraI, horariodocentemateria.JuevesHoraF, horariodocentemateria.ViernesHoraI, horariodocentemateria.ViernesHoraF, horariodocentemateria.SabadoHoraI, horariodocentemateria.SabadoHoraF, horariodocentemateria.DomingoHoraI, horariodocentemateria.DomingoHoraF, materia.Materia, modalidad.Modalidad, carrera.Carrera
              //  FROM horariodocentemateria 
              //  INNER JOIN materia ON horariodocentemateria.IdMateria = materia.id
              //  INNER JOIN modalidad ON horariodocentemateria.IdModalidad = modalidad.id
              //  INNER JOIN carrera ON horariodocentemateria.IdCarrera = carrera.id
              //  WHERE horariodocentemateria.IdConvenio =".$idconvenio;

					  	// $query ="SELECT horariodocentemateria.id,horariodocentemateria.IdMateria,horariodocentemateria.IdModalidad, horariodocentemateria.LunesHoraI, 
              // horariodocentemateria.LunesHoraF, horariodocentemateria.MartesHoraI, horariodocentemateria.MartesHoraF, horariodocentemateria.MiercolesHoraI, 
              // horariodocentemateria.MiercolesHoraF, horariodocentemateria.JuevesHoraI, horariodocentemateria.JuevesHoraF, horariodocentemateria.ViernesHoraI, 
              // horariodocentemateria.ViernesHoraF, horariodocentemateria.SabadoHoraI, horariodocentemateria.SabadoHoraF, horariodocentemateria.DomingoHoraI, 
              // horariodocentemateria.DomingoHoraF, convenio.IdPersonal, materia.id, materia.Materia, modalidad.id,modalidad.Modalidad 
              // FROM horariodocentemateria 
              // INNER JOIN convenio ON horariodocentemateria.IdConvenio = convenio.id
              // INNER JOIN materia ON horariodocentemateria.IdMateria = materia.id 
              // INNER JOIN modalidad ON horariodocentemateria.IdModalidad = modalidad.id  
              // WHERE horariodocentemateria.IdConvenio =".$idconvenio;

					  	
					  	$resultado = $db->query($query);
    					while($f=mysqli_fetch_array($resultado)) {
                $cont=0;

    						$query2 ="SELECT personal.id, personal.NoSie FROM personal WHERE personal.id =".$f['IdPersonal'];

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
					  <tr>
              <td><?php echo $f2['NoSie'];?></td>
              <td><?php echo $f['IdMateria'];?></td>
              <td><?php echo $f['IdModalidad'];?></td>
					    <td><?php echo $f['LunesHoraI']," - ",$f['LunesHoraF'];?></td>
					    <td><?php echo $f['MartesHoraI']," - ",$f['MartesHoraF'];?></td>
					    <td><?php echo $f['MiercolesHoraI']," - ",$f['MiercolesHoraF'];?></td>
					    <td><?php echo $f['JuevesHoraI']," - ",$f['JuevesHoraF'];?></td>
					    <td><?php echo $f['ViernesHoraI']," - ",$f['ViernesHoraF'];?></td>
					    <td><?php echo $f['SabadoHoraI']," - ",$f['SabadoHoraF'];?></td>
					    <td><?php echo $f['DomingoHoraI']," - ",$f['DomingoHoraF'];?></td>
					    <td><?php echo $cont ?></td>
					    <?php }?>
					    <td class="text-center">
           <div class="btn-group">
              <a href="edit_horario.php?id=<?php echo (int)$f['id'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

              <a href="delete_horario.php?id=<?php echo (int)$f['id'];?>" class="btn btn-danger btn-xs btn-del" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
           </div>
           </td>
					  </tr>
					  <?php
  						
  					}
          }
 					?>
                
           </tbody>
		</table>
        <input type="button" class="btn btn-danger" value="Regresar" onclick="location.href='horarios.php'">
          <?php if(isset($_GET['m'])) : ?>
            <div class="flash-data" data-flashdata="<?= $_GET['m']; ?>"></div>
          <?php endif; ?>
          <!-- <script src="jquery-3.5.1.min.js"></script>
          <script src="sweetalert2.all.min.js"></script> -->
          <script>
              $('.btn-del').on('click', function(e){
                  e.preventDefault();
                  const href = $(this).attr('href')

                  Swal.fire({
                      title: 'Eliminar Horario?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Eliminar'
                      }).then((result) => {
                      if (result.value) {
                          document.location.href = href;
                      }
                      })
                  
              })

              const flashdata = $('.flash-data').data('flashdata')
              if(flashdata){
                  Swal.fire({
                      icon :'success',
                      title: 'Eliminado',
                      text: 'El horario se eliminó correctamente'
                  })
              }

              // $('#btn').on('click', function() {
              //     Swal.fire({
              //         title: 'Deseas eliminar este estudiante?',
              //         icon: 'warning',
              //         showCancelButton: true,
              //         confirmButtonColor: '#3085d6',
              //         cancelButtonColor: '#d33',
              //         confirmButtonText: 'Eliminar'
              //         }).then((result) => {
              //         if (result.isConfirmed) {
              //             Swal.fire(
              //             'Eliminado con éxito',
              //             'El estudiante ha sido eliminado.',
              //             'success'
              //             )
              //         }
              //         })
              // })
              </script>
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
                          { "sWidth": "1%" }, // 2nd column width
                          { "sWidth": "1%" }, // 2nd column width
                          // { "sWidth": "1%" }, // 2nd column width
                          // { "sWidth": "1%" }, // 2nd column width

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
		</div>
	</div>
</div>
<?php include_once('layouts/footer.php'); ?>