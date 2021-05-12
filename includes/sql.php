<?php
require_once(LIB_PATH_INC.'load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
 * Returns the entire row of a table, matching by id.
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
  if(tableExists($table)) 
  {
    /*
    $sql_result = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
    */
    $sql  = "SELECT * FROM ".$db->escape($table);
    $sql .= " WHERE id=".$db->escape($id);
    $sql .= " LIMIT 1";
    $sql_result = $db->query($sql);
    if( $result = $db->fetch_assoc($sql_result) )
      return $result;
    else
      return NULL;
  }
  else
    return NULL;
}

/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
  {
    $sql  = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? TRUE : FALSE;
  }
  return NULL;
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $sql_result = $db->query($sql);
    return $db->fetch_assoc($sql_result);
  }
  else
    return NULL;
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
  if($table_exit) {
    if($db->num_rows($table_exit) > 0)
      return TRUE;
    else
      return FALSE;
  }
}



 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
// function authenticate($username='', $password='') {
//   global $db;
//   $username = $db->escape($username);
//   $password = $db->escape($password);
//   $sql  = sprintf("SELECT id,clave,password,rol_usuario FROM usuarios WHERE clave ='%s' LIMIT 1", $username);
//   $result = $db->query($sql);
//   if($db->num_rows($result)){
//     $user = $db->fetch_assoc($result);
//     $password_request = sha1($password);
//     if($password_request === $user['password'] ){
//       return $user['id'];
//     }
//   }
//  return FALSE;
// }

function authenticate($username='', $password='') {
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  $sql  = sprintf("SELECT id,clave,password,nivel_usuario FROM users WHERE clave ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if($db->num_rows($result)){
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if($password_request === $user['password'] ){
      return $user['id'];
    }
  }
 return FALSE;
}

/*--------------------------------------------------------------*/
/* Function to update the last log in of a user
/*--------------------------------------------------------------*/

function updateLastLogIn($user_id)
{
	global $db;
  $date = make_date();
  $sql = "UPDATE users SET ultimo_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? TRUE : FALSE);
}


/*--------------------------------------------------------------*/
/* Find current log in user by session id
/*--------------------------------------------------------------*/
function current_user(){
  static $current_user;
  global $db;
  if( !$current_user ) {
    if(isset($_SESSION['user_id'])) {
      $user_id = intval($_SESSION['user_id']);
      $current_user = find_by_id('users',$user_id);
    }
  }
  return $current_user;
}

/*--------------------------------------------------------------*/
/* Find all Group name
/*--------------------------------------------------------------*/
function find_by_groupName($val)
{
  global $db;
  $sql = "SELECT nomb_gpo FROM grupos_usuarios WHERE nomb_gpo = '{$db->escape($val)}' LIMIT 1 ";
  $result = $db->query($sql);
  return($db->num_rows($result) === 0 ? TRUE : FALSE);
}
/*--------------------------------------------------------------*/
/* Find group level
/*--------------------------------------------------------------*/
function find_by_groupLevel($level)
{
  global $db;
  //$sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
  $sql = "SELECT * FROM grupos_usuarios WHERE nivel_gpo = '{$db->escape($level)}' LIMIT 1 ";
  $result = $db->query($sql);
  //return($db->num_rows($result) === 0 ? TRUE : FALSE);
  return $result->fetch_assoc();
}

/*--------------------------------------------------------------*/
/* Function for checking which user level has access to page
/*--------------------------------------------------------------*/
function page_require_level($required_level) {
  global $session;
  $current_user = current_user();

  /* caution */
  /* === === */
  if ( !$current_user ) {
    redirect('home.php',FALSE);
    return FALSE;
  }
  $login_group = find_by_groupLevel($current_user['nivel_usuario']);

  // if user is not logged in
  if (!$session->isUserLoggedIn(TRUE)) {
    $session->msg('d','Por favor Iniciar sesión...');
    redirect('index.php', FALSE);
  }
  // if group status is inactive
  elseif($login_group['estatus_gpo'] === '0') {
    $session->msg('d','Este nivel de usaurio esta inactivo!');
    redirect('home.php',FALSE);
  }
  // checking if (user level) <= (required level)
  elseif($current_user['nivel_usuario'] <= (int)$required_level) {
    return TRUE;
  }
  else {
    $session->msg("d", "¡Lo siento! no tienes permiso para ver la página.");
    redirect('home.php', FALSE);
  }
}

function personal(){
  global $db;
  $results = array();
  $sql = "SELECT id,NoSie,Nombre,ApPat,ApMat,FechaNacimiento,RFC, CURP,NumeroCelular FROM personal";
 // $sql .="g.group_proveedores ";
//$sql .="FROM proveedores u ";
  //$sql .="LEFT JOIN proveedores_groups g ";
  //$sql .="ON g.group_level=u.proveedores_level ORDER BY u.name ASC";
  $result = find_by_sql($sql);
  return $result;
}

function nacionalidades(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM nacionalidad";
  $result = find_by_sql($sql);
  return $result;
}

function estudios(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM nivelestudio";
  $result = find_by_sql($sql);
  return $result;
}

function puestos(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM puesto";
  $result = find_by_sql($sql);
  return $result;
}

function regimenes(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM regimen";
  $result = find_by_sql($sql);
  return $result;
}

function tip_persona(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM tipopersona";
  $result = find_by_sql($sql);
  return $result;
}

function areas_aca(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM areaacademica";
  $result = find_by_sql($sql);
  return $result;
}

function departamentos(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM departamento";
  $result = find_by_sql($sql);
  return $result;
}

function sni(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM sni";
  $result = find_by_sql($sql);
  return $result;
}

function ausencia(){
  global $db;
  $results = array();
  $sql = "SELECT * FROM motivoausencia";
  $result = find_by_sql($sql);
  return $result;
}

function find_all_personal(){
  global $db;
  $sql =" SELECT e.id,e.NoSie,e.Nombre,e.ApPat,e.ApMat,e.TituloAbreviado,e.Puesto, p.TipoPersona, r.Regimen, d.Departamento, a.AreaAcademica, s.SNI, m.MotivoAusencia"; 
  $sql .=" FROM personal e"; 
  $sql .=" INNER JOIN tipopersona p ON e.IdTipoPersona = p.id"; 
  $sql .=" INNER JOIN regimen r ON e.IdRegimen = r.id"; 
  $sql .=" INNER JOIN departamento d ON e.IdDepartamento = d.id"; 
  $sql .=" INNER JOIN areaacademica a ON e.IdAreaAcademica=a.id"; 
  $sql .=" INNER JOIN sni s ON e.IdSNI = s.id"; 
  $sql .=" INNER JOIN motivoausencia m ON e.IdMotivoAusencia = m.id"; 
  $sql .=" WHERE e.NoSie NOT LIKE '' "; 
  $sql .=" ORDER By e.NoSie ASC";

  $result = find_by_sql($sql);
  return $result;
  // return $result;
}