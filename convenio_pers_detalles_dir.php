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
<?php 
					$id = $_GET['id'];
					$query = "SELECT personal.NoSie,personal.NombreCompleto,personal.Calle, personal.Fraccionamiento, personal.NumExterior, personal.NumInterior, personal.RFC,Regimen.Regimen FROM personal INNER JOIN regimen ON personal.IdRegimen=regimen.id WHERE personal.id=".$id." ";
					$resultado = $db->query($query);

					while($f=mysqli_fetch_array($resultado)) {
				?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Convenios</span>
       </strong>
         <!-- <a href="add_convenio_perso.php?id=<?php echo $id; ?>" class="btn btn-info pull-right">AGREGAR CONVENIO</a> -->
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
        <!-- <th class="text-center" style="width: 10%;">Acciones</th> -->
			</tr>
            </thead>
            <tbody class="boddy">
            <?php 


										  	$result=$db->query('SELECT * FROM convenio WHERE IdPersonal ='.$id.' ORDER BY (InicioContrato)') or die (mysqli_error());

										  	$NumH=0;
										  	
					    					while($fe=mysqli_fetch_array($result)) {
					    					?>
					  <tr>
                      <td><?php echo $fe['IdConvenio'];?></td>
                      <td><?php echo $fe['InicioContrato'];?></td>
                      <td><?php echo $fe['FinContrato'];?></td>
                      <td><a class='btn btn-success btn-xs' href='convenio_form/formato_convenio.php?id=<?php echo $fe['IdConvenio'];?>'>DESCARGAR</a></td>
                      <td><a class='btn btn-success btn-xs' href='convenio_personal_dir.php?id=<?php echo $fe['IdConvenio'];?>'>DETALLES</a></td>
                        
					   
					    <!-- <td class="text-center">
           <div class="btn-group">
              <a href="edit_convenio_pers.php?id=<?php echo (int)$fe['IdConvenio'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

              <a href="" onclick="ConfirmBorrarConvenio('<?php echo $fe['IdConvenio'];?>','<?php echo $id;?>')" class="btn btn-danger btn-xs" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
                <span class="glyphicon glyphicon-trash"></span>
              </a> -->
              <!-- <a class="btn btn-danger btn-xs" id="alertaPersonal" onclick="ConfirmBorrarConvenio('<?php echo $fe['id'];?>','<?php echo $id;?>')">
              <span class="glyphicon glyphicon-trash"></span>
              </a> -->
           <!-- </div>
           </td> -->
					  </tr>
					  <?php
  						}
            }
				
 					?>
                
           </tbody>
		</table>
    <input type="button" class="btn btn-danger" value="Regresar" onclick="location.href='convenios.php'">
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
                      title: 'Eliminar Convenio?',
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
                      text: 'El convenio se eliminó correctamente'
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
              function ConfirmBorrarConvenio(id,idpersonal) {
          
          if (confirm("¿Estas seguro de eliminar el registro <"+id+">? Todas la informacion a este se eliminarán también")){
          
              window.location.assign("delete_convenio.php?id="+id+"&idpersonal="+idpersonal);
       
          }else{
       
              alert("Operacion cancelada");
       
          }
      }
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