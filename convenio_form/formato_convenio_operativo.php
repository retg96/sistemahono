<?php
include ('../includes/load.php');
require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;



 
$id = $_GET["id"];
$templateWord="";



                       $InicioContrato="";
                        $FinContrato= "";
                        $IRangoNoPago="";
                        $FRangoNoPago= "";


                        $result=$db->query('SELECT personaloperativo.id,personaloperativo.ClaveSie, horariooperativo.IdHorarioOperativo,horariooperativo.LunesHoraI,horariooperativo.MartesHoraI,horariooperativo.MiercolesHoraI,horariooperativo.JuevesHoraI,horariooperativo.ViernesHoraI,horariooperativo.SabadoHoraI,horariooperativo.DomingoHoraI,horariooperativo.LunesHoraF,horariooperativo.MartesHoraF,horariooperativo.MiercolesHoraF,horariooperativo.JuevesHoraF,horariooperativo.ViernesHoraF,horariooperativo.SabadoHoraF,horariooperativo.DomingoHoraF, puesto.Puesto,puesto.Pago,convenioope.IdConvenioOpe FROM horariooperativo INNER JOIN convenioope ON convenioope.IdConvenioOpe = horariooperativo.IdConvenioOpe INNER JOIN personaloperativo ON personaloperativo.id =convenioope.IdPersonalOperativo INNER JOIN puesto ON puesto.id = personaloperativo.IdPuesto WHERE horariooperativo.IdConvenioOpe ="'.$id.'" ORDER BY (personaloperativo.id)') or die (mysqli_error());


                        $PagoTotal=0;
                        $PagoIVATotal=0;
                        $Subtotal=0;

                        $diasTrabajoLetras=array();

                        while($f=mysqli_fetch_array($result)) {



                        //OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
                        $querytiempo = "SELECT * FROM convenioope WHERE IdConvenioOpe =".$id;

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
                           /* echo"<br>Dias que dura su convenio <br>";
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

                        $diasTrabajoLetras=array();
                        $Subtotal+=$SubtotalPorMateria;
                        $PagoIVATotal+=$PagoIVATotalPorMateria;
                        $PagoTotal+=$PagoTotalPorMateria;

                        $SubtotalPorMateria=0;
                        $PagoIVATotalPorMateria=0;
                        $PagoTotalPorMateria=0;


                       }   
                       
                       $pagoDeConvenio = number_format($Subtotal, 2, '.', '');          

                        //echo "<br>PAGO TOTAL fPP:",$fPP;

                        //echo "PAGO PG:",$totalG;


$nombreCompleto = "";
$apePat = "";
$apeMat = "";
$domicilio = "";
$rfc = "";
$departamento = "";
$iddepartamento = "";
$subServiciosA = "";
$subAcademico = "";
$subPlaneacion = "";
$jefeDepartamento = "";
$jefeDepartamentoRH = "";
$jefeDepartamentoPPP = "";
$director = "";
$regimen = "";
$puesto = "";
$nivelestudio = "";

// include ('../includes/load.php');
$result=$db->query('SELECT personaloperativo.NombreCompleto,personaloperativo.Sexo,personaloperativo.Calle,personaloperativo.NoExterior,personaloperativo.NoInterior,personaloperativo.Fraccionamiento,personaloperativo.CP,personaloperativo.Ciudad,personaloperativo.Estado,personaloperativo.Fraccionamiento,personaloperativo.CP,personaloperativo.Ciudad,personaloperativo.RFC,personaloperativo.IdPuesto,puesto.Puesto,departamento.id,departamento.Departamento,departamento.Abreviatura,convenioope.IdConvenioOpe,convenioope.FechaFin,horariooperativo.IdHorarioOperativo,horariooperativo.LunesHoraI,horariooperativo.MartesHoraI,horariooperativo.MiercolesHoraI,horariooperativo.JuevesHoraI,horariooperativo.ViernesHoraI,horariooperativo.SabadoHoraI,horariooperativo.DomingoHoraI,horariooperativo.LunesHoraF,horariooperativo.MartesHoraF,horariooperativo.MiercolesHoraF,horariooperativo.JuevesHoraF,horariooperativo.ViernesHoraF,horariooperativo.SabadoHoraF,horariooperativo.DomingoHoraF,regimen.Regimen,nivelestudio.NivelEstudio FROM personaloperativo 
INNER JOIN convenioope on convenioope.IdPersonalOperativo = personaloperativo.id 
INNER JOIN horariooperativo ON horariooperativo.IdConvenioOpe =convenioope.IdConvenioOpe
INNER JOIN regimen ON regimen.id = personaloperativo.IdRegime 
INNER JOIN departamento ON departamento.id = personaloperativo.IdDepartamento 
INNER JOIN nivelestudio ON personaloperativo.IdNivelEstudio=nivelestudio.id
INNER JOIN puesto ON puesto.id=personaloperativo.IdPuesto
WHERE horariooperativo.IdConvenioOpe="'.$id.'"')or die(mysqli_error());

$dom=array();
$domicilio="";
$num=array();
$contDomicilio=0;
$values=[];
$asignatura=array();
$asignaturas="";
$SiglasDepartamento= ""; 
$ClaveConvenio = $id;

$diaSf1= 0; $mesSf1= 0; $mesLSf1=""; $anioSf1= 0;
$diaSf2= 0; $mesSf2= 0; $mesLSf2=""; $anioSf2= 0;

while($f=mysqli_fetch_array($result)) {
$SiglasDepartamento= $f['Abreviatura'];

    $puesto = $f['Puesto'];
    $regimen = $f['Regimen'];
    $nivelestudio = $f['NivelEstudio'];

if($contDomicilio==0){
    array_push($dom,$f['Calle']);
    if($f['NoInterior']!=""){
        array_push($num,"#",$f['NoInterior']," ");
        $numeroDomicilio = implode("",$num);
        array_push($dom,$numeroDomicilio);
        $num=array();    
    }

    if($f['NoExterior']!=""){
        array_push($num,"#",$f['NoExterior']);
        $numeroDomicilio = implode("",$num);
        array_push($dom,$numeroDomicilio);    
    }
    array_push($dom,$f['Fraccionamiento']);
    array_push($dom,$f['CP']);
    array_push($dom,$f['Ciudad']);
    array_push($dom,$f['Estado']);
 $contDomicilio++;   
}

$nombreCompleto = $f['NombreCompleto'];
// $apePat = $f['ApPat'];
// $apeMat = $f['ApMat'];
$puesto = $f['Puesto'];

$rfc = $f['RFC'];
$departamento = $f['Departamento'];
$iddepartamento = $f['id'];

    if($f['Sexo'] == "M"){
        $genero = "la";
    }else{
        $genero = "el";
    }

}

$result2=$db->query('SELECT * FROM formatoconvenio WHERE IdDepartamento="'.$iddepartamento.'"')or die(mysqli_error());

while($f2=mysqli_fetch_array($result2)) {
    $subServiciosA = $f2['SubServiciosA'];
    $subAcademico = $f2['SubAcademico'];
    $subPlaneacion = $f2['SubPlaneacionV'];
    $jefeDepartamento = $f2['JefeDepartamento'];
    $director = $f2['Director'];
    $jefeDepartamentoRH = $f2['JefeDepartamentoRH'];
    $jefeDepartamentoPPP = $f2['JefeDepartamentoPPP'];  
}

$result3=$db->query('SELECT * FROM convenioope WHERE IdConvenioOpe ='.$id)or die(mysqli_error());

while($f3=mysqli_fetch_array($result3)) {
    $diaSf1= date("d", strtotime($f3['FechaInicio'])); $mesSf1= date("m", strtotime($f3['FechaInicio'])); $anioSf1= date("Y", strtotime($f3['FechaInicio']));
    $diaSf2= date("d", strtotime($f3['FechaFin'])); $mesSf2= date("m", strtotime($f3['FechaFin'])); $anioSf2= date("Y", strtotime($f3['FechaFin']));

    if($mesSf1==1){$mesLSf1="ENERO";}
    if($mesSf1==2){$mesLSf1="FEBRERO";}
    if($mesSf1==3){$mesLSf1="MARZO";}
    if($mesSf1==4){$mesLSf1="ABRIL";}
    if($mesSf1==5){$mesLSf1="MAYO";}
    if($mesSf1==6){$mesLSf1="JUNIO";}
    if($mesSf1==7){$mesLSS1="JULIO";}
    if($mesSf1==8){$mesLSS1="AGOSTO";}
    if($mesSf1==9){$mesLSS1="SEPTIEMBRE";}
    if($mesSf1==10){$mesLSf1="OCTUBRE";}
    if($mesSf1==11){$mesLSf1="NOVIEMBRE";}
    if($mesSf1==12){$mesLSf1="DICIEMBRE";}

    if($mesSf2==1){$mesLSf2="ENERO";}
    if($mesSf2==2){$mesLSf2="FEBRERO";}
    if($mesSf2==3){$mesLSf2="MARZO";}
    if($mesSf2==4){$mesLSf2="ABRIL";}
    if($mesSf2==5){$mesLSf2="MAYO";}
    if($mesSf2==6){$mesLSf2="JUNIO";}
    if($mesSf2==7){$mesLSf2="JULIO";}
    if($mesSf2==8){$mesLSf2="AGOSTO";}
    if($mesSf2==9){$mesLSf2="SEPTIEMBRE";}
    if($mesSf2==10){$mesLSf2="OCTUBRE";}
    if($mesSf2==11){$mesLSf2="NOVIEMBRE";}
    if($mesSf2==12){$mesLSf2="DICIEMBRE";}
    
}

$result4=$db->query('SELECT * FROM periodopagos')or die(mysqli_error());

$cont2=0;
$valuesP=[];

while($f4=mysqli_fetch_array($result4)) {

    $f1=($f4['FechaInicioPeriodo']);
    $f2=($f4['FechaFinPeriodo']);
    $f3=($f4['FechaComprobanteFiscal']);
    $f4=($f4['FechaPago']);

    $diaf1= date("d", strtotime($f1)); $mesf1= date("m", strtotime($f1)); $mesLf1=""; $aniof1= date("Y", strtotime($f1));
    $diaf2= date("d", strtotime($f2)); $mesf2= date("m", strtotime($f2)); $mesLf2=""; $aniof2= date("Y", strtotime($f2));
    $diaf3= date("d", strtotime($f3)); $mesf3= date("m", strtotime($f3)); $mesLf3=""; $aniof3= date("Y", strtotime($f3));
    $diaf4= date("d", strtotime($f4)); $mesf4= date("m", strtotime($f4)); $mesLf4=""; $aniof4= date("Y", strtotime($f4));

    if($mesf1==1){$mesLf1="ENERO";}
    if($mesf1==2){$mesLf1="FEBRERO";}
    if($mesf1==3){$mesLf1="MARZO";}
    if($mesf1==4){$mesLf1="ABRIL";}
    if($mesf1==5){$mesLf1="MAYO";}
    if($mesf1==6){$mesLf1="JUNIO";}
    if($mesf1==7){$mesLf1="JULIO";}
    if($mesf1==8){$mesLf1="AGOSTO";}
    if($mesf1==9){$mesLf1="SEPTIEMBRE";}
    if($mesf1==10){$mesf1L="OCTUBRE";}
    if($mesf1==11){$mesf1L="NOVIEMBRE";}
    if($mesf1==12){$mesf1L="DICIEMBRE";}

    if($mesf1==1){$mesLf2="ENERO";}
    if($mesf1==2){$mesLf2="FEBRERO";}
    if($mesf1==3){$mesLf2="MARZO";}
    if($mesf1==4){$mesLf2="ABRIL";}
    if($mesf1==5){$mesLf2="MAYO";}
    if($mesf1==6){$mesLf2="JUNIO";}
    if($mesf1==7){$mesLf2="JULIO";}
    if($mesf1==8){$mesLf2="AGOSTO";}
    if($mesf1==9){$mesLf2="SEPTIEMBRE";}
    if($mesf1==10){$mesf2L="OCTUBRE";}
    if($mesf1==11){$mesf2L="NOVIEMBRE";}
    if($mesf1==12){$mesf2L="DICIEMBRE";}

    if($mesf1==1){$mesLf3="ENERO";}
    if($mesf1==2){$mesLf3="FEBRERO";}
    if($mesf1==3){$mesLf3="MARZO";}
    if($mesf1==4){$mesLf3="ABRIL";}
    if($mesf1==5){$mesLf3="MAYO";}
    if($mesf1==6){$mesLf3="JUNIO";}
    if($mesf1==7){$mesLf3="JULIO";}
    if($mesf1==8){$mesLf3="AGOSTO";}
    if($mesf1==9){$mesLf3="SEPTIEMBRE";}
    if($mesf1==10){$mesf3L="OCTUBRE";}
    if($mesf1==11){$mesf3L="NOVIEMBRE";}
    if($mesf1==12){$mesf3L="DICIEMBRE";}

    if($mesf1==1){$mesLf4="ENERO";}
    if($mesf1==2){$mesLf4="FEBRERO";}
    if($mesf1==3){$mesLf4="MARZO";}
    if($mesf1==4){$mesLf4="ABRIL";}
    if($mesf1==5){$mesLf4="MAYO";}
    if($mesf1==6){$mesLf4="JUNIO";}
    if($mesf1==7){$mesLf4="JULIO";}
    if($mesf1==8){$mesLf4="AGOSTO";}
    if($mesf1==9){$mesLf4="SEPTIEMBRE";}
    if($mesf1==10){$mesf4L="OCTUBRE";}
    if($mesf1==11){$mesf4L="NOVIEMBRE";}
    if($mesf1==12){$mesf4L="DICIEMBRE";}
    

    $valuesP[$cont2]=['diaInicioP'=>$diaf1,'mesInicioP'=>$mesLf1,'anioInicioP'=>$aniof1,
                      'diaFinP'=>$diaf2,'mesFinP'=>$mesLf2,'anioFinP'=>$aniof2,
                      'diaCF'=>$diaf3,'mesCF'=>$mesLf3,'anioCF'=>$aniof3,
                      'diaP'=>$diaf4,'mesP'=>$mesLf4,'anioP'=>$aniof4,];
    $cont2++;
}



$diaSemestref1= 0; $mesSemestref1= 0; $mesLSemestref1=""; $anioSemestref1= 0;
$diaSemestref2= 0; $mesSemestref2= 0; $mesLSemestref2=""; $anioSemestref2= 0;


$result5=$db->query('SELECT * FROM semestre WHERE Estatus ="Activo"')or die(mysqli_error());

while($f5=mysqli_fetch_array($result5)) {
    $diaSemestref1= date("d", strtotime($f5['FechaInicio'])); $mesSemestref1= date("m", strtotime($f5['FechaInicio'])); $anioSemestref1= date("Y", strtotime($f5['FechaInicio']));
    $diaSemestref2= date("d", strtotime($f5['FechaFin'])); $mesSemestref2= date("m", strtotime($f5['FechaFin'])); $anioSemestref2= date("Y", strtotime($f5['FechaFin']));

    if($mesSemestref1==1){$mesLSemestref1="ENERO";}
    if($mesSemestref1==2){$mesLSemestref1="FEBRERO";}
    if($mesSemestref1==3){$mesLSemestref1="MARZO";}
    if($mesSemestref1==4){$mesLSemestref1="ABRIL";}
    if($mesSemestref1==5){$mesLSemestref1="MAYO";}
    if($mesSemestref1==6){$mesLSemestref1="JUNIO";}
    if($mesSemestref1==7){$mesLSemestreS1="JULIO";}
    if($mesSemestref1==8){$mesLSemestreS1="AGOSTO";}
    if($mesSemestref1==9){$mesLSemestreS1="SEPTIEMBRE";}
    if($mesSemestref1==10){$mesLSemestref1="OCTUBRE";}
    if($mesSemestref1==11){$mesLSemestref1="NOVIEMBRE";}
    if($mesSemestref1==12){$mesLSemestref1="DICIEMBRE";}

    if($mesSemestref2==1){$mesLSemestref2="ENERO";}
    if($mesSemestref2==2){$mesLSemestref2="FEBRERO";}
    if($mesSemestref2==3){$mesLSemestref2="MARZO";}
    if($mesSemestref2==4){$mesLSemestref2="ABRIL";}
    if($mesSemestref2==5){$mesLSemestref2="MAYO";}
    if($mesSemestref2==6){$mesLSemestref2="JUNIO";}
    if($mesSemestref2==7){$mesLSemestref2="JULIO";}
    if($mesSemestref2==8){$mesLSemestref2="AGOSTO";}
    if($mesSemestref2==9){$mesLSemestref2="SEPTIEMBRE";}
    if($mesSemestref2==10){$mesLSemestref2="OCTUBRE";}
    if($mesSemestref2==11){$mesLSemestref2="NOVIEMBRE";}
    if($mesSemestref2==12){$mesLSemestref2="DICIEMBRE";}
    
}




$domicilio = implode(", ",$dom);



if($regimen=="Honorarios"){
	$templateWord = new TemplateProcessor('Contrato Honorarios.docx');
}
if($regimen=="Asimilados"){
	$templateWord = new TemplateProcessor('Contrato Asimilados.docx');
}



$templateWord->setValue('Nombre',mb_strtoupper ($nombreCompleto,'utf-8'));
$templateWord->setValue('ApellidoPaterno',mb_strtoupper ($apePat,'utf-8'));
$templateWord->setValue('ApellidoMaterno',mb_strtoupper ($apeMat,'utf-8'));
$templateWord->setValue('Profesion',$puesto);
$templateWord->setValue('Domicilio',$domicilio);
$templateWord->setValue('RFC',$rfc);
$templateWord->setValue('departamento',ucwords($departamento));
$templateWord->setValue('Departamento',mb_strtoupper($departamento,'utf-8'));
$templateWord->setValue('Genero',mb_strtoupper ($genero,'utf-8'));
$templateWord->setValue('subServiciosA',mb_strtoupper ($subServiciosA,'utf-8'));
$templateWord->setValue('subAcademico',mb_strtoupper ($subAcademico,'utf-8'));
$templateWord->setValue('subPlaneacion',mb_strtoupper ($subPlaneacion,'utf-8'));
$templateWord->setValue('jefeDepartamento',mb_strtoupper ($jefeDepartamento,'utf-8'));
$templateWord->setValue('jefeDepartamentoRH',mb_strtoupper ($jefeDepartamentoRH));
$templateWord->setValue('jefeDepartamentoPPP',mb_strtoupper ($jefeDepartamentoPPP));
$templateWord->setValue('director',mb_strtoupper ($director,'utf-8'));
$templateWord->setValue('diaInicioS',$diaSf1);
$templateWord->setValue('mesInicioS',$mesLSf1);
$templateWord->setValue('anioInicioS',$anioSf1);
$templateWord->setValue('diaFinS',$diaSf2);
$templateWord->setValue('mesFinS',$mesLSf2);
$templateWord->setValue('anioFinS',$anioSf2);

$templateWord->setValue('diaInicioSemestre',$diaSemestref1);
$templateWord->setValue('mesInicioSemestre',$mesLSemestref1);
$templateWord->setValue('anioInicioSemestre',$anioSemestref1);
$templateWord->setValue('diaFinSemestre',$diaSemestref2);
$templateWord->setValue('mesFinSemestre',$mesLSemestref2);
$templateWord->setValue('anioFinSemestre',$anioSemestref2);

$templateWord->setValue('puesto',$puesto);
$templateWord->setValue('nivelestudio',$nivelestudio);
$templateWord->setValue('asignaturas',ucwords($asignaturas));
$templateWord->setValue('montoapagar', $pagoDeConvenio);

$templateWord->setValue('SiglasDepartamento', $SiglasDepartamento);
$templateWord->setValue('ClaveConvenio', $ClaveConvenio);
/*$templateWord->setValue('Nombre',mb_strtoupper ($nombreCompleto,'utf-8'));
$templateWord->setValue('ApellidoPaterno',mb_strtoupper ($apePat,'utf-8'));
$templateWord->setValue('ApellidoMaterno',mb_strtoupper ($apeMat,'utf-8'));
$templateWord->setValue('Profesion',mb_strtoupper ($profesionDocente,'utf-8'));
$templateWord->setValue('Domicilio',mb_strtoupper ($domicilio,'utf-8'));
$templateWord->setValue('RFC',mb_strtoupper ($rfc,'utf-8'));
$templateWord->setValue('Departamento',mb_strtoupper ($departamento,'utf-8'));
$templateWord->setValue('Genero',mb_strtoupper ($genero,'utf-8'));
$templateWord->setValue('subServiciosA',mb_strtoupper ($subServiciosA,'utf-8'));
$templateWord->setValue('subAcademico',mb_strtoupper ($subAcademico,'utf-8'));
$templateWord->setValue('subPlaneacion',mb_strtoupper ($subPlaneacion,'utf-8'));
$templateWord->setValue('jefeDepartamento',mb_strtoupper ($jefeDepartamento,'utf-8'));
$templateWord->setValue('director',mb_strtoupper ($director,'utf-8'));
$templateWord->setValue('diaInicioS',mb_strtoupper ($diaSf1,'utf-8'));
$templateWord->setValue('mesInicioS',mb_strtoupper ($mesLSf1,'utf-8'));
$templateWord->setValue('anioInicioS',mb_strtoupper ($anioSf1,'utf-8'));
$templateWord->setValue('diaFinS',mb_strtoupper ($diaSf2,'utf-8'));
$templateWord->setValue('mesFinS',mb_strtoupper ($mesLSf2,'utf-8'));
$templateWord->setValue('anioFinS',mb_strtoupper ($anioSf2,'utf-8'));
$templateWord->setValue('puesto',mb_strtoupper ($puesto,'utf-8'));
$templateWord->setValue('nivelestudio',mb_strtoupper ($nivelestudio,'utf-8'));*/


//$templateWord->cloneBlock('asignaturas', 0, true, false, $asignaturas);


//$templateWord->cloneRowAndSetValues('Materias', $values);
$templateWord->cloneRowAndSetValues('diaInicioP', $valuesP);
$db=null;
// $conexion->close();
// --- Guardamos el documento
$templateWord->saveAs('format_read/plantilla.docx');

header("Content-Disposition: attachment; filename=Contrato $regimen $id.docx; charset=iso-8859-1");
echo file_get_contents('format_read/plantilla.docx');
        
?>