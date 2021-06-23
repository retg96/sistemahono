<?php
  $page_title = 'Agregar Convenio';
  require_once('includes/load.php');
  $id = $_GET['id'];
?>
<?php include_once('layouts/header.php'); ?>
<!-- <script type="text/javascript" src="libs/js/form.js"></script> -->


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
            <span>Agregar Convenio</span>
         </strong>
        </div>

        <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
         <form id="register_form" method="post" action="añadir_convenio.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

                  <!-- <fieldset>
                    <h2>Paso 1: Datos Personales</h2> -->
                        <div class="form-group">
                            <!-- <label>Fecha de Inicio</label>	 -->
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id?>" >
                        </div>

                        <div class="form-group">
                            <label>Fecha de Inicio</label>	
                            <input type="date"  class="form-control" name="FechaInicio" required>
                        </div>

                        <div class="form-group">
                            <label>Fecha Fin</label>	
							            <input type="date" class="form-control" name="FechaFin" required>
                        </div>

                          
                      <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" /> -->
                      <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                      <button type="submit" name="submit" class="btn btn-primary">Agregar Convenio</button> 
                
                        <!-- <input type="button" name="previous" class="previous-form btn btn-default" value="Regresar" />
                        <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />  -->
                    <!-- </fieldset> -->


                    </div>
                    </div>
                </div>
                <!-- <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
              <button type="submit" name="submit" class="btn btn-primary">Agregar proveedor</button> -->
              
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

  

<?php include_once('layouts/footer.php'); ?>