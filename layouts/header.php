<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <?php if (!empty($page_title))
      echo remove_junk($page_title);
      elseif(!empty($user))
      echo ucfirst($user['clave']);
      else echo "Hola";?>
    </title>

    <!-- <script type="text/javascript" src="libs/js/jquery-3.3.1.min.js"></script> -->

    <!-- cached version -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="libs/css/datepicker3.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/css/style_menu.css">


    <!--DATATABLES-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <!-- main -->
    <!-- <link rel="stylesheet" href="libs/css/main.css" /> -->

  </head>
  <body>
  <?php if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
      <!-- <div class="logo pull-left">Inventario</div> -->
      <!-- <div class="header-content"> -->
      <!-- <div class="header-date pull-left">
        <strong>
          <?php echo date("d/m/Y");?>    
        </strong>
      </div> -->
      <div class="usuario_menu">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <!-- <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline"> -->
              <span style="color:white;"><?php echo remove_junk(ucfirst($user['clave'])); ?> <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
              <li>
                  <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                  </a>
              </li>
             <li>
                 <a href="edit_account.php" title="edit account">
                     <i class="glyphicon glyphicon-cog"></i>
                     Configuración
                 </a>
             </li>
             <li class="last">
                 <a href="logout.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Salir
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>
    <div class="sidebar">
      <?php if($user['nivel_usuario'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('admin_menu.php');?>

      <?php elseif($user['nivel_usuario'] === '2'): ?>
        <!-- Special user -->
      <?php include_once('special_menu.php');?>

      <?php elseif($user['nivel_usuario'] >= '3'): ?>
        <!-- User menu -->
      <?php include_once('user_menu.php');?>

      <?php endif;?>
   </div>
<?php endif;?>

<div class="page">
  <div class="container-fluid">