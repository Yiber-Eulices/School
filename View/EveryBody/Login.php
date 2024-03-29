<?php
    session_destroy();
?>    
<!DOCTYPE html>
<html  lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>School Admin</title>

    <!-- Jquery Core Js -->
    <script src="View/plugins/jquery/jquery.min.js"></script>

    <!-- Favicon-->
    <link rel="icon" href="View/images/logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="View/css/GoogleFontsFamily.css" rel="stylesheet" type="text/css">
    <link href="View/css/GoogleFontsFamilyIcon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="View/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="View/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="View/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="View/css/style.css" rel="stylesheet">

    <!--sweetalert-->
    <link href="View/sweetalert/sweetalert.min.css" rel="stylesheet" />

</head>

<body class="login-page bg-red">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SCHOOL <b>ADMIN</b></a>
            <small>
                <span>
                    SchoolAdmin &copy;<script>document.write(new Date().getFullYear());</script>
                </span>
            </small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Inicie sesión para ingresar</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" style ="width:100%"  name = "TxtRol" id = "TxtRol" required>
                                <option value="">-- Por favor seleccione su Rol --</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Profesor">Profesor</option>
                                <option value="Acudiente">Acudiente</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name = "TxtUser" id = "TxtUser" placeholder="Email"  autofocus required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name = "TxtPassword" id = "TxtPassword" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class ="row clearfix demo-icon-container">
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="demo-google-material-icon" style="cursor: pointer"> <i class="material-icons iconovisibipass" >visibility</i><span class="icon-name nameiconpass">Ver Contrase&ntilde;a.</span></div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <button class="btn btnLogin bg-red">INGRESAR</button>
                            <input class="btn bg-red" onclick="location='/School/'"  type="button" name="Submit" value="ATRÁS" />
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        
                        <div class="col-xs-6 align-right">
                            <a href="ForgotPassword" class="col-red">Olvidó su contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core Js -->
    <script src="View/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="View/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="View/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="View/js/admin.js"></script>
    <script src="View/js/pages/examples/sign-in.js"></script>

    <!--sweetalert-->
    <script src="View/sweetalert/sweetalert.min.js"></script>
    <script src="View/sweetalert/mensajesweetalert.js"></script>

    <script src="View/js/EveryBody/Login.js"></script>
</body>

</html>