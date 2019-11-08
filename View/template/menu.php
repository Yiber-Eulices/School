<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
                <p>Un momento, por favor...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="Home.php">SCHOOL ADMIN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">0</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICACIONES</li>
                            <li class="body">
                                <ul class="menu">
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="MisNotificaciones.php">Ver todas las notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    
                    </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $_SESSION['UserFoto'];?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['UserNombre'];?></div>
                    <div class="email"><?php echo $_SESSION['UserCorreo'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="Perfil.php"><i class="material-icons">person</i>Perfil</a></li>
                            
                            <li><a href="Login.php"><i class="material-icons">input</i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENÚ DE NAVEGACIÓN</li>
                    <li  class="active">
                        <a href="Home.php">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <?php if($_SESSION['UserRol']=="Acudiente"){ ?>
                        <li>
                            <a href="MisHijos.php">
                                <i class="material-icons">group</i>
                                <span>Mis Hijos</span>
                            </a>
                        </li>
                        <li>
                            <a href="Profesores.php">
                                <i class="material-icons">group</i>
                                <span>Profesores</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisNotificaciones.php">
                                <i class="material-icons">notifications</i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                    <?php } ?>                 
                    <?php if($_SESSION['UserRol']=="Administrador"){ ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">group</i>
                                <span>Personal</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="Acudiente.php">Acudientes</a>
                                </li>
                                <li>
                                    <a href="Administrador.php">Administradores</a>
                                </li>
                                <li>
                                    <a href="Estudiante.php">Estudiantes</a>
                                </li>
                                <li>
                                    <a href="Profesor.php">Profesores</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="Materia.php">
                                <i class="material-icons">rate_review</i>
                                <span>Materias</span>
                            </a>
                        </li>
                        <li>
                            <a href="Grado.php">
                                <i class="material-icons">filter_9_plus</i>
                                <span>Grados</span>
                            </a>
                        </li>
                        <li>
                            <a href="Curso.php">
                                <i class="material-icons">domain</i>
                                <span>Cursos</span>
                            </a>
                        </li>
                        <li>
                            <a href="Matricula.php">
                                <i class="material-icons">assignment</i>
                                <span>Matriculas</span>
                            </a>
                        </li> 
                        <li>
                            <a href="Evento.php">
                                <i class="material-icons">date_range</i>
                                <span>Eventos</span>
                            </a>
                        </li>  
                        <li>
                            <a href="Directivo.php">
                                <i class="material-icons">supervisor_account</i>
                                <span>Directivos</span>
                            </a>
                        </li>  
                        <li>
                            <a href="Empresa.php">
                                <i class="material-icons">local_library</i>
                                <span>Objetivos Estrategicos</span>
                            </a>
                        </li>
                        <li>
                            <a href="Informacion.php">
                            <i class="material-icons">edit</i>
                                <span>Información</span>
                            </a>
                        </li>
                        <li>
                            <a href="Calificacion.php">
                                <i class="material-icons">description</i>
                                <span>Calificaciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisNotificaciones.php">
                                <i class="material-icons">notifications</i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="Notificacion.php">
                                <i class="material-icons">person notifications_active</i>
                                <span>Notificar a una Persona</span>
                            </a>
                        </li>
                    <?php } ?>                    
                    <?php if($_SESSION['UserRol']=="Estudiante"){ ?>
                        <li>
                            <a href="MisPadres.php">
                                <i class="material-icons">group</i>
                                <span>Mis Padres</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisProfesores.php">
                                <i class="material-icons">group</i>
                                <span>Mis Profesores</span>
                            </a>
                        </li>
                        <li>
                            <a href="Hijos.php">
                                <i class="material-icons">book</i>
                                <span>Mis Calificaciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisNotificaciones.php">
                                <i class="material-icons">notifications</i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($_SESSION['UserRol']=="Profesor"){ ?>
                        <li>
                            <a href="Estudiante.php">
                                <i class="material-icons">group</i>
                                <span>Estudiantes</span>
                            </a>
                        </li>
                        <li>
                            <a href="Acudiente.php">
                                <i class="material-icons">group</i>
                                <span>Padres de Familia</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisCursos.php">
                                <i class="material-icons">group</i>
                                <span>Mis Cursos</span>
                            </a>
                        </li>
                        <li>
                            <a href="MisNotificaciones.php">
                                <i class="material-icons">notifications</i>
                                <span>Notificaciones</span>
                            </a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!--<div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>-->
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
      
        <!-- #END# Right Sidebar -->
    </section>
