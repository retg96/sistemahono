<?php 
// include_once("db_connect.php");
require_once('includes/load.php');
?>	
<?php
 	if(isset($_POST['submit'])){
		// $req_fields = array('nombre_prov','raz_soc','direccion','telefono', 'correo', 'ord_comp' );
		$req_fields = array('sie','nombre','apPat','apMat', 'titAbre', 'fecNac','nacionalidad','sexo','rfc','curp','mobile', 'address'
					,'numExt','numInt','fracc','cp','ciudad','estado','email','nivelEstudio','funcion','regimen','interno','tipopersona',
					'areaacademica','departamento','evaluacionDepartamento','evaluacionAlumno','gobiernoF','sep','rama','sni','fecIng',
					'motivoAusencia','estatus');
		validate_fields($req_fields);
		if(empty($errors)){
			$p_sie  = remove_junk($db->escape($_POST['sie']));
			$p_nombre   = remove_junk($db->escape($_POST['nombre']));
			$p_app   = remove_junk($db->escape($_POST['apPat']));
			$p_apm   = remove_junk($db->escape($_POST['apMat']));
			$p_titulo  = remove_junk($db->escape($_POST['titAbre']));
			$p_fechan  = remove_junk($db->escape($_POST['fecNac']));
			$p_nac  = remove_junk($db->escape($_POST['nacionalidad']));
			$p_sexo  = remove_junk($db->escape($_POST['sexo']));
			$p_rfc  = remove_junk($db->escape($_POST['rfc']));
			$p_curp  = remove_junk($db->escape($_POST['curp']));
			$p_mob  = remove_junk($db->escape($_POST['mobile']));
			$p_add  = remove_junk($db->escape($_POST['address']));
			$p_nume  = remove_junk($db->escape($_POST['numExt']));
			$p_numi  = remove_junk($db->escape($_POST['numInt']));
			$p_fracc  = remove_junk($db->escape($_POST['fracc']));
			$p_cp  = remove_junk($db->escape($_POST['cp']));
			$p_cd  = remove_junk($db->escape($_POST['ciudad']));
			$p_edo  = remove_junk($db->escape($_POST['estado']));
			$p_email  = remove_junk($db->escape($_POST['email']));
			$p_nivel  = remove_junk($db->escape($_POST['nivelEstudio']));
			$p_fun  = remove_junk($db->escape($_POST['funcion']));
			$p_reg  = remove_junk($db->escape($_POST['regimen']));
			$p_int  = remove_junk($db->escape($_POST['interno']));
			$p_tip  = remove_junk($db->escape($_POST['tipopersona']));
			$p_area  = remove_junk($db->escape($_POST['areaacademica']));
			$p_dpto  = remove_junk($db->escape($_POST['departamento']));
			$p_evd  = remove_junk($db->escape($_POST['evaluacionDepartamento']));
			$p_eva  = remove_junk($db->escape($_POST['evaluacionAlumno']));
			$p_gobierno  = remove_junk($db->escape($_POST['gobiernoF']));
			$p_sep  = remove_junk($db->escape($_POST['sep']));
			$p_rama  = remove_junk($db->escape($_POST['rama']));
			$p_sni  = remove_junk($db->escape($_POST['sni']));
			$p_fi  = remove_junk($db->escape($_POST['fecIng']));
			$p_ma  = remove_junk($db->escape($_POST['motivoAusencia']));
			$p_estatus  = remove_junk($db->escape($_POST['estatus']));

			//  if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
			//    $media_id = '0';
			//  } else {
			//    $media_id = remove_junk($db->escape($_POST['product-photo']));
			//  }
			//  $date    = make_date();
			$query  = "INSERT INTO personal (";
			$query .=" NoSie,Nombre,ApPat,ApMat,TituloAbreviado,FechaNacimiento,Sexo,RFC,CURP,NumeroCelular,Calle,NumExt,NumInt,Fraccionamiento,
			CP,Ciudad,Estado,Email,Profesion,GobiernoFed,SEP,RAMA,Interno,ClavePresupuestal,EvaluacionDepartamento,EvaluacionAlumno,Estatus,
			FechaIngresoTec,IdNacionalidad,IdTipoPersona,IdRegimen,IdDepartamento,IdNivelEstudio,Puesto,IdAreaAcademica,IdSNI,IdMotivoAusencia";
			$query .=") VALUES (";
			$query .=" '{$p_name}', '{$p_soc}', '{$p_dir}', '{$p_telf}', '{$p_correo}', '{$p_comp}'";
			$query .=")";
			//  $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
			if($db->query($query)){
				echo "You're Registered Successfully!";
			// $session->msg('s',"Personal registrado exitosamente. ");
			// redirect('personal_tecnm_añadir.php.php', false);
			} else {
				echo "Error in registering...Please try again later!";
			// $session->msg('d',' Lo siento, registro falló.');
			// redirect('personal_tecnm_principal.php', false);
			}
		}

		// } else{
		// 	$session->msg("d", $errors);
		// 	redirect('personal_tecnm_añadir.php.php',false);
		// }

		}

	?>