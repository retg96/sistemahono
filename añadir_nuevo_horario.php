<?php
require_once('includes/load.php');
$id = $_POST["id"];
$nosie = $_POST["nosie"];
$grupo=$_POST["grupo"];
$materia = $_POST["materia"];
$modalidad = $_POST["modalidad"];
$lunesHoraI = $_POST["LunesHoraI"];
$lunesHoraF = $_POST["LunesHoraF"];
$martesHoraI = $_POST["MartesHoraI"];
$martesHoraF = $_POST["MartesHoraF"];
$miercolesHoraI = $_POST["MiercolesHoraI"];
$miercolesHoraF = $_POST["MiercolesHoraF"];
$juevesHoraI = $_POST["JuevesHoraI"];
$juevesHoraF = $_POST["JuevesHoraF"];
$viernesHoraI = $_POST["ViernesHoraI"];
$viernesHoraF = $_POST["ViernesHoraF"];
$sabadoHoraI = $_POST["SabadoHoraI"];
$sabadoHoraF = $_POST["SabadoHoraF"];
$domingoHoraI = $_POST["DomingoHoraI"];
$domingoHoraF = $_POST["DomingoHoraF"];
$aula = $_POST["aula"];

$cont=0;
$hM=0;

// if(($lunesHoraI != "" && $lunesHoraF == "")||($lunesHoraI == "" && $lunesHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en LUNES. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($lunesHoraI);
// 	$h2= new DateTime($lunesHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa LUNES. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa LUNES. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }


// if(($martesHoraI != "" && $martesHoraF == "")||($martesHoraI == "" && $martesHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en MARTES. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($martesHoraI);
// 	$h2= new DateTime($martesHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa MARTES. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa MARTES. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }


// if(($miercolesHoraI != "" && $miercolesHoraF == "")||($miercolesHoraI == "" && $miercolesHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en MIERCOLES. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($miercolesHoraI);
// 	$h2= new DateTime($miercolesHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa MIERCOLES. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa MIERCOLES. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }

// if(($juevesHoraI != "" && $juevesHoraF == "")||($juevesHoraI == "" && $juevesHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en JUEVES. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($juevesHoraI);
// 	$h2= new DateTime($juevesHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa JUEVES. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa JUEVES. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }


// if(($viernesHoraI != "" && $viernesHoraF == "")||($viernesHoraI == "" && $viernesHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en VIERNES. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($viernesHoraI);
// 	$h2= new DateTime($viernesHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa VIERNES. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa VIERNES. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }




// if(($sabadoHoraI != "" && $sabadoHoraF == "")||($sabadoHoraI == "" && $sabadoHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en SABADO. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($sabadoHoraI);
// 	$h2= new DateTime($sabadoHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa SABADO. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa SABADO. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }



// if(($domingoHoraI != "" && $domingoHoraF == "")||($domingoHoraI == "" && $domingoHoraF != "")){
// 	echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Debes especificar una hora de entrada y otra de salida en DOMINGO. ");window.history.back();</script>';
// }else{
// 	$h1= new DateTime($domingoHoraI);
// 	$h2= new DateTime($domingoHoraF);

// 	if($h1 == $h2){
// 		echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser diferente a tu hora de salida, porfavor checa DOMINGO. ");window.history.back();</script>';
	 	
// 	}else{
// 		if($h1 > $h2){
// 			echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar.Tu hora de entrada debe ser menor a tu hora de salida, porfavor checa DOMINGO. ");window.history.back();</script>';
	 	
// 		}else{
// 			$horasD = $h1->diff($h2); 
// 			$horasdiarias = $horasD->format('%H');
// 			$cont+=$horasdiarias;
// 		}
// 	}
// }




$result=$db->query('SELECT * FROM Materia WHERE id="'.$materia.'"')or die(mysqli_error());
// 'SELECT * FROM personaloperativo WHERE id="'.$f['IdPersonalOperativo'].'"'
while($f=mysqli_fetch_array($result)) {
		$hM=$f['HorasTeoricas']+$f['HorasPracticas'];
}

if ($cont!= $hM){
    
    echo '<script  type="text/javascript" language="javascript">alert("Lo sentimos la tarea no se puede realizar porque el numero de hora selccionadas no coincide con el numero de horas de la materia. DEBES SELECCIONAR '.$hM.' ");window.history.back();</script>';
}else{
	
	$sql = "INSERT INTO horariodocentemateria (IdConvenio,Grupo,LunesHoraI,MartesHoraI,MiercolesHoraI,JuevesHoraI,ViernesHoraI,SabadoHoraI,DomingoHoraI,LunesHoraF,MartesHoraF,MiercolesHoraF,JuevesHoraF,ViernesHoraF,SabadoHoraF,DomingoHoraF,Aula,IdMateria,IdModalidad)VALUES('$id','$grupo','$lunesHoraI','$martesHoraI','$miercolesHoraI','$juevesHoraI','$viernesHoraI','$sabadoHoraI','$domingoHoraI','$lunesHoraF','$martesHoraF','$miercolesHoraF','$juevesHoraF','$viernesHoraF','$sabadoHoraF','$domingoHoraF','$aula','$materia','$modalidad')";

	if ($db->query($sql) === TRUE) {
	    header('Location: '."horario_perso_detalles.php?id=$id");
	} else {
	    echo "Error: " . $sql . "<br>" . $db->error;
	}

	$db=null;

}

?>
