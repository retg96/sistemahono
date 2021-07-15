<?php 
	  $page_title = 'Pago detalles';
      require_once('includes/load.php');
	  include_once('layouts/header.php');
		/*session_start();
		$_SESSION['Clave'];

		if(isset($_SESSION['Clave'])){
		$clave=$_SESSION['Clave'];
		}*/
		$idconvenio = $_GET["id"];
		$idpersonal="";
// ?>

<!-- // <div class="contentTable">
// 			<div class="contentTab">
// 				<div>
// 					<h2>PAGO DETALLES</h2>
// 				</div> -->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Pago Detalles</span>
       </strong>
	   <a href="add_horario.php?id=<?php echo $idconvenio; ?>" class="btn btn-info pull-right">AGREGAR PERSONAL</a>
      </div>

				<?php 
					 if(isset($idpersonal)){
				?>
				<!-- <div class="espacio2"></div>
				<div> -->
				<div class="panel-body">
					<?php 
					  	$result=$db->query('SELECT * FROM convenio INNER JOIN personal ON convenio.IdPersonal = personal.id WHERE convenio.IdConvenio   = "'.$idconvenio.'"') or die (mysqli_error());
					  	
    					while($fi=mysqli_fetch_array($result)) {
						?>	<label for="search">CLAVE: </label>
							<input type="text" value="<?php echo $fi['NoSie']?>" readonly></input>
							<label for="search">Nombre: </label>
							<input type="text" value="<?php echo $fi['NombreCompleto'] ?>" readonly></input>
							
						<?php } ?>

					<!-- <button onclick="location.href='add_horario.php?id=<?php echo $idconvenio; ?>'" type="submit" class="btnsE pull-right" name="Añadir">AGREGAR MATERIA</button> -->


      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
					  <tr>
					  	<th>Editar/Borrar</th>
					    <th>Clave materia</th>				    
					    <th>Nombre materia</th>
					    <th>Dias</th>
					    <th>Carrera a la que imparte</th>
					    <th>No. horas</th>
					    <th>Modalidad/Pago</th>
					    <th>Hrs.Semestre</th>
					    <th>SubTotal</th>
					    <th>ISR</th>
					    <th>Total</th>
					  </tr>
					  </thead>
        <tbody class="boddy">
					  <tr>
					  	<?php 

					  	$InicioContrato="";
					    $FinContrato= "";
					    $IRangoNoPago="";
					    $FRangoNoPago= "";


					  	$result=$db->query('SELECT personal.id,personal.NoSie,horariodocentemateria.IdHorarioDocenteMateria ,horariodocentemateria.LunesHoraI,horariodocentemateria.MartesHoraI,horariodocentemateria.MiercolesHoraI,horariodocentemateria.JuevesHoraI,horariodocentemateria.ViernesHoraI,horariodocentemateria.SabadoHoraI,horariodocentemateria.DomingoHoraI,horariodocentemateria.LunesHoraF,horariodocentemateria.MartesHoraF,horariodocentemateria.MiercolesHoraF,horariodocentemateria.JuevesHoraF,horariodocentemateria.ViernesHoraF,horariodocentemateria.SabadoHoraF,horariodocentemateria.DomingoHoraF, materia.id,materia.AreaAbreviada,materia.Materia,materia.Semestre,materia.ClaveMateria,materia.NombreCorto,materia.HorasTeoricas,materia.HorasPracticas, carrera.Carrera, modalidad.Modalidad,modalidad.Pago,convenio.IdConvenio FROM horariodocentemateria INNER JOIN materia ON materia.id=horariodocentemateria.IdMateria INNER JOIN modalidad ON modalidad.id=horariodocentemateria.IdModalidad INNER JOIN carrera ON carrera.id=materia.IdCarrera INNER JOIN convenio ON convenio.IdConvenio  = horariodocentemateria.IdConvenio INNER JOIN personal ON personal.id =convenio.IdPersonal WHERE horariodocentemateria.IdConvenio = "'.$idconvenio.'" ORDER BY (materia.ClaveMateria)') or die (mysqli_error());


					  	$PagoTotal=0;
                        $PagoIVATotal=0;
                        $Subtotal=0;

						$diasTrabajoLetras=array();

    					while($f=mysqli_fetch_array($result)) {



    					//OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
    					$querytiempo = "SELECT * FROM convenio WHERE IdConvenio =".$idconvenio;

					    $resultadotiempo = $db->query($querytiempo);
					    //Variables de contadores de dias de la semana dentro del convenio
						$dL=0;
					    $dM=0;
					    $dMi=0;
					    $dJ=0;
					    $dV=0;
					    $dS=0;
					    $dD=0;
					    $vf=array();
					    $cont=0;

					    while($t= mysqli_fetch_array($resultadotiempo)){
					        $InicioContrato=$t['InicioContrato'];
					    	$FinContrato= $t['FinContrato'];
					    	//echo "Contrato:",$InicioContrato," ************** ", $FinContrato, "<br>";
					            $d="";

					            $f3 = date("d-m-Y", strtotime($t['InicioContrato'])); 
					            $d=date("w",strtotime($f3));

					           // echo "Dias: <br>";
					           //echo $f3,"-",$d,"<br>";
					            while( strtotime($f3) <= strtotime($t['FinContrato'])) { 
							    	$d=date("w",strtotime($f3));

							       		if($d==1){$dL++;}
							            if($d==2){$dM++;}
							            if($d==3){$dMi++;}
							            if($d==4){$dJ++;}
							            if($d==5){$dV++;}
							            if($d==6){$dS++;}
							            if($d==0){$dD++;}

							            //echo $f3,"-",$d,"<br>";
							            $f3 = date("d-m-Y", strtotime($f3 . " + 1 day"));
							 	}
					        }
					        /*echo"<br>Dias que dura su convenio <br>";
					      	echo "Lunes: ",$dL;
					        echo "Martes: ",$dM;
					        echo "Miercoles: ",$dMi;
					        echo "Jueves: ",$dJ;
					        echo "Viernes: ",$dV;
					        echo "Sabado: ",$dS;
					        echo "Domingo: ",$dD;*/

    					//Dias de la semana que trabaja el usuario
    					$l=0;$m=0;$mi=0;$j=0;$v=0;$s=0;$d=0;
    					//Horas por dia de trabajo del usuario
    					$horasl=0;$horasm=0;$horasmi=0;$horasj=0;$horasv=0;$horass=0;$horasd=0;

						if($f['LunesHoraI']!="00:00:00"){
							$h1= new DateTime($f['LunesHoraI']);
							$h2= new DateTime($f['LunesHoraF']);
							$horasD = $h1->diff($h2); 
							$horasl = $horasD->format('%H');
							$l++;
							array_push($diasTrabajoLetras, "L ");
						}
						if($f['MartesHoraI']!="00:00:00"){
							$h1= new DateTime($f['MartesHoraI']);
							$h2= new DateTime($f['MartesHoraF']);
							$horasD = $h1->diff($h2); 
							$horasm = $horasD->format('%H');
							$m++;
							array_push($diasTrabajoLetras, "M ");
						}
						if($f['MiercolesHoraI']!="00:00:00"){
							$h1= new DateTime($f['MiercolesHoraI']);
							$h2= new DateTime($f['MiercolesHoraF']);
							$horasD = $h1->diff($h2); 
							$horasmi = $horasD->format('%H');
							$mi++;
							array_push($diasTrabajoLetras, "Mi ");
						}
						if($f['JuevesHoraI']!="00:00:00"){
							$h1= new DateTime($f['JuevesHoraI']);
							$h2= new DateTime($f['JuevesHoraF']);
							$horasD = $h1->diff($h2); 
							$horasj = $horasD->format('%H');
							$j++;
							array_push($diasTrabajoLetras, "J ");
						}
						if($f['ViernesHoraI']!="00:00:00"){
							$h1= new DateTime($f['ViernesHoraI']);
							$h2= new DateTime($f['ViernesHoraF']);
							$horasD = $h1->diff($h2); 
							$horasv = $horasD->format('%H');
							$v++;
							array_push($diasTrabajoLetras, "V ");
						}
						if($f['SabadoHoraI']!="00:00:00"){
							$h1= new DateTime($f['SabadoHoraI']);
							$h2= new DateTime($f['SabadoHoraF']);
							$horasD = $h1->diff($h2); 
							$horass = $horasD->format('%H');
							$s++;
							array_push($diasTrabajoLetras, "S ");
						}
						if($f['DomingoHoraI']!="00:00:00"){
							$h1= new DateTime($f['DomingoHoraI']);
							$h2= new DateTime($f['DomingoHoraF']);
							$horasD = $h1->diff($h2); 
							$horasd = $horasD->format('%H');
							$d++;
							array_push($diasTrabajoLetras, "D ");
						}

						/*echo "<br><br>Dias de la semana que trabaja: <br>";

							echo " Lunes:",$l;
					        echo " Martes:",$m;
					        echo " Miercoles:",$mi;
					        echo " Jueves:",$j;
					        echo " Viernes:",$v;
					        echo " Sabado:",$s;
					        echo " Domingo:",$d;
					    echo "<br><br>Horas que trabaja por dia: <br>";

							echo " Lunes:",$horasl;
					        echo " Martes:",$horasm;
					        echo " Miercoles:",$horasmi;
					        echo " Jueves:",$horasj;
					        echo " Viernes:",$horasv;
					        echo " Sabado:",$horass;
					        echo " Domingo:",$horasd;*/


    					//Dias sin pago que esten dentro del contrato del usuario
    					$dianopagol=0;$dianopagom=0;$dianopagomi=0;$dianopagoj=0;$dianopagov=0;$dianopagos=0;$dianopagod=0;

					    $querytiempo3 = "SELECT * FROM rangonopago";
					   	$resultadotiempo3 = $db->query($querytiempo3);
					    
    					while($t3= mysqli_fetch_array($resultadotiempo3)){
    							$fechaFC = date("d-m-Y",strtotime($FinContrato));
    							$fechaInicioSinPago=date("d-m-Y", strtotime($t3['FechaInicio']));

									while(strtotime($fechaInicioSinPago) <= strtotime($t3['FechaFin'])) { 
										
							            if(strtotime($fechaInicioSinPago) >=strtotime($InicioContrato) ) {
							         
							            	if(strtotime($fechaInicioSinPago) <= strtotime($FinContrato)) { 
									        	$d3=date("w",strtotime($fechaInicioSinPago));
										       	if($d3==1 && $f['LunesHoraI']!= "00:00:00"){$dL--;}
												if($d3==2 && $f['MartesHoraI']!= "00:00:00"){$dM--;}
												if($d3==3 && $f['MiercolesHoraI']!= "00:00:00"){$dMi--;}
												if($d3==4 && $f['JuevesHoraI']!= "00:00:00"){$dJ--;}
												if($d3==5 && $f['ViernesHoraI']!= "00:00:00"){$dV--;}
												if($d3==6 && $f['SabadoHoraI']!= "00:00:00"){$dS--;}
												if($d3==0 && $f['DomingoHoraI']!= "00:00:00"){$dD--;}
								        }} 
								        $fechaInicioSinPago = date("d-m-Y", strtotime($fechaInicioSinPago . " + 1 day")); 
							 		} 
					    }

						/*echo "<br><br>Dias con pago dentro de su contrato sin fechas de vacaciones: <br>";
					     	echo " Lunes:",$dL;
					        echo " Martes:",$dM;
					        echo " Miercoles:",$dMi;
					        echo " Jueves:",$dJ;
					        echo " Viernes:",$dV;
					        echo " Sabado:",$dS;
					        echo " Domingo:",$dD;*/

						$querytiempo4 = "SELECT * FROM fechanopago";
					   	$resultadotiempo4 = $db->query($querytiempo4);
					    
					    
    					while($t4= mysqli_fetch_array($resultadotiempo4)){
    						$fecha = date("d-m-Y",strtotime($t4['Fecha']));

    						if(strtotime($fecha) <= strtotime($FinContrato) && strtotime($fecha) >= strtotime($InicioContrato)) {
    							$d4=date("w",strtotime($fecha));
    								if($d4==1 && $f['LunesHoraI']!="00:00:00"){$dL--;}
									if($d4==2 && $f['MartesHoraI']!="00:00:00"){$dM--;}
									if($d4==3 && $f['MiercolesHoraI']!="00:00:00"){$dMi--;}
									if($d4==4 && $f['JuevesHoraI']!="00:00:00"){$dJ--;}
									if($d4==5 && $f['ViernesHoraI']!="00:00:00"){$dV--;}
									if($d4==6 && $f['SabadoHoraI']!="00:00:00"){$dS--;}
									if($d4==0 && $f['DomingoHoraI']!="00:00:00"){$dD--;}
    							
    						}
						}

						/*echo "<br><br>Dias con pago dentro de su contrato ya sin las fechas de juntas: <br>";
					     	echo " Lunes:",$dL;
					        echo " Martes:",$dM;
					        echo " Miercoles:",$dMi;
					        echo " Jueves:",$dJ;
					        echo " Viernes:",$dV;
					        echo " Sabado:",$dS;
					        echo " Domingo:",$dD;*/



					   //CALCULO DE PAGO POR MATERIA
					   		$horasSemestrePorDia=0;
					   		$horasSemestre=0;
						    //Variables de Pago Por dia
							$lpago=0;$mpago=0;$mipago=0;$jpago=0;$vpago=0;$spago=0;$dpago=0;
							//Variables de horas totales por dia durante el contrato
							$horasTotall=0;$horasTotalm=0;$horasTotalmi=0;$horasTotalj=0;$horasTotalv=0;$horasTotals=0;$horasTotald=0;

						   if($l!=0){
						   	$horasSemestrePorDia+=$horasl;
						   	$horasTotall=$dL*$horasl;
						   	$lpago=$horasTotall*$f['Pago'];
						   	$horasSemestre+=$horasTotall;
						   }
						   if($m!=0){
						   	$horasSemestrePorDia+=$horasm;
						   	$horasTotalm=$dM*$horasm;
						   	$mpago=$horasTotalm*$f['Pago'];
						   	$horasSemestre+=$horasTotalm;
						   }
						   if($mi!=0){
						   	$horasSemestrePorDia+=$horasmi;
						   	$horasTotalmi=$dMi*$horasmi;
						   	$mipago=$horasTotalmi*$f['Pago'];
						   	$horasSemestre+=$horasTotalmi;
						   }
						   if($j!=0){
						   	$horasSemestrePorDia+=$horasj;
						   	$horasTotalj=$dJ*$horasj;
						   	$jpago=$horasTotalj*$f['Pago'];
						   	$horasSemestre+=$horasTotalj;
						   } 
						   if($v!=0){
						   	$horasSemestrePorDia+=$horasv;
						   	$horasTotalv=$dV*$horasv;
						   	$vpago=$horasTotalv*$f['Pago'];
						   	$horasSemestre+=$horasTotalv;
						   }
						   if($s!=0){
						   	$horasSemestrePorDia+=$horass;
						   	$horasTotals=$dS*$horass;
						   	$spago=$horasTotals*$f['Pago'];
						   	$horasSemestre+=$horasTotals;
						   }    
						   if($d!=0){
						   	$horasSemestrePorDia+=$horasd;
						   	$horasTotald=$dD*$horasd;
						   	$dpago=$horasTotald*$f['Pago'];
						   	$horasSemestre+=$horasTotald;
						   }
						   
						
						$SubtotalPorMateria=$lpago+$mpago+$mipago+$jpago+$vpago+$spago+$dpago;
                        $PagoIVATotalPorMateria=$SubtotalPorMateria*0.16;
                        $PagoTotalPorMateria=$SubtotalPorMateria+$PagoIVATotalPorMateria;
                           
    					?>
    					
						<td class="text-center">
           					<div class="btn-group">

							<a href="edit_horario.php?id=<?php echo (int)$f['IdHorarioDocenteMateria'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<!-- <a href="edit_personal.php?id=<?php echo (int)$a_personal['id'];?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
								<span class="glyphicon glyphicon-edit"></span>
							</a>-->

							<a href="" onclick="ConfirmBorrarHorario(<?=$f['IdHorarioDocenteMateria']?>,'<?=$f['IdConvenio']?>' )" class="btn btn-danger btn-xs btn-del" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
								<span class="glyphicon glyphicon-trash"></span>
							</a> 
							<!-- <a href="horario_detalles.php?id=<?php echo (int)$convenio['IdConvenio'];?>" class="btn btn-success btn-xs" style="margin: 2px !important;" title="Horario" data-toggle="tooltip">VER HORARIO</a> -->				
						</div>
						</td>
					    <!-- <button type="submit" class="btnsEdition icon-pencil" name="Editar" onclick="location.href='edit_horario.php?id=<?php echo $f['id']?>'"></button> -->
					    <!-- <button type="submit" class="btnsDelite icon-cross" name="Eliminar" id="alertaHorario" onclick="ConfirmBorrarHorario(<?=$f['IdHorarioDocenteMateria']?>,'<?=$f['IdConvenio']?>' )"></button></div> -->
					    </td>
					    <td><?php echo $f['ClaveMateria'];?></td>			    
					    <td><?php echo $f['Materia'];?></td>
					    <td><?php echo implode(",",$diasTrabajoLetras)?></td>
					    <td><?php echo $f['Carrera'];?></td>
					    <td><?php echo $horasSemestrePorDia;?></td>
					    <td><?php echo $f['Modalidad']," / $",$f['Pago'];?></td>
					    <td><?php echo $horasSemestre;?></td>
					    <td><?php echo "$",$SubtotalPorMateria;?></td>
					    <td><?php echo "$",$PagoIVATotalPorMateria;?></td>
					    <td><?php echo "$",$PagoTotalPorMateria;?></td>
					  </tr>
					  
                      
					  <?php
					  	$diasTrabajoLetras=array();
					  	$Subtotal+=$SubtotalPorMateria;
                        $PagoIVATotal+=$PagoIVATotalPorMateria;
                        $PagoTotal+=$PagoTotalPorMateria;

                        $SubtotalPorMateria=0;
                        $PagoIVATotalPorMateria=0;
                        $PagoTotalPorMateria=0;


					  	
  						}
  						
  					
  					}

 					?>
 					</tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL SEMESTRAL</th>
                        <td><?php echo "$",$Subtotal?></td>
                        <td><?php echo "$",$PagoIVATotal?></td>
                        <td><?php echo "$",$PagoTotal?></td>
                      </tr>
				</tdbody>
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
                      title: 'Eliminar Horario?',
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
				
				<input type="button" class="btn btn-danger" value="VOLVER" onclick="location.href='pagos.php'">

				</div>
				<!-- <br><button class="btns pull-left" onclick="location.href='pagos.php'">VOLVER</button><br><br><br> -->
			</div>
		</div>
	</div>
</div>