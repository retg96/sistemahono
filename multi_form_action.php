<?php 
include('header.php');
// include_once("db_connect.php");
require_once('includes/load.php');
?>
<!-- <?php include('./container.php');?> -->
<div class="container">
	<!-- <h2>Example: Multi Step Form using jQuery, Bootstrap and PHP</h2>		 -->
	<div class="row well alert alert-success">		
	<?php
	if (isset($_POST['submit'])) {
		$sie = mysqli_real_escape_string($conn, $_POST['sie']);	
		$name = mysqli_real_escape_string($conn, $_POST['nombre']);
		$paterno = mysqli_real_escape_string($conn, $_POST['apPat']);
		$materno = mysqli_real_escape_string($conn, $_POST['apMat']);
		$titulo = mysqli_real_escape_string($conn, $_POST['titAbre']);
		$fecha = mysqli_real_escape_string($conn, $_POST['fecNac']);
		$nacionalidad = mysqli_real_escape_string($conn, $_POST['Nac']);		
		if(mysqli_query($conn, "INSERT INTO user(email, pass, first_name, last_name, mobile, address) VALUES('".$email."', '" . $password . "', '". $first_name."', '".$last_name."', '".$mobile."', '". $address."')")) {
			echo "You're Registered Successfully!";
		} else {
			echo "Error in registering...Please try again later!";
		}
	}	
	?>	
	</div>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/multi-step-form-using-jquery-bootstrap-and-php" title="">Back to Tutorial</a>			
	</div>	
</div>	
<?php include('footer.php');?> 