<?php 
phpinfo() 

/*include ('../conexion.php');

$idconvenio = 12;
$dom=array();
$domicilio="";
$num=array();
$numDomicilio;

$calle="vistas";
$numero=1;

    array_push($num,"#",$numero);
    $numeroDomicilio = implode(" ",$num);
    
    array_push($dom,$calle);
    array_push($dom,$numeroDomicilio);

    $domicilio = implode(",",$dom);

    

$InicioContrato="";
                        $FinContrato= "";
                        $IRangoNoPago="";
                        $FRangoNoPago= "";


                        $result=mysqli_query($conexion,'SELECT personal.IdPersonal,personal.NoSie,horariodocentemateria.IdHorarioDocenteMateria,horariodocentemateria.LunesHoraI,horariodocentemateria.MartesHoraI,horariodocentemateria.MiercolesHoraI,horariodocentemateria.JuevesHoraI,horariodocentemateria.ViernesHoraI,horariodocentemateria.SabadoHoraI,horariodocentemateria.DomingoHoraI,horariodocentemateria.LunesHoraF,horariodocentemateria.MartesHoraF,horariodocentemateria.MiercolesHoraF,horariodocentemateria.JuevesHoraF,horariodocentemateria.ViernesHoraF,horariodocentemateria.SabadoHoraF,horariodocentemateria.DomingoHoraF, materia.IdMateria,materia.AreaAbreviada,materia.Materia,materia.Semestre,materia.ClaveMateria,materia.NombreCorto,materia.HorasTeoricas,materia.HorasPracticas, carrera.Carrera, modalidad.Modalidad,modalidad.Pago,convenio.IdConvenio FROM horariodocentemateria INNER JOIN materia ON materia.IdMateria=horariodocentemateria.IdMateria INNER JOIN modalidad ON modalidad.IdModalidad=horariodocentemateria.IdModalidad INNER JOIN carrera ON carrera.IdCarrera=materia.IdCarrera INNER JOIN convenio ON convenio.IdConvenio = horariodocentemateria.IdConvenio INNER JOIN personal ON personal.IdPersonal =convenio.IdPersonal WHERE horariodocentemateria.IdConvenio = '.$idconvenio.' ORDER BY (materia.ClaveMateria)') or die (mysqli_error());


                        $PagoTotal=0;
                        $PagoIVATotal=0;
                        $Subtotal=0;

                        $diasTrabajoLetras=array();

                        while($f=mysqli_fetch_array($result)) {



                        //OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
                        $querytiempo = "SELECT * FROM convenio WHERE IdConvenio =".$idconvenio;

                        $resultadotiempo = $conexion->query($querytiempo);
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
/*                        $l=0;$m=0;$mi=0;$j=0;$v=0;$s=0;$d=0;
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
  /*                       $dianopagol=0;$dianopagom=0;$dianopagomi=0;$dianopagoj=0;$dianopagov=0;$dianopagos=0;$dianopagod=0;

                        $querytiempo3 = "SELECT * FROM rangonopago";
                        $resultadotiempo3 = $conexion->query($querytiempo3);
                        
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

  /*                       $querytiempo4 = "SELECT * FROM fechanopago";
                        $resultadotiempo4 = $conexion->query($querytiempo4);
                        
                        
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
 /*                           $horasSemestrePorDia=0;
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


                        
                        }
                        echo $Subtotal;






*/



















/*$id = 2;
$InicioContrato="";$FinContrato= "";$fPP=0;$fIVA=0;$final=0; $dL=0;$dM=0;$dMi=0;$dJ=0;$dV=0;$dS=0;$dD=0;$vf=array();$cont=0; $PagoTotal=0;$HorasTotal=0;$Horas=0;$NumH=0;$horasSemanales=0;$HorasTotalSinPago=0;           

                        $querytiempo = "SELECT * FROM convenioope WHERE IdConvenioOpe =".$id;

                        $resultadotiempo = $conexion->query($querytiempo);

                        

                            while($t= mysqli_fetch_array($resultadotiempo)){
                               
                                $InicioContrato=$t['FechaInicio'];
                                $FinContrato= $t['FechaFin'];
                                $d="";

                                $f3 = date("d-m-Y", strtotime($t['FechaInicio'])); 
                                $d=date("w",strtotime($f3));

                                //echo $d," ",$f3,"<br>";
                                if($d==1){$dL++;}
                                if($d==2){$dM++;}
                                if($d==3){$dMi++;}
                                if($d==4){$dJ++;}
                                if($d==5){$dV++;}
                                if($d==6){$dS++;}
                                if($d==0){$dD++;}
                                while(strtotime($t['FechaFin']) >= strtotime($t['FechaInicio'])) { 
                                    if(strtotime($t['FechaFin']) != strtotime($f3)) { 
                                        
                                        $f3 = date("d-m-Y", strtotime($f3 . " + 1 day")); 
                                        $d=date("w",strtotime($f3));
                                        //echo $d," ",$f3,"<br>";
                                        if($d==1){$dL++;}
                                        if($d==2){$dM++;}
                                        if($d==3){$dMi++;}
                                        if($d==4){$dJ++;}
                                        if($d==5){$dV++;}
                                        if($d==6){$dS++;}
                                        if($d==0){$dD++;}
                                    } else 
                                    {  
                                        break; 
                                    } 
                                }
                            }


                        
                        

                        $result=mysqli_query($conexion,'SELECT personaloperativo.IdPersonalOperativo,personaloperativo.ClaveSie,personaloperativo.IdPuesto,horariooperativo.IdHorarioOperativo,horariooperativo.HoraInicio,horariooperativo.HoraFin,horariooperativo.Lunes,horariooperativo.Martes,horariooperativo.Miercoles,horariooperativo.Jueves,horariooperativo.Jueves,horariooperativo.Viernes,horariooperativo.Sabado,horariooperativo.Domingo,convenioope.IdConvenioOpe, puesto.Puesto,puesto.Pago FROM horariooperativo INNER JOIN convenioope ON convenioope.IdConvenioOpe = horariooperativo.IdConvenioOpe INNER JOIN personaloperativo ON personaloperativo.IdPersonalOperativo =convenioope.IdPersonalOperativo INNER JOIN puesto ON puesto.IdPuesto = personaloperativo.IdPuesto WHERE horariooperativo.IdConvenioOpe =  '.$id.' ORDER BY (horariooperativo.HoraInicio)') or die (mysqli_error());

                        while($f=mysqli_fetch_array($result)) {
                        $l="";$m="";$mi="";$j="";$v="";$s="";$d="";$dias=0;

                        if($f['Lunes']=="Si"){$dias++;$Horas=$Horas+$dL;$l="L";}
                        if($f['Martes']=="Si"){$dias++;$Horas=$Horas+$dM;$m=" M ";}
                        if($f['Miercoles']=="Si"){$dias++;$Horas=$Horas+$dMi;$mi=" MI ";}
                        if($f['Jueves']=="Si"){$dias++;$Horas=$Horas+$dJ;$j=" J ";}
                        if($f['Viernes']=="Si"){$dias++;$Horas=$Horas+$dV;$v=" V ";}
                        if($f['Sabado']=="Si"){$dias++;$Horas=$Horas+$dS;$s=" S ";}
                        if($f['Domingo']=="Si"){$dias++;$Horas=$Horas+$dD;$s=" D ";}


                        $h1= new DateTime($f['HoraInicio']);
                        $h2= new DateTime($f['HoraFin']);
                        $horasdiarias=0;

                        if($h1>$h2){
                            $ht1 = new DateTime('24:00:00');
                            $htf1 = $h1->diff($ht1);
                            $htfi1= $htf1->format('%H'); 
                            $ht2 = new DateTime('00:00:00');
                            $htf2 = $ht2->diff($h2);
                            $htfi2= $htf2->format('%H');
                            $horasdiarias = ($htfi1+1)+$htfi2;
                            $horasSemanales=$dias * $horasdiarias;
                        }else{
                            $horasD = $h1->diff($h2); 
                            $horasdiarias = $horasD->format('%H');
                            $horasSemanales=$dias * $horasdiarias;
                        }
                         



                        $querytiempo3 = "SELECT * FROM rangonopago";
                        $resultadotiempo3 = $conexion->query($querytiempo3);
                        
                        while($t3= mysqli_fetch_array($resultadotiempo3)){

                                $fech = date("d-m-Y",strtotime($FinContrato));

                                $d3="";
                                $vfc=date("d-m-Y", strtotime($t3['FechaInicio']));

                                $fe4 = date("d-m-Y", strtotime($t3['FechaInicio'])); 
                                $d3=date("w",strtotime($fe4));
                                 
                                    while(strtotime($vfc) <= strtotime($t3['FechaFin'])) { 
                                        if(strtotime($fe4) >=strtotime($InicioContrato) ) {
                                            if(strtotime($fe4) <= strtotime($FinContrato)) {
                                            //echo "SI"; 
                                            $d3=date("w",strtotime($fe4));
                                            if($d3==1 && $f['Lunes']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==2 && $f['Martes']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==3 && $f['Miercoles']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==4 && $f['Jueves']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==5 && $f['Viernes']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==6 && $f['Sabado']=="Si"){$HorasTotalSinPago++;}
                                            if($d3==0 && $f['Domingo']=="Si"){$HorasTotalSinPago++;}
                                        }} 
                                        $fe4 = date("d-m-Y", strtotime($fe4 . " + 1 day")); 
                                        $vfc = date("d-m-Y", strtotime($vfc . " + 1 day"));
                                    }
                                    
                        }



                        $querytiempo4 = "SELECT * FROM fechanopago";
                        $resultadotiempo4 = $conexion->query($querytiempo4);
                        
                        
                        while($t4= mysqli_fetch_array($resultadotiempo4)){
                            $fecha = date("d-m-Y",strtotime($t4['Fecha']));
                            $querytiempo5 = "SELECT * FROM rangonopago";
                            $resultadotiempo5 = $conexion->query($querytiempo5);
                            $b="";$dentro="";
                            while($t5= mysqli_fetch_array($resultadotiempo5)){
                                
                                $fi=date("d-m-Y",strtotime($t5['FechaInicio']));
                                $ff=date("d-m-Y",strtotime($t5['FechaFin']));
                                $conta=0;
                                    
                                if(strtotime($fecha) <= strtotime($FinContrato) && strtotime($fecha) >= strtotime($InicioContrato)) {

                                    while(strtotime($fi) <= strtotime($ff)) { 
                                        
                                        if(strtotime($fecha) == strtotime($fi)) {
                                            $b="v";
                                            break;
                                        } else{
                                            $dentro="v";
                                        }
                                        $fi = date("d-m-Y", strtotime($fi . " + 1 day")); 
                                    }   
                                } 
                                
                            }
                            if($b!="v"&&$dentro=="v"){
                                array_push($vf,$fecha);
                            }
                            $b="";$dentro="";
                            $cont++;
                        }

                        $cont = 1;
                        $contad=0;
                        while($contad<sizeof($vf)){
                            $dvfsp = date("w",strtotime($vf[$contad]));
                            if($dvfsp==1 && $f['Lunes']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==2 && $f['Martes']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==3 && $f['Miercoles']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==4 && $f['Jueves']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==5 && $f['Viernes']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==6 && $f['Sabado']=="Si"){$HorasTotalSinPago++;}
                            if($dvfsp==0 && $f['Domingo']=="Si"){$HorasTotalSinPago++;}
                            
                        $contad++;
                        }
                        $vf=array();
                        $HorasTotal=$horasdiarias*($Horas-$HorasTotalSinPago);
                        $pClaseS=$f['Pago']*$HorasTotal;
                        $PagoTotal+=$pClaseS;

                        $pIVA=$PagoTotal*0.16;
                        $total=$PagoTotal+$pIVA;
                        $Horas=0;
                        $HorasTotal=0;
                        $HorasTotalSinPago=0;  
                        }
                        $fPP+=$PagoTotal;
                        $fIVA+=$pIVA;
                        $final+=$total;
                        $PagoTotal=0;
                    echo "<br>PAGO TOTAL fPP:",$fPP;
                     
                       
                                                  
*/

?>