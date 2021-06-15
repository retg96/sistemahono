<?php
  $page_title = 'Agregar Carrera';
  require_once('includes/load.php');

//   $nacionalidades = nacionalidades();
//   $estudios = estudios();
//   $puestos = puestos();
//   $regimenes = regimenes();
//   $tipo_personas = tip_persona();
//   $areas_academicas = areas_aca();
//   $dptos = departamentos();
//   $all_sni = sni();
//   $motivo_ausencia = ausencia();
//   $personales = personal();
// $all_pagos = pagos();
// $carreras = tipo_carrera();
// $depas = departamentos();
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
            <span>Agregar Carrera</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="añadir_nueva_carrera.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                        <div class="form-group">
                            <label>Clave:</label>	
                            <input type=""  class="form-control" name="clave" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre:</label>	
							            	<input type="" class="form-control" name="nombre" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Abreviatura:</label>
								            <input type="" class="form-control" name="abreviatura" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre corto:</label>	
								            <input type="" class="form-control" name="nombreCorto" required>
                        </div>
                        <div class="form-group">
                            <label>Estatus:</label>	
								              <select name="estatus" class="form-control">
									              <option value="Activo">Activo</option>
									              <option value="Inactivo">Inactivo</option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label>Numero de alumnos:</label>
								              <input type="" class="form-control" name="numAlumnos" required>
                        </div>
                        <div class="form-group">
                          <label>Departamento:</label><br>
								            <select class="form-control" name='departamento' required>
									            <?php 
                              $result=$db->query('SELECT * FROM departamento');
                                while($f=mysqli_fetch_array($result)) {
                              ?>
									            <option value="<?php echo $f['id'] ?>">
                              <?php echo $f['Departamento'] ?></option>
									            <?php } ?>
							          	</select>      
                        </div>
                        <div class="form-group">
                          <label>Tipo de carrera:</label><br>
								          <select name="tipoCarrera" class="form-control" required>
									          <?php
                              $result=$db->query('SELECT * FROM tipocarrera');
                              while($f=mysqli_fetch_array($result)) {
                            ?>
									          <option value="<?php echo $f['id'] ?>"><?php echo $f['TipoCarrera']?></option>
									          <?php } ?>
								          </select>     
                        </div>
                    </div>
                    </div>
                </div>
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href='carreras.php'">
              <button type="submit" class="btn btn-primary">Agregar</button>
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>