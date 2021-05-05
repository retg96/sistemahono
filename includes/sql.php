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
  $sql  = sprintf("SELECT id,clave,password,nivel_usuario FROM usuarios WHERE clave ='%s' LIMIT 1", $username);
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
  $sql = "UPDATE usuarios SET ultimo_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
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
      $current_user = find_by_id('usuarios',$user_id);
    }
  }
  return $current_user;
}

