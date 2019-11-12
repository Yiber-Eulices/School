<?php
    session_start();
    session_destroy();
?>    
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login</title>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="css/GoogleFontsFamily.css" rel="stylesheet" type="text/css">
    <link href="css/GoogleFontsFamilyIcon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!--sweetalert-->
    <link href="sweetalert/sweetalert.min.css" rel="stylesheet" />

    <!-- Bootstrap Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>

<body class="login-page bg-red">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">SCHOOL <b>ADMIN</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" onsubmit="return false">
                    <div class="msg">Inicie sesión para ingresar</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <select class="form-control show-tick" style ="width:100%"  name = "TxtRol" id = "TxtRol">
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
                            <input type="text" class="form-control" name = "TxtUser" id = "TxtUser" placeholder="Email"  autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name = "TxtPassword" id = "TxtPassword" placeholder="Contraseña" >
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <button class="btn btnLogin bg-red">INGRESAR</button>
                            <input class="btn bg-red" onclick="location='Index.php'"  type="button" name="Submit" value="ATRÁS" />
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        
                        <div class="col-xs-6 align-right">
                            <a href="ForgotPassword.php" class="col-red">Olvidó su contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Select2 Plugin Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>

    <!--sweetalert-->
    <script src="sweetalert/sweetalert.min.js"></script>
    <script src="sweetalert/mensajesweetalert.js"></script>

    <script src="js/Login.js"></script>
</body>

</html>