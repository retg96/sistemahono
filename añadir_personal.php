<?php
$NoSie = $_POST["NoSie"];
$Nombre = $_POST["Nombre"];
$TituloAbreviado = $_POST["TituloAbreviado"];
$Nacimiento = $_POST["Nacimiento"];
$Sexo = $_POST["Sexo"];
$RFC = $_POST["RFC"];
$CURP = $_POST["CURP"];
$Celular = $_POST["Celular"];
$Calle = $_POST["Calle"];
$NumExterior = $_POST["NumExterior"];
$NumInterior = $_POST["NumInterior"];
$Fraccionamiento = $_POST["Fraccionamiento"];
$CP = $_POST["CP"];
$Ciudad = $_POST["Ciudad"];
$Estado = $_POST["Estado"];
$Email = $_POST["Email"];
$Profesion = $_POST["Profesion"];
$EvaluacionDepartamento = $_POST["EvaluacionDepartamento"];
$EvaluacionAlumno = $_POST["EvaluacionAlumno"];
$Estatus = $_POST["Estatus"];
$FechaIngresoTec = $_POST["FechaIngresoTec"];
$Nacionalidad = $_POST["Nacionalidad"];
$TipoPersona = $_POST["TipoPersona"];
$Regimen = $_POST["Regimen"];

if($Regimen == 1){
	$Interno = $_POST["Interno"];
	$ClavePresupuestal = $_POST["ClavePresupuestal"];
	$GobiernoFed = $_POST["GobiernoFed"];
	$SEP = $_POST["SEP"];
	$RAMA = $_POST["RAMA"];
	$SNI = $_POST["SNI"];
	$ClavePresupuestal = $_POST["ClavePresupuestal"];
	$GobiernoFed = $_POST["GobiernoFed"];
	$SEP = $_POST["SEP"];
	$RAMA = $_POST["RAMA"];
	$SNI = $_POST["SNI"];
	
}else{
	$Interno = "-";
	$ClavePresupuestal = "-";
	$GobiernoFed = "";
	$SEP = "";
	$RAMA = "";
	$SNI = 1;
}
$Departamento = $_POST["Departamento"];
$NivelEstudio = $_POST["NivelEstudio"];
$Puesto = $_POST["Puesto"];
$AreaAcademica = $_POST["AreaAcademica"];
$MotivoAusencia = $_POST["MotivoAusencia"];



require_once('includes/load.php');


$validacion = "SELECT * FROM personal WHERE NoSie = '$NoSie' AND NombreCompleto  = '$Nombre' AND TituloAbreviado = '$TituloAbreviado' AND FechaNacimiento = '$Nacimiento' AND Sexo = '$Sexo' AND RFC = '$RFC' AND CURP = '$CURP' AND NumeroCelular = '$Celular' AND Calle = '$Calle' AND NumExterior= '$NumExterior' AND NumInterior='$NumInterior' AND Fraccionamiento='$Fraccionamiento' AND CP='$CP' AND Ciudad='$Ciudad' AND Estado='$Estado' AND Email = '$Email' AND Profesion = '$Profesion' AND GobiernoFed = '$GobiernoFed' AND SEP = '$SEP' AND RAMA = '$RAMA' AND Interno = '$Interno'  AND ClavePresupuestal = '$ClavePresupuestal'AND EvaluacionDepartamento = '$EvaluacionDepartamento' AND EvaluacionAlumno = '$EvaluacionAlumno' AND Estatus = '$Estatus' AND FechaIngresoTec = '$FechaIngresoTec' AND IdNacionalidad = '$Nacionalidad' AND IdTipoPersona = '$TipoPersona' AND IdRegimen = '$Regimen' AND IdDepartamento = '$Departamento' AND IdNivelEstudio = '$NivelEstudio' AND IdPuesto = '$Puesto' AND IdAreaAcademica = '$AreaAcademica' AND IdSNI = '$SNI' AND IdMotivoAusencia = '$MotivoAusencia'";


$resultado = $db->query($validacion);

if ($resultado->num_rows>0) {
	
	echo "Error: El registro ya existe" ;
}else{
	$sql = "INSERT INTO personal (NoSie,NombreCompleto,TituloAbreviado,FechaNacimiento,Sexo,RFC,CURP,NumeroCelular,Calle, NumExterior, NumInterior, Fraccionamiento, CP, Ciudad, Estado, Email,Profesion,GobiernoFed,SEP,RAMA,Interno,ClavePresupuestal,EvaluacionDepartamento,EvaluacionAlumno,Estatus,FechaIngresoTec,IdNacionalidad,IdTipoPersona,IdRegimen,IdDepartamento,IdNivelEstudio,IdPuesto,IdAreaAcademica,IdSNI,IdMotivoAusencia)VALUES('$NoSie','$Nombre','$TituloAbreviado','$Nacimiento','$Sexo','$RFC','$CURP','$Celular','$Calle', '$NumExterior', '$NumInterior', '$Fraccionamiento', '$CP', '$Ciudad', '$Estado', '$Email','$Profesion','$GobiernoFed','$SEP','$RAMA','$Interno','$ClavePresupuestal','$EvaluacionDepartamento','$EvaluacionAlumno','$Estatus','$FechaIngresoTec','$Nacionalidad','$TipoPersona','$Regimen','$Departamento','$NivelEstudio','$Puesto','$AreaAcademica','$SNI','$MotivoAusencia')";

	if ($db->query($sql) === TRUE) {

		$id="";

		$result=$db->query("SELECT * FROM personal WHERE NoSie = '$NoSie' AND NombreCompleto  = '$Nombre' AND TituloAbreviado = '$TituloAbreviado' AND FechaNacimiento = '$Nacimiento' AND Sexo = '$Sexo' AND RFC = '$RFC' AND CURP = '$CURP' AND NumeroCelular = '$Celular' AND Calle = '$Calle' AND NumExterior= '$NumExterior' AND NumInterior='$NumInterior' AND Fraccionamiento='$Fraccionamiento' AND CP='$CP' AND Ciudad='$Ciudad' AND Estado='$Estado' AND Email = '$Email' AND Profesion = '$Profesion' AND GobiernoFed = '$GobiernoFed' AND SEP = '$SEP' AND RAMA = '$RAMA' AND Interno = '$Interno'  AND ClavePresupuestal = '$ClavePresupuestal'AND EvaluacionDepartamento = '$EvaluacionDepartamento' AND EvaluacionAlumno = '$EvaluacionAlumno' AND Estatus = '$Estatus' AND FechaIngresoTec = '$FechaIngresoTec' AND IdNacionalidad = '$Nacionalidad' AND IdTipoPersona = '$TipoPersona' AND IdRegimen = '$Regimen' AND IdDepartamento = '$Departamento' AND IdNivelEstudio = '$NivelEstudio' AND IdPuesto = '$Puesto' AND IdAreaAcademica = '$AreaAcademica' AND IdSNI = '$SNI' AND IdMotivoAusencia = '$MotivoAusencia'")or die(mysqli_error());
		while($f=mysqli_fetch_array($result)) {

    		$id =  $f['IdPersonal'];
    	}
    	header('Location: '."personal_tecnm_principal.php");
		// header('Location: '."personal_tecnm_detalles_btnh.php?id=$id");

	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}
	
}

$db=null;
?>
