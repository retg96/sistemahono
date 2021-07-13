<?php
  $page_title = 'Pagos';
  require_once('includes/load.php');
  include_once('layouts/header.php');
  $diasSemestre=0;
  $semanasSemestre=0;
  $fPP=0;
  $fIVA=0;
  $final=0;
?>

<?php
$querytiempo = "SELECT * FROM semestre WHERE Estatus = 'Activo'";

$resultadotiempo = $db->query($querytiempo);

if ($resultadotiempo->num_rows>0) {

    while($t= mysqli_fetch_array($resultadotiempo)){
        $f1= new DateTime($t['FechaInicio']);
        $f2= new DateTime($t['FechaFin']);
        $diffecha = $f1->diff($f2);

        $diasSemestre = $diffecha->days;

        $semanasSemestre = $diasSemestre/7;
    }


    $query = "SELECT convenio.id,personal.NoSie,personal.NombreCompleto,personal.TituloAbreviado,personal.Profesion,personal.IdPuesto,regimen.Regimen, departamento.Departamento FROM convenio INNER JOIN personal ON personal.id = convenio.IdPersonal INNER JOIN regimen ON personal.IdRegimen=regimen.id INNER JOIN departamento ON departamento.id = personal.IdDepartamento WHERE personal.NoSie NOT LIKE '' ORDER By personal.NoSie";

    $query2 = "SELECT convenioope.id,personalOperativo.ClaveSie,personalOperativo.NombreCompleto,personalOperativo.IdPuesto,puesto.Puesto,puesto.Pago,regimen.Regimen, departamento.Departamento FROM convenioope INNER JOIN personalOperativo ON personaloperativo.id = convenioope.IdPersonalOperativo INNER JOIN puesto ON personaloperativo.IdPuesto=puesto.id INNER JOIN regimen ON personalOperativo.IdRegime=regimen.id INNER JOIN departamento ON departamento.id = personalOperativo.IdDepartamento WHERE personalOperativo.ClaveSie NOT LIKE '' ORDER By personalOperativo.ClaveSie";
    
if (isset($_POST['consulta'])) {
  $q = $db->real_escape_string($_POST['consulta']);
    $q2 = $db->real_escape_string($_POST['consulta']);
  $query = "SELECT convenio.id,personal.NoSie,personal.NombreCompleto,personal.TituloAbreviado,personal.Profesion,personal.Puesto,regimen.Regimen, departamento.Departamento FROM convenio INNER JOIN personal ON personal.id = convenio.IdPersonal INNER JOIN regimen ON personal.IdRegimen=regimen.id INNER JOIN departamento ON departamento.id = personal.IdDepartamento WHERE convenio.id LIKE '$q' OR personal.NoSie LIKE '$q%' OR personal.NombreCompleto LIKE '$q%' OR personal.TituloAbreviado LIKE '$q%' OR departamento.Departamento LIKE '$q%' OR regimen.Regimen LIKE '$q%'";


 $query2 = "SELECT convenioope.id,personalOperativo.ClaveSie,personalOperativo.NombreCompleto,personalOperativo.IdPuesto,puesto.Puesto,puesto.Pago,regimen.Regimen, departamento.Departamento FROM convenioope INNER JOIN personalOperativo ON personaloperativo.id = convenioope.IdPersonalOperativo INNER JOIN puesto ON personaloperativo.IdPuesto=puesto.id INNER JOIN regimen ON personalOperativo.IdRegime=regimen.id INNER JOIN departamento ON departamento.id = personalOperativo.IdDepartamento WHERE convenioope.id LIKE '$q' OR personaloperativo.ClaveSie LIKE '$q%' OR personaloperativo.NombreCompleto LIKE '$q%' OR departamento.Departamento LIKE '$q%' OR regimen.Regimen LIKE '$q%'";
}

$resultado = $db->query($query);
$resultado2 = $db->query($query2);

?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Pagos</span>
       </strong>
         <!-- <a href="personal_tecnm_añadir.php" class="btn btn-info pull-right">AGREGAR PERSONAL</a> -->
      </div>
      <div class="panel-body">

    
      <table class="table table-bordered table-striped" id="mitabla">
        <thead class="headd">
                       <tr>
                        <th>ID CONVENIO</th>
                        <th>ID SIE</th>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Regimen</th>
                        <th>SubTotal</th>
                        <th>ISR</th>
                        <th>Total</th>
                        <th>Detalles Pago</th>
                      </tr>
        </thead>
    <tbody class="boddy">              

<?php
while($fila = mysqli_fetch_array($resultado)){

                    $InicioContrato="";
                    $FinContrato= "";
                    $IRangoNoPago="";
                    $FRangoNoPago= "";


                    $result=$db->query('SELECT personal.id,personal.NoSie,horariodocentemateria.id,horariodocentemateria.LunesHoraI,horariodocentemateria.MartesHoraI,horariodocentemateria.MiercolesHoraI,horariodocentemateria.JuevesHoraI,horariodocentemateria.ViernesHoraI,horariodocentemateria.SabadoHoraI,horariodocentemateria.DomingoHoraI,horariodocentemateria.LunesHoraF,horariodocentemateria.MartesHoraF,horariodocentemateria.MiercolesHoraF,horariodocentemateria.JuevesHoraF,horariodocentemateria.ViernesHoraF,horariodocentemateria.SabadoHoraF,horariodocentemateria.DomingoHoraF, materia.id,materia.AreaAbreviada,materia.Materia,materia.Semestre,materia.ClaveMateria,materia.NombreCorto,materia.HorasTeoricas,materia.HorasPracticas, carrera.Carrera, modalidad.Modalidad,modalidad.Pago,convenio.id FROM horariodocentemateria INNER JOIN materia ON materia.id=horariodocentemateria.IdMateria INNER JOIN modalidad ON modalidad.id=horariodocentemateria.IdModalidad INNER JOIN carrera ON carrera.id=materia.IdCarrera INNER JOIN convenio ON convenio.id = horariodocentemateria.IdConvenio INNER JOIN personal ON personal.id =convenio.IdPersonal WHERE horariodocentemateria.IdConvenio = "'.$fila['id'].'" ORDER BY (materia.ClaveMateria)') or die (mysqli_error());


                    $PagoTotal=0;
                    $PagoIVATotal=0;
                    $Subtotal=0;

                    $diasTrabajoLetras=array();

                    while($f=mysqli_fetch_array($result)) {



                    //OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
                    $querytiempo = "SELECT * FROM convenio WHERE id =".$fila['id'];

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

                    $diasTrabajoLetras=array();
                    $Subtotal+=$SubtotalPorMateria;
                    $PagoIVATotal+=$PagoIVATotalPorMateria;
                    $PagoTotal+=$PagoTotalPorMateria;

                    $SubtotalPorMateria=0;
                    $PagoIVATotalPorMateria=0;
                    $PagoTotalPorMateria=0;


                   } 

                    
                    //echo "PAGO PG:",$pagoPG;
?>
            <td><?php echo remove_junk(ucwords($fila['id']))?></td>
            <td><?php echo remove_junk(ucwords($fila['NoSie']))?></td>
            <td><?php echo remove_junk(ucwords($fila['NombreCompleto']))?></td>
            <td><?php echo remove_junk(ucwords($fila['Departamento']))?></td>
            <td><?php echo remove_junk(ucwords($fila['Regimen']))?></td>
            <td><?php echo "$",$Subtotal ?></td>
            <td><?php echo "$",$PagoIVATotal ?></td>
            <td><?php echo "$",$PagoTotal ?></td>
            <td class="text-center">
            <div class="btn-group">
              <a href="pagos_detalles.php?id=<?php echo (int)$fila['id'];?>" class="btn btn-success btn-xs" style="margin: 2px !important;" title="Detalles" data-toggle="tooltip">
                <!-- <span class="glyphicon glyphicon-edit"></span> -->
                DETALLES
              </a>
                </div>
           </td>

            <!-- <td><a class='btnsV' onclick=location.href='pagos_detalles.php?id=".$fila['id']."'>DETALLES</a></td> -->
            </tr>

                    <?php
                        $fPP+=$Subtotal;
                        $fIVA+=$PagoIVATotal;
                        $final+=$PagoTotal;



}

?>
<?php
        while($fila2 = mysqli_fetch_array($resultado2)){ 
 ?>           <tr>
 <?php           
                    
                   $InicioContrato="";
                    $FinContrato= "";
                    $IRangoNoPago="";
                    $FRangoNoPago= "";


                    $result=$db->query('SELECT personaloperativo.id,personaloperativo.ClaveSie, horariooperativo.id,horariooperativo.LunesHoraI,horariooperativo.MartesHoraI,horariooperativo.MiercolesHoraI,horariooperativo.JuevesHoraI,horariooperativo.ViernesHoraI,horariooperativo.SabadoHoraI,horariooperativo.DomingoHoraI,horariooperativo.LunesHoraF,horariooperativo.MartesHoraF,horariooperativo.MiercolesHoraF,horariooperativo.JuevesHoraF,horariooperativo.ViernesHoraF,horariooperativo.SabadoHoraF,horariooperativo.DomingoHoraF, puesto.Puesto,puesto.Pago,convenioope.id FROM horariooperativo INNER JOIN convenioope ON convenioope.id = horariooperativo.IdConvenioOpe INNER JOIN personaloperativo ON personaloperativo.id =convenioope.IdPersonalOperativo INNER JOIN puesto ON puesto.id = personaloperativo.IdPuesto WHERE horariooperativo.IdConvenioOpe = "'.$fila2['id'].'" ORDER BY (personaloperativo.id)') or die (mysqli_error());


                    $PagoTotal=0;
                    $PagoIVATotal=0;
                    $Subtotal=0;

                    $diasTrabajoLetras=array();

                    while($f=mysqli_fetch_array($result)) {



                    //OBTENEMOS LOS DIAS QUE TRABAJA SEPARADO POR DIAS DE LA SEMANA
                    $querytiempo = "SELECT * FROM convenioope WHERE id =".$fila2['id'];

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

                    //echo "PAGO PG:",$pagoPG;
?>
                    <td><?php echo remove_junk(ucwords($fila2['id']))?></td>
                    <td><?php echo remove_junk(ucwords($fila2['ClaveSie']))?></td>
                    <td><?php echo remove_junk(ucwords($fila2['NombreCompleto']))?></td>
                    <td><?php echo remove_junk(ucwords($fila2['Departamento']))?></td>
                    <td><?php echo remove_junk(ucwords($fila2['Regimen']))?></td>
                    <!-- <td><?php echo $HorasTotal ?></td> -->
                    <td><?php echo $Subtotal ?></td>
                    <td><?php echo $PagoIVATotal ?></td>
                    <td><?php echo $PagoTotal ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                      <a href="pagos_detalles_op.php?id=<?php echo (int)$fila2['id'];?>" class="btn btn-success btn-xs" style="margin: 2px !important;" title="Detalles" data-toggle="tooltip">
                <!-- <span class="glyphicon glyphicon-edit"></span> -->
                     DETALLES
                      </a>
                </div>
                    </td>
                    <!-- <td><a class='btnsV' onclick=location.href='pagos_detalles_op.php?id=".$fila2['IdConvenioOpe']."'>DETALLES</a></td> -->
<?php
                        $fPP+=$Subtotal;
                        $fIVA+=$PagoIVATotal;
                        $final+=$PagoTotal;
                                              

        }
?>
      </tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>TOTAL SEMESTRAL</th>
                        <td><?php echo "$", $fPP ?></td>
                        <td><?php echo "$", $fIVA ?></td>
                        <td><?php echo "$", $final ?></td>
                        <td></td>
                      </tr>
                      </tbody>
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
                      title: 'Eliminar Personal?',
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
                      "sScrollX": "100%", //This is what made my columns increase in size.
                      "bScrollCollapse": true,
                      "sScrollY": "320px",
                      responsive: true,
                      processing: true,
                      lengthMenu: [[10, 15, -1], [10, 15, "All"]],
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
    <?php } ?>

<?php
$db=null;
?>