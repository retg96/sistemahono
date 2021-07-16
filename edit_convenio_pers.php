<?php
  $page_title = 'Editar Convenio';
  require_once('includes/load.php');
  include_once('layouts/header.php');
?>
<!-- <div class="contentTable"> -->
			<!-- <div class="contentTab"> -->
				<!-- <div>
					<h2>EDITAR CONVENIO OPERATIVO</h2>
				</div> -->
				<!-- <div class="espacio2"></div> -->
				<!-- <div> -->
                <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Convenio</span>
         </strong>
        </div>

				<?php 
					$idconvenio = $_GET['id'];
					$query = "SELECT personal.id,personal.NoSie,personal.NombreCompleto,personal.Calle,personal.RFC,regimen.Regimen,convenio.InicioContrato,convenio.FinContrato FROM personal INNER JOIN regimen ON personal.IdRegimen=regimen.id INNER JOIN convenio ON personal.id=convenio.IdPersonal WHERE convenio.IdConvenio=".$idconvenio." ";
					$resultado = $db->query($query);

					while($f=mysqli_fetch_array($resultado)) {
				?>
				
                <div class="panel-body">
         <div class="col-md-12">
         <div class="alert alert-success hide"></div>	
				<form method='post' action='editar_convenio_personal.php'>
                <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                   <div class='datos_personal-flex'>
                   		<div>
                            <div class="form-group">
                   			    <input class="form-control" type='hidden' name='id' value="<?php echo $idconvenio?>">
                            </div>

                            <div class="form-group">
                   			    <input class="form-control" type='hidden' name='idpersonaloperativo' value="<?php echo $f['id']?>">
                            </div>

                            <div class="form-group">
                                <label>Numero SIE:</label>
                                <input class="form-control" type='text' name='ClaveSie' value="<?php echo $f['NoSie']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Nombre:</label>
                                <input class="form-control" type='text' name='Nombre' value="<?php echo $f['NombreCompleto']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Domicilio:</label>
                                <input class="form-control" type='text' name='Domicilio' value="<?php echo $f['Calle']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>RFC:</label>
                                <input class="form-control" type='text' name='RFC' value="<?php echo $f['RFC']?>" readonly>
                            </div>
                   	
                            <div class="form-group">
                                <label>Regimen:</label>
                                <input class="form-control" type='text' name='Regimen' value="<?php echo $f['Regimen']?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Inicio de Contrato:</label>
                                <input class="form-control" type='date' name='FechaInicio'  value="<?php echo $f['InicioContrato']?>" required>
                            </div>

                            <div class="form-group">
                                <label>Fin de Contrato:</label>
                                <input class="form-control" type='date' name='FechaFin' value="<?php echo $f['FinContrato']?>" required>
                            </div>
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="history.go(-1);">
                            <button type='submit' class='btn btn-success'>EDITAR CONVENIO</button>
                        
                        
                </form>
                    <?php
					} 
					?>
					
				</div>
			<!-- </div> -->
		</div>
	</div>
<!-- </div> -->
