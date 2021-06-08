<?php
  $page_title = 'Agregar Subdirección';
  require_once('includes/load.php');

$all_personal = find_all_personal();
$all_puestos = puestos();
?>
<?php include_once('layouts/header.php'); ?>

<?php
 	if(isset($_POST['add_subdireccion'])){
		$req_fields = array('FI');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_fi  = remove_junk($db->escape($_POST['FI']));

			$query  = "INSERT INTO subdireccion (";
			$query .=" Subdireccion";
			$query .=") VALUES (";
			$query .=" '{$p_fi}'";
			$query .=")";

			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
          echo"<script type='text/javascript'>
          $(document).ready(function() {
            Swal.fire({
              title: 'Agregado',
              text: 'La subdirección se agregó correctamente',
              icon: 'success',
              timer: 2000
            }).then(
              function () {
                location.href = 'subdirecciones.php';
              }
            )
            })
          </script>";
      } else {
        echo"<script type='text/javascript'>
        $(document).ready(function() {
          Swal.fire({
            title: 'Error',
            text: 'Lo siento, registro falló',
            icon: 'error',
            timer: 2000
          }).then(
            function () {
              location.href = 'subdirecciones.php';
            }
          )
          })
        </script>";
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_subdirecciones.php',false);
   }
 }
?>

  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Subdirección</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="add_subdireccion.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control"  name='FI' id='fi' required>
                        </div>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger" onclick="location.href='subdirecciones.php'">Cancelar</button>
                <!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);"> -->
              <button type="submit" name="add_subdireccion" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>