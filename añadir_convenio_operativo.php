<?php
require_once('includes/load.php');
$id = $_POST["id"];
$Inicio = $_POST["FechaInicio"];
$Fin = $_POST["FechaFin"];


$b="f";
if(strtotime($Inicio) >= strtotime($Fin) ){
	 echo '<script  type="text/javascript" language="javascript">alert("ERROR EN FECHAS, INTENTALO DE NUEVO: Tu fecha de inicio debe ser menor a tu fecha final. ");window.history.back();</script>';
	
}else{

	$fecha=$db->query('SELECT * FROM convenioope WHERE IdPersonalOperativo ='.$id.'')or die(mysqli_error());
	while($f=mysqli_fetch_array($fecha)) {

		if(strtotime($Inicio) >= strtotime($f['FechaInicio']) && strtotime($Inicio) <= strtotime($f['FechaFin'])){
			$b="v";
			}
	}

	if($b=="f"){
		$sql = "INSERT INTO convenioope (FechaInicio,FechaFin,IdPersonalOperativo)VALUES('$Inicio','$Fin','$id')";

		if ($db->query($sql) === TRUE) {
		    header('Location: '."convenio_ope_detalles.php?id=$id");
		} else {
		    echo "Error: " . $sql . "<br>" . $db->error;
		}
	}else{
		echo '<script  type="text/javascript" language="javascript">alert("ERROR EN FECHAS, INTENTALO DE NUEVO: Existe un cruce de fechas, por favor verifica que no haya un convenio existente con esas fechas. ");window.history.back();</script>';
	}
	
}








$conexion->close();
?>
