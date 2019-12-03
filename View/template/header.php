<?php 
    include("View/EveryBody/LogoutTime.php");
    if(!isset($_SESSION['UserRol'])){
        header("Location: Login");
    }else if(isLoginSessionExpired()) {
        header("Location: Login");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>School Admin</title>
    
    <!-- Jquery Core Js -->
    <script src="View/plugins/jquery/jquery.min.js"></script>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/datatables.min.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/buttons.bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen"href="View/DataTable/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" media="screen"href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.dataTables.min.css">
    
    <!-- Favicon-->
    <link rel="icon" href="View/images/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="View/css/GoogleFontsFamily.css" rel="stylesheet" type="text/css">
    <link href="View/css/GoogleFontsFamilyIcon.css" rel="stylesheet" type="text/css">
    <link href="View/css/Importante.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="View/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="View/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="View/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="View/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="View/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="View/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="View/plugins/Select2/select2.min.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="View/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="View/css/themes/all-themes.css" rel="stylesheet" />

    <!--sweetalert-->
    <link href="View/sweetalert/sweetalert.min.css" rel="stylesheet" />
    
    
</head>


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
            <p>Please wait...</p>
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
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-countt">0</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu menuNotifications">
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="MiNotificacion">Ver todas las notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <!-- Default Size -->
    <div class="modal fade" id="ModalAlerta" idAlerta tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="TitleModalAlert"></h4>
                </div>
                <div class="modal-body" id="TextModalAlert"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>