<?php
  $page_title = 'Convenios';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
//  $all_personal = find_all_personal();
//  $convenios = convenio();
//  $all_convenios = find_all_convenios();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Convenios </span>
       </strong>
         <!-- <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR PERSONAL</a> -->
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
          <tr>
            <!-- <th class="text-center" style="width: 50px;">Id</th> -->
            <!-- <th class="text-center" style="width: 50px;"></th> -->
            <th>Convenio</th>
            <th>No. Sie</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Titulo Abreviado</th>
            <th>Horario</th>
            <!-- <th class="text-center" style="width: 10%;">Acciones</th> -->
          </tr>
        </thead>
        <tbody class="boddy">
        <?php 
            $query = "SELECT personal.id, personal.NoSie, personal.NombreCompleto, regimen.Regimen,departamento.Departamento FROM personal INNER JOIN regimen ON personal.IdRegimen = regimen.id INNER JOIN departamento ON personal.IdDepartamento = departamento.id WHERE personal.NoSie NOT LIKE '' ORDER By personal.NoSie";

		    $result=$db->query('SELECT * FROM personal WHERE personal.NoSie NOT LIKE "" ORDER By personal.NoSie')or die(mysqli_error());
    		    while($f=mysqli_fetch_array($result)) {

			$dep=$db->query('SELECT * FROM departamento WHERE id="'.$f['IdDepartamento'].'"') or die (mysqli_error());
			$departamento=mysqli_fetch_assoc($dep);

            $regimen=$db->query('SELECT Regimen FROM regimen WHERE id="'.$f['IdRegimen'].'"') or die (mysqli_error());
            $tregimen=mysqli_fetch_assoc($regimen);

            // $estudio=$db->query('SELECT NivelEstudio FROM nivelestudio WHERE id="'.$f['IdNivelEstudio'].'"') or die (mysqli_error());
			// $testudio=mysqli_fetch_assoc($estudio);

            // $puesto=$db->query('SELECT Puesto FROM puesto WHERE id="'.$f['IdPuesto'].'"') or die (mysqli_error());
			// $tpuesto=mysqli_fetch_assoc($puesto);

			// $dep=$db->query('SELECT Departamento FROM departamento WHERE id="'.$tpersonal['IdDepartamento'].'"') or die (mysqli_error());
			// $departamento=mysqli_fetch_assoc($dep);
		?>
          <tr>
           <!-- <td class="text-center"><?php echo count_id();?></td> -->
           <td><?php echo remove_junk(ucwords($f['id']))?></td>
           <td><?php echo remove_junk(ucwords($f['NoSie']))?></td>
           <td><?php echo remove_junk(ucwords($f['NombreCompleto']))?></td>
          <td><?php echo remove_junk(ucwords($departamento['Departamento']))?></td>
          <td><?php echo remove_junk(ucwords($f['TituloAbreviado']))?></td>

           
           <td class="text-center">
           <div class="btn-group">

              <a href="convenio_pers_detalles_dir.php?id=<?php echo (int)$f['id'];?>" class="btn btn-success btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <!-- <span class="glyphicon glyphicon-edit"></span> -->
                VER CONVENIO
              </a>
              <!-- <a href="edit_personal.php?id=<?php echo (int)$a_personal['id'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

              <a href="delete_personal.php?id=<?php echo (int)$a_personal['id'];?>" class="btn btn-danger btn-xs btn-del" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-trash"></span>
              </a> -->
              <!-- <a href="horario_detalles.php?id=<?php echo (int)$convenio['IdConvenio'];?>" class="btn btn-success btn-xs" style="margin: 2px !important;" title="Horario" data-toggle="tooltip">VER HORARIO</a> -->
              
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
                      title: 'Eliminar Personal?',
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
                      text: 'El personal se eliminó correctamente'
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
  <?php include_once('layouts/footer.php'); ?>