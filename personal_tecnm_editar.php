<?php
$tpR=$_POST["tpR"];
$id = $_POST["id"];
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


include ('includes/load.php');
$sql = "UPDATE `personal` SET NombreCompleto='$Nombre',TituloAbreviado='$TituloAbreviado',FechaNacimiento='$Nacimiento',Sexo='$Sexo',RFC='$RFC ',CURP='$CURP',NumeroCelular='$Celular',Calle = '$Calle', NumExterior= '$NumExterior', NumInterior='$NumInterior', Fraccionamiento='$Fraccionamiento', CP='$CP', Ciudad='$Ciudad', Estado='$Estado',Email='$Email',Profesion='$Profesion',GobiernoFed='$GobiernoFed ',SEP='$SEP',RAMA='$RAMA',Interno='$Interno',ClavePresupuestal='$ClavePresupuestal',EvaluacionDepartamento='$EvaluacionDepartamento',EvaluacionAlumno='$EvaluacionAlumno',Estatus='$Estatus',FechaIngresoTec = '$FechaIngresoTec',IdNacionalidad='$Nacionalidad',IdTipoPersona='$TipoPersona',IdRegimen='$Regimen',IdDepartamento='$Departamento ',IdNivelEstudio='$NivelEstudio',IdPuesto='$Puesto',IdAreaAcademica='$AreaAcademica',IdSNI='$SNI',IdMotivoAusencia='$MotivoAusencia' WHERE `id`='$id'";
if($tpR == 1){
	if ($db->query($sql) === TRUE) {
	    header('Location: '."personal_tecnm_principal.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}
}else{
	if ($db->query($sql) === TRUE) {
	    header('Location: '."personal_tecnm_principal.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}
}


$db=null;
?> 
