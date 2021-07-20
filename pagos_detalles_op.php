<?php
  require_once('includes/load.php');
  include_once('layouts/header.php');
  /*session_start();
		$_SESSION['Clave'];

		if(isset($_SESSION['Clave'])){
		$clave=$_SESSION['Clave'];
		}*/
		$idconvenio = $_GET["id"];
		$idpersonal="";
	?>

<body>

		<!-- <div class="contentTable">
			<div class="contentTab">
				<div>
					<h2>PAGO DETALLES</h2>
				</div> -->
				<?php
					 if(isset($idpersonal)){
				?>
				<!-- <div class="espacio2"></div>
				<div> -->
                <div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Pago Detalles</span>
       </strong>
       <button onclick="location.href='horario_operativo_añadir.php?id=<?php echo $idconvenio; ?>'" type="submit" class="btn btn-info pull-right" name="Añadir">AGREGAR HORARIO</button>
        </div>
        <div class="panel-body">
					<?php
						$InicioContrato="";
					    $FinContrato= "";
					  	$result=$db->query('SELECT * FROM convenioope INNER JOIN personaloperativo ON convenioope.IdPersonalOperativo = personaloperativo.id WHERE convenioope.IdConvenioOpe  ='.$idconvenio.'') or die (mysqli_error());

    					while($fi=mysqli_fetch_array($result)) {
						?>	<label for="search">CLAVE: </label>
							<input type="text" value="<?php echo $fi['ClaveSie']?>" readonly></input>
							<label for="search">Nombre: </label>
							<input type="text" value="<?php echo $fi['NombreCompleto'] ?>" readonly></input>

						<?php } ?>

				<!-- </div>
				<div class="espacio2"></div>
				<div> -->

      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
					  <tr>
					  	<th>Editar/Borrar</th>
					  	<th>Lunes</th>
					  	<th>Martes</th>
					  	<th>Miercoles</th>
					  	<th>Jueves</th>
					  	<th>Viernes</th>
					  	<th>Sabado</th>
					  	<th>Domingo</th>
					    <th>Puesto/Pago</th>
					    <th>Hrs.Semana</th>
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
                        $fPP=0;
					    $fIVA=0;
					    $final=0;


                        $result=$db->query('SELECT personaloperativo.id,personaloperativo.ClaveSie, horariooperativo.IdHorarioOperativo,horariooperativo.LunesHoraI,horariooperativo.MartesHoraI,horariooperativo.MiercolesHoraI,horariooperativo.JuevesHoraI,horariooperativo.ViernesHoraI,horariooperativo.SabadoHoraI,horariooperativo.DomingoHoraI,horariooperativo.LunesHoraF,horariooperativo.MartesHoraF,horariooperativo.MiercolesHoraF,horariooperativo.JuevesHoraF,horariooperativo.ViernesHoraF,horariooperativo.SabadoHoraF,horariooperativo.DomingoHoraF, puesto.Puesto,puesto.Pago,convenioope.IdConvenioOpe FROM horariooperativo INNER JOIN convenioope ON convenioope.IdConvenioOpe = horariooperativo.IdConvenioOpe INNER JOIN personaloperativo ON personaloperativo.id =convenioope.IdPersonalOperativo INNER JOIN puesto ON puesto.id = personaloperativo.IdPuesto WHERE horariooperativo.IdConvenioOpe = '.$idconvenio.' ORDER BY (personaloperativo.id)') or die (mysqli_error());


                        $PagoTotal=0;
                        $PagoIVATotal=0;
                        $Subtotal=0;

                        $diasTrabajoLetras=array();

                        while($f=mysqli_fetch_array($result)) {



                        //OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
                        $querytiempo = "SELECT * FROM convenioope WHERE IdConvenioOpe =".$idconvenio;

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
                            $InicioContrato=$t['FechaInicio'];
                            $FinContrato= $t['FechaFin'];
                            //echo "Contrato:",$InicioContrato," ************** ", $FinContrato, "<br>";
                                $d="";

                                $f3 = date("d-m-Y", strtotime($t['FechaInicio']));
                                $d=date("w",strtotime($f3));

                               //echo "Dias: <br>";
                               //echo $f3,"-",$d,"<br>";
                                while( strtotime($f3) <= strtotime($t['FechaFin'])) {
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
                         /*   echo"<br>Dias que dura su convenio <br>";
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

                       /* echo "<br><br>Dias de la semana que trabaja: <br>";

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

                       /* echo "<br><br>Dias con pago dentro de su contrato sin fechas de vacaciones: <br>";
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

                        $diasTrabajoLetras=array();
                        $Subtotal+=$SubtotalPorMateria;
                        $PagoIVATotal+=$PagoIVATotalPorMateria;
                        $PagoTotal+=$PagoTotalPorMateria;

                        $SubtotalPorMateria=0;
                        $PagoIVATotalPorMateria=0;
                        $PagoTotalPorMateria=0;



                            $fPP+=$Subtotal;
                            $fIVA+=$PagoIVATotal;
                            $final+=$PagoTotal;
    						?>

    					<td class="text-center">
                        <div class="btn-group">
                            <a href="edit_horario_ope.php?id=<?php echo $f['IdHorarioOperativo']?>" class="btn btn-warning btn-xs" style="margin: 2px !important;" title="Editar" data-toggle="tooltip">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="" onclick="ConfirmBorrarHorarioOperativo(<?=$f['IdHorarioOperativo']?>,'<?=$f['IdConvenioOpe']?>' )" class="btn btn-danger btn-xs" style="margin: 2px !important;" title="Eliminar" data-toggle="tooltip">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
					    <!-- <button type="submit" class="btnsEdition icon-pencil" name="Editar" onclick="location.href='edit_horario_ope.php?id=<?php echo $f['IdHorarioOperativo']?>'"></button>-->
					    <!-- <button type="submit" class="btnsDelite icon-cross" name="Eliminar" id="alertaHorario" onclick="ConfirmBorrarHorarioOperativo(<?=$f['IdHorarioOperativo']?>,'<?=$f['IdConvenioOpe']?>' )"></button> -->
					    </div>
                        </td>
					    <td><?php echo $f['LunesHoraI']," - ",$f['LunesHoraF'];?></td>
					    <td><?php echo $f['MartesHoraI']," - ",$f['MartesHoraF'];?></td>
					    <td><?php echo $f['MiercolesHoraI']," - ",$f['MiercolesHoraF'];?></td>
					    <td><?php echo $f['JuevesHoraI']," - ",$f['JuevesHoraF'];?></td>
					    <td><?php echo $f['ViernesHoraI']," - ",$f['ViernesHoraF'];?></td>
					    <td><?php echo $f['SabadoHoraI']," - ",$f['SabadoHoraF'];?></td>
					    <td><?php echo $f['DomingoHoraI']," - ",$f['DomingoHoraF'];?></td>
					    <td><?php echo $f['Puesto']," / $",$f['Pago'];?></td>
					    <td><?php echo $horasSemestrePorDia;?></td>
					    <td><?php echo $horasSemestre;?></td>
					    <td><?php echo "$",$Subtotal;?></td>
					    <td><?php echo "$",$PagoIVATotal;?></td>
					    <td><?php echo "$",$PagoTotal;?></td>

					  </tr>


					  <?php

                        $Horas=0;
					  	$HorasTotal=0;
					  	$HorasTotalSinPago=0;
					  	$PagoTotal=0;
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL SEMESTRAL</th>
                        <td><?php echo "$",$fPP?></td>
                        <td><?php echo "$",$fIVA?></td>
                        <td><?php echo "$",$final?></td>
                      </tr>
					</table>
                </tbody>

                <script>
                    function ConfirmBorrarHorarioOperativo(horario,idconvenio) {
          
          if (confirm("¿Estas seguro de eliminar el registro del horario seleccionado? ")){
          
             window.location.assign("delete_horario_ope.php" + "?horario=" + horario + "&idconvenio=" + idconvenio)
       
          }else{
       
              alert("Operacion cancelada");
       
          }
      }
                </script>
                	<button type="submit" class="btn btn-danger" onclick="location.href='pagos.php'">CANCELAR</button>
				</div>
				<!-- <button class="btns pull-left" onclick="location.href='pagos.php'">VOLVER</button> -->
			</div>
		</div>
	</div>
</div>