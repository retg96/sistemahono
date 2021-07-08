<?php
  $page_title = 'Agregar Usuario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
  $all_users = find_all_users();
?>
<?php
 	if(isset($_POST['add_user'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
        $req_fields = array('full-name','username','password','level');
		validate_fields($req_fields);
		if(empty($errors)){
            $name   = remove_junk($db->escape($_POST['full-name']));
            $username   = remove_junk($db->escape($_POST['username']));
            $password   = remove_junk($db->escape($_POST['password']));
            $user_level = (int)$db->escape($_POST['level']);
            $password = sha1($password);

            $query = "INSERT INTO users (";
            $query .="name,username,password,user_level,status";
            $query .=") VALUES (";
            $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
            $query .=")";


			// $query .=" ON DUPLICATE KEY UPDATE NoSie='{$p_sie}'";
     if($db->query($query)){
       $session->msg('s',"Nacionalidad agregada exitosamente. ");
       redirect('nacionalidad.php', false);
      } else {
       $session->msg('d',' Lo siento, registro falló.' . $db->get_last_error());
        $session->msg('d',' Lo siento, registro falló.');
        redirect('add_nacionalidad.php', false);
      }
   } else{
     $session->msg("d", $errors);
     redirect('add_nacionalidad.php',false);
   }
 }

	

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
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Usuario</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" novalidate method="post" action="add_nacionalidad.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="full-name" placeholder="Nombre completo" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" name="username" placeholder="Nombre de usuario">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name ="password"  placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                    <label for="level">Rol de usuario</label>
                        <select class="form-control" name="level">
                        <?php foreach ($groups as $group ):?>
                        <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                        <?php endforeach;?>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                    <label for="level">Dirección</label>
                        <select class="form-control" name="level">
                        <?php foreach ($all_users as $user ):?>
                        <option value="<?php echo $user['Departamento'];?>"><?php echo ucwords($user['Departamento']);?></option>
                        <?php endforeach;?>
                        </select>
                    </div> -->

                    <!-- <div class="form-group">
                          <label>Departamento:</label><br>
							<select class="form-control" name="departamento" id="departamento" required>
								<?php 
                                $result=$db->query('SELECT * FROM departamento');
                                    while($f=mysqli_fetch_array($result)) {
                                ?>
								<option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Departamento'] ?></option>
							    <?php } ?>
							</select>      
                    </div> -->
                    <div class="form-group">
                          <label>Subdirección:</label>
							<select class="form-control" name="subdireccion" id="subdireccion" required>
              <option value="0">Selecciona una Opcion</option>

								<?php 
                                $result=$db->query('SELECT * FROM subdireccion');
                                    while($f=mysqli_fetch_array($result)) {
                ?>
								<option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Subdireccion'] ?></option>
							    <?php } ?>
							</select>      
                    </div>

                    <!-- <select class="form-control" id="hijo" name="hijo" class="form-control">
                      <option>---</option>
                    </select> -->

                    <div id="select2lista"></div>

                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="add_user" class="btn btn-primary">Agregar</button>
              
          </form>
          <div id="respuesta"></div>
          <script type="text/javascript">
	$(document).ready(function(){
		// $('#subdireccion').val(1);
		recargarLista();

		$('#subdireccion').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"idsubdireccion=" + $('#subdireccion').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>