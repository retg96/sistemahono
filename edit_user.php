<?php
  $page_title = 'Editar Usuario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  $all_users = find_all_users();
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('control_acceso.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    $req_fields = array('name','username','level','subdireccion','hijo');
    validate_fields($req_fields);
    if(empty($errors)){
           $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['name']));
           $username = remove_junk($db->escape($_POST['username']));
           $level = (int)$db->escape($_POST['level']);
           $subdireccion = (int)$db->escape($_POST['subdireccion']);
           $hijo = (int)$db->escape($_POST['hijo']);
           $status   = remove_junk($db->escape($_POST['status']));
           $sql = "UPDATE users SET name ='{$name}', clave ='{$username}',nivel_usuario='{$level}',status='{$status}',IdSubdireccion='{$subdireccion}',IdHijo='{$hijo}' WHERE id='{$db->escape($id)}'";
           $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            //$session->msg('s',"Account Updated ");
            $session->msg('s',' Cuenta actualizada');
            redirect('control_acceso.php', false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_user.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_user.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Update user password
if(isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"Se ha actualizado la contraseña del usuario. ");
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d','No se pudo actualizar la contraseña de usuario..');
          redirect('edit_user.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('edit_user.php?id='.(int)$e_user['id'],false);
  }
}

?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualizar cuenta para: '<?php echo remove_junk(ucwords($e_user['name'])); ?>'
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Nombres</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Usuario</label>
                  <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['clave'])); ?>">
            </div>
            <div class="form-group">
              <label for="level">Rol de usuario</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option <?php if($group['group_level'] === $e_user['nivel_usuario']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Activo</option>
                  <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Inactivo</option>
                </select>
                <!-- <select class="form-control" name="MotivoAusencia" required>
					<option value="<?php echo $e_user['id']; ?>"><?php echo $e_user['status']; ?></option>
						<?php 
						$result=$db->query('SELECT * FROM users')or die(mysqli_error());
				    	while($f=mysqli_fetch_array($result)) {
    					?>
						<option value="<?php echo $f['id'] ?>"><?php echo $f['status'] ?></option>
						<?php } ?>
				</select> -->
            </div>
            <!-- <div class="col-md-4">
										<label for="category" class="control-label">Categor&iacute;a</label>
                    <select class="form-control" name="category">
                    	<option value="">Selecciona una categoría</option>
                      <?php  foreach ($all_categories as $cat): ?>
                        <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
                        <?php echo remove_junk($cat['name']); ?></option>
                      <?php endforeach; ?>
                 		</select>
            </div>
             -->
            <div class="form-group">
				<label>Subdireccion:</label>
			        <select class="form-control" name="subdireccion" required>
			            <option value="<?php echo $e_user['id']?>"><?php echo $e_user['IdSubdireccion']?></option>
			            <?php 
			            $result=$db->query('SELECT * FROM subdireccion')or die(mysqli_error());
			            while($f=mysqli_fetch_array($result)) {?>
			            <option value="<?php echo$f['id']?>"><?php echo $f['Subdireccion']?></option>
			            <?php }?>
            		</select>
			</div>
            <div class="form-group">
				<label>Hijo:</label>
			        <select class="form-control" name="hijo" required>
			            <option value="<?php echo $e_user['id']?>"><?php echo $e_user['IdHijo']?></option>
			            <?php 
			            $result=$db->query('SELECT * FROM hijo')or die(mysqli_error());
			            while($f=mysqli_fetch_array($result)) {?>
			            <option value="<?php echo$f['id']?>"><?php echo $f['Hijo']?></option>
			            <?php }?>
            		</select>
			</div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                    <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
            </div>
        </form>
       </div>
     </div>
  </div>
  <!-- Change password form -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Cambiar Password para: '<?php echo remove_junk(ucwords($e_user['name'])); ?>'
        </strong>
      </div>
      <div class="panel-body">
        <form action="edit_user.php?id=<?php echo (int)$e_user['id'];?>" method="post" class="clearfix">
          <div class="form-group">
                <label for="password" class="control-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Ingresa la nueva contraseña" required>
          </div>
          <div class="form-group clearfix">
                  <button type="submit" name="update-pass" class="btn btn-danger pull-right">Cambiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
