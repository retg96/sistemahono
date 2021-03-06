<?php
  $page_title = 'Personal Por Departamento';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(4);
//pull out all user form database
 $all_nacionalidades = nacionalidades();

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
          <span>Personal Por Departamento</span>
       </strong>
         <!-- <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR NACIONALIDAD</a> -->
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
          <tr>
            <!-- <th class="text-center" style="width: 50px;">Id</th> -->
            <!-- <th class="text-center" style="width: 50px;"></th> -->
            <!-- <th>Id</th> -->
            <th>Departamento</th>
	        <th>Hombres</th>
			<th>Mujeres</th>
			<th>Total</th>
            <!-- <th class="text-center" style="width: 10%;">Acciones</th> -->
          </tr>
        </thead>
        <?php 
					   $conH=0;
					   $conM=0;
					   $Total=0;
					   $result=$db->query('SELECT * FROM departamento')or die(mysqli_error());
					   while($f=mysqli_fetch_array($result)) {
					   	$result2=$db->query('SELECT Sexo FROM personal WHERE id ='.$f['id']);
					   	while($sexo=mysqli_fetch_array($result2)) {
					   			$S=$sexo['Sexo'];
									if($sexo['Sexo'] == 'M'){
										$conH++;
									}else if($sexo['Sexo']== 'F'){
											$conM++;
										}	 
					   }
					   $Total = $conM + $conH;

					   ?>
        <tbody class="boddy">
        
          <tr>
           <!-- <td class="text-center"><?php echo count_id();?></td> -->
           <!-- <td><?php echo remove_junk(ucwords($nacionalidad['id']))?></td> -->
           <th scope="row"><?php echo $f['Departamento'] ?></th>

					   	<td><?php echo $conH; ?></td>
					   	<td><?php echo $conM; ?></td>
					   	<td><?php echo $Total; ?></td>
						<?php 
							 $conH=0;
					  		 $conM=0;
					   		$Total=0;
					   	 } ?>

          </tr>
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
                      title: 'Eliminar Nacionalidad?',
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
                      text: 'La nacionalidad se eliminó correctamente'
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