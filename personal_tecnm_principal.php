<?php
  $page_title = 'Lista del Personal';
  require_once('includes/load.php');
  include_once('layouts/header.php');
?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Personal TECNM</span>
       </strong>
         <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR PERSONAL</a>
      </div>

      <div class="panel-body">
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
					  <tr>
              <th>ID SIE</th>
					    <th>Nombre</th>
					    <th>Titulo abreviado</th>
					    <th>Tipo de persona</th>
					    <th>Régimen</th>
					    <th>Departamento</th>
					    <th>Función/Puesto</th>
					    <th>Área académica</th>
					    <th>S.N.I</th>
					    <th>Motivo de ausencia</th>
            <th class="text-center" style="width: 10%;">Acciones</th>
					  </tr>
            </thead>
            <tbody class="boddy">
					  <?php 
					  $result=$db->query('SELECT * FROM personal')or die(mysqli_error());
    					while($f=mysqli_fetch_array($result)) {

					$regimen=$db->query('SELECT Regimen FROM regimen WHERE id="'.$f['IdRegimen'].'"') or die (mysqli_error());
					$tregimen=mysqli_fetch_assoc($regimen);

          $tipo=$db->query('SELECT TipoPersona FROM tipopersona WHERE id="'.$f['IdTipoPersona'].'"') or die (mysqli_error());
					$tpersona=mysqli_fetch_assoc($tipo);

          $area=$db->query('SELECT AreaAcademica FROM areaacademica WHERE id="'.$f['IdAreaAcademica'].'"') or die (mysqli_error());
					$tarea=mysqli_fetch_assoc($area);

          $sni=$db->query('SELECT SNI FROM sni WHERE id="'.$f['IdSNI'].'"') or die (mysqli_error());
					$tsni=mysqli_fetch_assoc($sni);

          $motivo=$db->query('SELECT MotivoAusencia FROM motivoausencia WHERE id="'.$f['IdMotivoAusencia'].'"') or die (mysqli_error());
					$tmotivo=mysqli_fetch_assoc($motivo);

					$dep=$db->query('SELECT Departamento FROM departamento WHERE id="'.$f['IdDepartamento'].'"') or die (mysqli_error());
					$tdepartamento=mysqli_fetch_assoc($dep);

          $puesto=$db->query('SELECT Puesto FROM puesto WHERE id="'.$f['IdPuesto'].'"') or die (mysqli_error());
					$tpuesto=mysqli_fetch_assoc($puesto);
					 ?>
					  <tr>
					    <td><?php echo $f['NoSie']; ?></td>
					    <td><?php echo $f['NombreCompleto']; ?></td>
					    <td><?php echo $f['TituloAbreviado']; ?></td>
              <td><?php echo $tpersona['TipoPersona']; ?></td>
					    <td><?php echo $tregimen['Regimen']; ?></td>
              <td><?php echo $tdepartamento['Departamento']; ?></td>
					    <td><?php echo $tpuesto['Puesto']; ?></td>
					    <td><?php echo $tarea['AreaAcademica']; ?></td>
					    <td><?php echo $tsni['SNI']; ?></td>
					    <td><?php echo $tmotivo['MotivoAusencia']; ?></td>
					   
					    <td class="text-center">
           <div class="btn-group">
              <a href="edit_operativo.php?id=<?php echo (int)$f['id'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

              <a href="delete_operativo.php?id=<?php echo (int)$f['id'];?>" class="btn btn-danger btn-xs btn-del" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
           </div>
           </td>
					  </tr>
					  <?php
  						}
 					?>
           </tbody>
					</table>
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
                      title: 'Eliminar Operativo?',
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
                      text: 'El operativo se eliminó correctamente'
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
                      "sScrollX": "100%", //This is what made my columns increase in size.
                      "bScrollCollapse": true,
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