<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>

<head>
    <!-- <link rel="shortcut icon" href="#" /> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Inicio de sesión | ITA</title>

    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="libs/css/style.css"> -->
    <link rel="stylesheet" type="libs/text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
     
     <div class="container-login">
       <div class="wrap-login">
           <form method="post" class="login-form validate-form" id="formLogin" action="auth.php">
               <span class="login-form-title">Inicia Sesión</span>
               
               <div class="wrap-input100" data-validate = "Usuario incorrecto">
                   <input class="input100" type="name" id="usuario" name="username" placeholder="Usuario" autofocus required>
                   <span class="focus-efecto"></span>
               </div>
               
               <div class="wrap-input100" data-validate="Password incorrecto">
                   <input class="input100" type="password" id="password" name="password" placeholder="Password" autofocus required>
                   <span class="focus-efecto"></span>
                   <div class="input-group">
                    <span class="vista"><i id="show_password" onclick="mostrarPassword()" class="fa fa-eye-slash icon"></i></span>
                   </div>
               </div>


               <!-- <input type="checkbox" id="cb1" style="margin: 30px 10px 30px 0;" value="check"><span>Usuario administrador</span> -->
               
               <div class="container-login-form-btn">
                   <div class="wrap-login-form-btn">
                       <div class="login-form-bgbtn"></div>
                       <button type="submit" name="submit" class="login-form-btn">Acceder</button>
                   </div>
               </div>
           </form>
           <script>
                function mostrarPassword(){
                    var cambio = document.getElementById("password");
                    if(cambio.type == "password"){
                        cambio.type = "text";
                        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                    }else{
                        cambio.type = "password";
                        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                    }
                }
        </script>
       </div>
       <footer>
           <center>
        <span id="sp-foot" style="color: #FFF;"> Av. Adolfo López Mateos #1801 Ote.
               Fracc. Bona Gens C.P. 20256.
               Aguascalientes, Ags., México. Instituto Tecnológico de Aguascalientes.</span>
        </center>
    </footer> 
   </div>
       
    <script src="libs/jquery/jquery-3.3.1.min.js"></script>    
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>    
    <script src="libs/popper/popper.min.js"></script>    
       
    <!-- <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>     -->
    <!-- <script src="codigo.js"></script>     -->
   </body>
 