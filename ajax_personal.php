<?php
require_once('includes/load.php');
?>

<?php

$NoSie="";
$Nombre="";
$ApPat="";
$ApMat="";
$TituloAbreviado="";
$Nacimiento="";
$Sexo="";
$RFC="";
$CURP="";
$Celular="";
$Calle="";
$NumExterior="";
$NumInterior="";
$Fraccionamiento="";
$CP="";
$Ciudad="";
$Estado="";
$Email="";
$Profesion="";
$EvaluacionDepartamento="";
$EvaluacionAlumno="";
$Estatus="";
$FechaIngresoTec="";
$Nacionalidad="";
$TipoPersona="";
$Regimen="";
$Departamento="";
$NivelEstudio="";
$Puesto="";
$AreaAcademica="";
$MotivoAusencia="";

$NoSie = isset($_POST['NoSie']) ? $_POST['NoSie'] : "";
$Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : "";
$ApPat = isset($_POST['ApPat']) ? $_POST['ApPat'] : "";
$ApMat = isset($_POST['ApMat']) ? $_POST['ApMat'] : "";
$TituloAbreviado = isset($_POST['TituloAbreviado']) ? $_POST['TituloAbreviado'] : "";
$Nacimiento = isset($_POST['Nacimiento']) ? $_POST['Nacimiento'] : "";
$Sexo = isset($_POST['Sexo']) ? $_POST['Sexo'] : "";
$RFC = isset($_POST['RFC']) ? $_POST['RFC'] : "";
$CURP = isset($_POST['CURP']) ? $_POST['CURP'] : "";
$Celular = isset($_POST['Celular']) ? $_POST['Celular'] : "";
$Calle = isset($_POST['Calle']) ? $_POST['Calle'] : "";
$NumExterior = isset($_POST['NumExterior']) ? $_POST['NumExterior'] : "";
$NumInterior = isset($_POST['NumInterior']) ? $_POST['NumInterior'] : "";
$Fraccionamiento = isset($_POST['Fraccionamiento']) ? $_POST['Fraccionamiento'] : "";
$CP = isset($_POST['CP']) ? $_POST['CP'] : "";
$Ciudad = isset($_POST['Ciudad']) ? $_POST['Ciudad'] : "";
$Estado = isset($_POST['Estado']) ? $_POST['Estado'] : "";
$Email = isset($_POST['Email']) ? $_POST['Email'] : "";
$Profesion = isset($_POST['Profesion']) ? $_POST['Profesion'] : "";
$EvaluacionDepartamento = isset($_POST['EvaluacionDepartamento']) ? $_POST['EvaluacionDepartamento'] : "";
$EvaluacionAlumno = isset($_POST['EvaluacionAlumno']) ? $_POST['EvaluacionAlumno'] : "";
$Estatus = isset($_POST['Estatus']) ? $_POST['Estatus'] : "";
$FechaIngresoTec = isset($_POST['FechaIngresoTec']) ? $_POST['FechaIngresoTec'] : "";
$Nacionalidad = isset($_POST['Nacionalidad']) ? $_POST['Nacionalidad'] : "";
$Regimen = isset($_POST['Regimen']) ? $_POST['Regimen'] : "";
$Departamento = isset($_POST['Departamento']) ? $_POST['Departamento'] : "";
$NivelEstudio = isset($_POST['NivelEstudio']) ? $_POST['NivelEstudio'] : "";
$Puesto = isset($_POST['Puesto']) ? $_POST['Puesto'] : "";
$AreaAcademica = isset($_POST['AreaAcademica']) ? $_POST['AreaAcademica'] : "";
$MotivoAusencia = isset($_POST['MotivoAusencia']) ? $_POST['MotivoAusencia'] : "";


// $NoSie = $_POST["NoSie"];
// $Nombre = $_POST["Nombre"];
// $ApPat = $_POST["ApPat"];
// $ApMat = $_POST["ApMat"];
// $TituloAbreviado = $_POST["TituloAbreviado"];
// $Nacimiento = $_POST["Nacimiento"];
// $Sexo = $_POST["Sexo"];
// $RFC = $_POST["RFC"];
// $CURP = $_POST["CURP"];
// $Celular = $_POST["Celular"];
// $Calle = $_POST["Calle"];

// $NumExterior = $_POST["NumExterior"];
// $NumInterior = $_POST["NumInterior"];
// $Fraccionamiento = $_POST["Fraccionamiento"];
// $CP = $_POST["CP"];
// $Ciudad = $_POST["Ciudad"];
// $Estado = $_POST["Estado"];
// $Email = $_POST["Email"];
// $Profesion = $_POST["Profesion"];
// $EvaluacionDepartamento = $_POST["EvaluacionDepartamento"];
// $EvaluacionAlumno = $_POST["EvaluacionAlumno"];
// $Estatus = $_POST["Estatus"];
// $FechaIngresoTec = $_POST["FechaIngresoTec"];
// $Nacionalidad = $_POST["Nacionalidad"];
// $TipoPersona = $_POST["TipoPersona"];
// $Regimen = $_POST["Regimen"];

if (isset($_POST['Regimen'])==1) {
    $Interno = isset($_POST['Interno']) ? $_POST['Interno'] : "";
    $ClavePresupuestal = isset($_POST['ClavePresupuestal']) ? $_POST['ClavePresupuestal'] : "";
    $GobiernoFed = isset($_POST['GobiernoFed']) ? $_POST['GobiernoFed'] : "";
    $SEP = isset($_POST['SEP']) ? $_POST['SEP'] : "";
    $RAMA = isset($_POST['RAMA']) ? $_POST['RAMA'] : "";
    $SNI = isset($_POST['SNI']) ? $_POST['SNI'] : "";
    $ClavePresupuestal = isset($_POST['ClavePresupuestal']) ? $_POST['ClavePresupuestal'] : "";
    $GobiernoFed = isset($_POST['GobiernoFed']) ? $_POST['GobiernoFed'] : "";
    $SEP = isset($_POST['SEP']) ? $_POST['SEP'] : "";
    $RAMA = isset($_POST['RAMA']) ? $_POST['RAMA'] : "";
    $SNI = isset($_POST['SNI']) ? $_POST['SNI'] : "";

}else{
	$Interno = "-";
	$ClavePresupuestal = "-";
	$GobiernoFed = "";
	$SEP = "";
	$RAMA = "";
	$SNI = 1;
}

// if($Regimen == 1){
// 	$Interno = $_POST["Interno"];
// 	$ClavePresupuestal = $_POST["ClavePresupuestal"];
// 	$GobiernoFed = $_POST["GobiernoFed"];
// 	$SEP = $_POST["SEP"];
// 	$RAMA = $_POST["RAMA"];
// 	$SNI = $_POST["SNI"];
// 	$ClavePresupuestal = $_POST["ClavePresupuestal"];
// 	$GobiernoFed = $_POST["GobiernoFed"];
// 	$SEP = $_POST["SEP"];
// 	$RAMA = $_POST["RAMA"];
// 	$SNI = $_POST["SNI"];
	
// }else{
// 	$Interno = "-";
// 	$ClavePresupuestal = "-";
// 	$GobiernoFed = "";
// 	$SEP = "";
// 	$RAMA = "";
// 	$SNI = 1;
// }


// $Departamento = $_POST["Departamento"];
// $NivelEstudio = $_POST["NivelEstudio"];
// $Puesto = $_POST["Puesto"];
// $AreaAcademica = $_POST["AreaAcademica"];
// $MotivoAusencia = $_POST["MotivoAusencia"];




$validacion = "SELECT * FROM personal WHERE NoSie = '{$NoSie}' AND Nombre  = '$Nombre' AND ApPat = '$ApPat' AND ApMat = '$ApMat' AND TituloAbreviado = '$TituloAbreviado' AND FechaNacimiento = '$Nacimiento' AND Sexo = '$Sexo' AND RFC = '$RFC' AND CURP = '$CURP' AND NumeroCelular = '$Celular' AND Calle = '$Calle' AND NumExterior= '$NumExterior' AND NumInterior='$NumInterior' AND Fraccionamiento='$Fraccionamiento' AND CP='$CP' AND Ciudad='$Ciudad' AND Estado='$Estado' AND Email = '$Email' AND Profesion = '$Profesion' AND GobiernoFed = '$GobiernoFed' AND SEP = '$SEP' AND RAMA = '$RAMA' AND Interno = '$Interno'  AND ClavePresupuestal = '$ClavePresupuestal'AND EvaluacionDepartamento = '$EvaluacionDepartamento' AND EvaluacionAlumno = '$EvaluacionAlumno' AND Estatus = '$Estatus' AND FechaIngresoTec = '$FechaIngresoTec' AND IdNacionalidad = '$Nacionalidad' AND IdTipoPersona = '$TipoPersona' AND IdRegimen = '$Regimen' AND IdDepartamento = '$Departamento' AND IdNivelEstudio = '$NivelEstudio' AND Puesto = '$Puesto' AND IdAreaAcademica = '$AreaAcademica' AND IdSNI = '$SNI' AND IdMotivoAusencia = '$MotivoAusencia'";


$resultado = $db->query($validacion);

if ($resultado->num_rows>0) {
	
	echo "Error: El registro ya existe" ;
}else{
	$sql = "INSERT INTO personal (NoSie,Nombre,ApPat,ApMat,TituloAbreviado,FechaNacimiento,Sexo,RFC,CURP,NumeroCelular,Calle, NumExterior, NumInterior, Fraccionamiento, CP, Ciudad, Estado, Email,Profesion,GobiernoFed,SEP,RAMA,Interno,ClavePresupuestal,EvaluacionDepartamento,EvaluacionAlumno,Estatus,FechaIngresoTec,IdNacionalidad,IdTipoPersona,IdRegimen,IdDepartamento,IdNivelEstudio,Puesto,IdAreaAcademica,IdSNI,IdMotivoAusencia)VALUES('$NoSie','$Nombre','$ApPat','$ApMat','$TituloAbreviado','$Nacimiento','$Sexo','$RFC','$CURP','$Celular','$Calle', '$NumExterior', '$NumInterior', '$Fraccionamiento', '$CP', '$Ciudad', '$Estado', '$Email','$Profesion','$GobiernoFed','$SEP','$RAMA','$Interno','$ClavePresupuestal','$EvaluacionDepartamento','$EvaluacionAlumno','$Estatus','$FechaIngresoTec','$Nacionalidad','$TipoPersona','$Regimen','$Departamento','$NivelEstudio','$Puesto','$AreaAcademica','$SNI','$MotivoAusencia')";

	if ($db->query($sql) === TRUE) {

		$id="";

		$result=query($db,"SELECT * FROM personal WHERE NoSie = '$NoSie' AND Nombre  = '$Nombre' AND ApPat = '$ApPat' AND ApMat = '$ApMat' AND TituloAbreviado = '$TituloAbreviado' AND FechaNacimiento = '$Nacimiento' AND Sexo = '$Sexo' AND RFC = '$RFC' AND CURP = '$CURP' AND NumeroCelular = '$Celular' AND Calle = '$Calle' AND NumExterior= '$NumExterior' AND NumInterior='$NumInterior' AND Fraccionamiento='$Fraccionamiento' AND CP='$CP' AND Ciudad='$Ciudad' AND Estado='$Estado' AND Email = '$Email' AND Profesion = '$Profesion' AND GobiernoFed = '$GobiernoFed' AND SEP = '$SEP' AND RAMA = '$RAMA' AND Interno = '$Interno'  AND ClavePresupuestal = '$ClavePresupuestal'AND EvaluacionDepartamento = '$EvaluacionDepartamento' AND EvaluacionAlumno = '$EvaluacionAlumno' AND Estatus = '$Estatus' AND FechaIngresoTec = '$FechaIngresoTec' AND IdNacionalidad = '$Nacionalidad' AND IdTipoPersona = '$TipoPersona' AND IdRegimen = '$Regimen' AND IdDepartamento = '$Departamento' AND IdNivelEstudio = '$NivelEstudio' AND Puesto = '$Puesto' AND IdAreaAcademica = '$AreaAcademica' AND IdSNI = '$SNI' AND IdMotivoAusencia = '$MotivoAusencia'")or die(mysqli_error());
		while($f=mysqli_fetch_array($result)) {

    		$id =  $f['id'];
    	}
    	header('Location: '."personal_tecnm_detalles_btnh.php?id=$id");
	} else {
	    echo "Error: " . $sql . "<br>" . $conexion->error;
	}
	
}

// if($db->query($validacion)){
//     $session->msg('s',"Personal registrado exitosamente. ");
//     redirect('personal_tecnm_principal.php', false);
//   } else {
//     $session->msg('d',' Lo siento, registro falló.');
//     redirect('personal_tecnm_añadir.php', false);
//   }

// } else{
//   $session->msg("d", $errors);
//   redirect('personal_tecnm_añadir.php',false);
// }

// $db->close();
$db = null;

?>
