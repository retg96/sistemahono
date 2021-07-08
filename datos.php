<?php 
require_once('includes/load.php');
$subdireccion=$_POST['idsubdireccion'];
    
	$sql="SELECT id,
			 IdSubdireccion,
			 Hijo 
		FROM hijo 
		WHERE IdSubdireccion='$subdireccion'";

	// $result=mysqli_query($db,$sql);
    $result = $db->query($sql);

	$cadena="<label>Hijo</label> 
			<select class='form-control' id='lista2' name='lista2'>
            <option value=''>Selecciona una Opcion</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver["0"].'>'.utf8_encode($ver["2"]).'</option>';
	}

	echo  $cadena."</select>";
	

?>