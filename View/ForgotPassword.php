<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

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

<body class="fp-page bg-red">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">SCHOOL <b>ADMIN</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" onsubmit="return FormSubmit()">
                    <div class="msg">                        
                        Ingrese su Rol y dirección de correo electrónico que utilizó para registrarse. Le enviaremos un correo electrónico con su nueva contraseña.
                    </div>
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

                    <button class="btn btnRecuperar btn-block btn-lg bg-red  waves-effect" type="submit">REESTABLECER MI CONTRASEÑA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="Login.php" class="col-red">Ingresar!</a>
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
    <script src="js/pages/examples/forgot-password.js"></script>

    <!--sweetalert-->
    <script src="sweetalert/sweetalert.min.js"></script>
    <script src="sweetalert/mensajesweetalert.js"></script>

    <script src="js/ForgotPassword.js"></script>
</body>

</html>