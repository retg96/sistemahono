<?php
  $page_title = 'Convenios Operativos';
  require_once('includes/load.php');
?>
<?php include_once('layouts/header.php'); ?>
<?php 
					$id = $_GET['id'];
					$query = "SELECT personaloperativo.ClaveSie,personaloperativo.NombreCompleto,personaloperativo.Calle, personaloperativo.Fraccionamiento, personaloperativo.NoExterior, personaloperativo.NoInterior, personaloperativo.RFC,Regimen.Regimen FROM personaloperativo INNER JOIN regimen ON personaloperativo.IdRegime=regimen.id WHERE personaloperativo.id=".$id." ";
					$resultado = $db->query($query);

					while($f=mysqli_fetch_array($resultado)) {
				?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Convenios Operativos</span>
       </strong>
         <a href="add_convenio.php?id=<?php echo $id; ?>" class="btn btn-info pull-right">AGREGAR CONVENIO</a>
      </div>


        <!-- <button onclick="location.href='horario_operativo_añadir.php?id=<?php echo $convenio; ?>'" type="submit" class="btnsE pull-right" name="Añadir">AGREGAR HORARIO</button> -->

      <div class="panel-body">
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
			<tr>
				<th>ID</th>
				<th>Fecha de Inicio</th>
				<th>Fecha Fin</th>
				<th>Descargar</th>
				<th>Detalles</th>
        <th class="text-center" style="width: 10%;">Acciones</th>
			</tr>
            </thead>
            <tbody class="boddy">
            <?php 


										  	$result=$db->query('SELECT * FROM convenioope WHERE IdPersonalOperativo ='.$id.' ORDER BY (FechaInicio)') or die (mysqli_error());

										  	$NumH=0;
										  	
					    					while($fe=mysqli_fetch_array($result)) {
					    					?>
					  <tr>
                      <td><?php echo $fe['id'];?></td>
                      <td><?php echo $fe['FechaInicio'];?></td>
                      <td><?php echo $fe['FechaFin'];?></td>
                      <td><a class='btn btn-success btn-xs' href='convenio_form/formato_convenio_operativo.php?id=<?php echo $fe['IdConvenioOpe'];?>'>DESCARGAR</a></td>
                      <td><a class='btn btn-success btn-xs' href='personal_tecnm_operativo_detalles_convenio_individual.php?id=<?php echo $fe['IdConvenioOpe'];?>'>DETALLES</a></td>
                        
					   
					    <td class="text-center">
           <div class="btn-group">
              <a href="edit_convenio.php?id=<?php echo (int)$fe['id'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

              <a href="delete_convenio.php?id=<?php echo (int)$fe['id'];?>" class="btn btn-danger btn-xs btn-del" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
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
    <input type="button" class="btn btn-danger" value="Regresar" onclick="location.href='convenios_operativo.php'">
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