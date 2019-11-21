<!DOCTYPE html>
<html  lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>School Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="View/images/logo.png" type="image/x-icon">

    <!-- Jquery Core Js -->
    <script src="View/plugins/jquery/jquery.min.js"></script>

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

<body class="fp-page bg-red">
    <div class="fp-box">
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
                <form id="forgot_password" method="POST">
                    <div class="msg">                        
                        Ingrese su Rol y dirección de correo electrónico que utilizó para registrarse. Le enviaremos un correo electrónico con su nueva contraseña.
                    </div>
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

                    <button class="btn btnRecuperar btn-block btn-lg bg-red  waves-effect" type="submit">REESTABLECER MI CONTRASEÑA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="Login" class="col-red">Ingresar!</a>
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
    <script src="View/js/pages/examples/forgot-password.js"></script>

    <!--sweetalert-->
    <script src="View/sweetalert/sweetalert.min.js"></script>
    <script src="View/sweetalert/mensajesweetalert.js"></script>

    <script src="View/js/EveryBody/ForgotPassword.js"></script>
</body>

</html>