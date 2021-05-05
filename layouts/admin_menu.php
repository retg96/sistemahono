<!-- <ul>
  <li>
    <a href="admin.php">
      <i class="glyphicon glyphicon-home"></i>
      <span>Panel de control</span>
    </a>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span>Accesos</span>
    </a>
    <ul class="nav submenu"> -->
    <!--<ul class="nav menu">--
      <!-- <li><a href="group.php">Administrar grupos</a> </li> --
      <li><a href="users.php">Administrar usuarios</a> </li>
   </ul>
  </li>

  <li>
    <a href="categorie.php" >
      <i class="glyphicon glyphicon-indent-left"></i>
      <span>Categor&iacute;as</span>
    </a>
  </li>
  <li>
   <a href="product.php" >
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Productos</span>
    </a>
  </li>
  <li>
    <ul class="nav submenu">
       <li><a href="product.php">Administrar materiales</a></li>
       <li><a href="add_product.php">Agregar materiales</a></li>
   </ul>
    </li>
    <li>
    <a href="Proveedores.php" >
      <i class="glyphicon glyphicon-user"></i>
      <span>Proveedores</span>
    </a>
  </li>
  <li>
    <a href="media.php" >
      <i class="glyphicon glyphicon-picture"></i>
      <span>Imagenes</span>
    </a>
    </li>
    <li>
    <a href="entradas.php" >
      <i class="glyphicon glyphicon-th-list"></i>
      <span>Entradas</span>
    </a>
    <li>
    <a href="sales.php" >
      <i class="glyphicon glyphicon-th-list"></i>
      <span>Salidas</span>
    </a>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-signal"></i>
       <span>Reporte de Entradas</span>
      </a>
      <ul class="nav submenu">
        <li><a href="sales_report.php">Entradas por fecha </a></li>
      </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-signal"></i>
       <span>Reporte de Salidas</span>
      </a>
      <ul class="nav submenu">
        <li><a href="sales_report.php">Salidas por fecha </a></li>
      </ul>
  </li>
</ul>-->



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="libs/fonts/icomoon/style.css">

    <link rel="stylesheet" href="libs/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="libs/css/style_menu.css">

    <!-- <title>Sidebar #8</title> -->
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">
      <div class="header-date pull-left">
        <strong>
          <?php echo date("d/m/Y");?>    
        </strong>
      </div>
        <div class="profile">
          <!-- <img src="images/person_4.jpg" alt="Image" class="img-fluid"> -->
          <img src="img/logoITA.jpg" alt="Image" class="img-fluid">
          <!-- <h3 class="name">Craig David</h3>
          <span class="country">Web Designer</span> -->
        </div>

        
        <div class="nav-menu">
          <ul>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="icon-person_outline mr-3"></span>Docente
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="personal_tecnm_principal.php">Personal</a></li>
                    <li><a href="horarios.php">Horarios</a></li>
                    <li><a href="convenios.php">Convenios</a></li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsible">
                <span class="icon-person_outline mr-3"></span>Operativo
              </a>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="personal_tecnm_operativo.php">Personal</a></li>
                    <li><a href="horarios_operativo.php">Horarios</a></li>
                    <li><a href="convenios_operativo.php">Convenios</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="collapsible">
                <span class="icon-money mr-3"></span>Pagos
              </a>

              <div id="collapseThree" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="#">Periodos de Pago</a></li>
                    <li><a href="#">Periodos Sin Pago</a></li>
                    <li><a href="#">Fecha Sin Pago</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="collapsible">
                <span class="icon-table mr-3"></span>Tablas
              </a>

              <div id="collapseFour" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="#">Puesto</a></li>
                    <li><a href="#">Área Académica</a></li>
                    <li><a href="#">Grupo Jerárquico</a></li>
                    <li><a href="#">Modalidad</a></li>
                    <li><a href="#">Motivo de Ausencia</a></li>
                    <li><a href="#">Nacionalidad</a></li>
                    <li><a href="#">Nivel de Estudios</a></li>
                    <li><a href="#">Régimen</a></li>
                    <li><a href="#">Tipo de SNI</a></li>
                    <li><a href="#">Tipo de Carrera</a></li>
                    <li><a href="#">Tipo de Persona</a></li>
                    <li><a href="#">Periodo del Semestre</a></li>
                    <li><a href="#">Formato Convenio</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="collapsible">
                <span class="icon-control_point mr-3"></span>Control
              </a>

              <div id="collapseFive" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="#">Acceso</a></li>
                    <li><a href="#">Materias</a></li>
                    <li><a href="#">Carreras</a></li>
                    <li><a href="#">Subdirecciones</a></li>
                    <li><a href="#">Departamentos</a></li>
                    <li><a href="#">Información General</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" class="collapsible">
                <span class="icon-bar-chart mr-3"></span>Estadisticas
              </a>

              <div id="collapseSix" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="#">Personal Docente</a></li>
                    <li><a href="#">Personal por Departamento</a></li>
                    <li><a href="#">Personal por Régimen</a></li>
                  </ul>
                </div>
              </div>
            </li>
            <!-- <li><a href="#"><span class="icon-notifications mr-3"></span>Pagos</a></li> -->
            <!-- <li><a href="#"><span class="icon-location-arrow mr-3"></span>Tablas</a></li> -->
            <!-- <li><a href="#"><span class="icon-pie-chart mr-3"></span>Pagos</a></li> -->
            <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
      
    </aside>
    <!-- <main>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_1.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_2.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_3.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_4.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_1.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_2.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_3.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex post-entry">
                    <div class="custom-thumbnail"> -->
                      <!-- <img src="images/person_4.jpg" alt="Image" class="img-fluid"> -->
                    <!-- </div>
                    <div class="post-content">
                      <h3>How the gut microbes you're born with affect your lifelong health</h3>
                      <div class="post-meta"><span>Posted:</span> Dec 17, 2019</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </main> -->
    <script src="libs/js/jquery-3.3.1.min.js"></script>
    <script src="libs/popper/popper.min.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
    <script src="libs/js/main.js"></script> 
  </body>
</html>

