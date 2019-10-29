<?php
    include "template/header.php";
    include "template/menu.php";
?>
    <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img  id = 'fotoEdit'src="images/user.png" alt="Autobuses AGA - Profile Image" />
                                    <style>
                                        #fotoEdit{
                                            width: 200px;
                                            height: 200px;
                                        }
                                    </style>
                                </div>
                                <div class="content-area">
                                    <h3 id ="h3Nombre"></h3>
                                    <p id ="pApellido"></p>
                                    <p id ="pRol"></p>
                                </div>
                            </div>
                            <div class="profile-footer">
                                <button onclick="location.href='Login.jsp'" class="btn btn-primary btn-lg waves-effect btn-block">Cerrar Sesi&oacute;n</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="body">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Configuraci&oacute;n de perfil</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <form id="form_advanced_validation" action="Login.aga?a=update" class="formEdit" method="POST" enctype="multipart/form-data" onsubmit="return SubmitFunctionEdit()">
                                            <input type="hidden" name="TxtIdPersonaEdit" id="TxtIdPersonaEdit">
                                            <label class="form-label">Nombre</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="TxtNombreEdit" id="TxtNombreEdit" placeholder="Nombre" required>
                                                </div>
                                                <div class="help-info">Nombre</div>
                                            </div>
                                            <label class="form-label">Apellido</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="TxtApellidoEdit" id="TxtApellidoEdit" placeholder="Apellido" required>
                                                </div>
                                                <div class="help-info">Apellido</div>
                                            </div>
                                            <label class="form-label">Foto</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" name="TxtFotoEdit" id="TxtFotoEdit">
                                                </div>
                                                <div class="help-info">Foto</div>
                                            </div>
                                            <label class="form-label">C&eacute;dula de Ciudadan&iacute;a</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="TxtCedulaCiudadaniaEdit" id="TxtCedulaCiudadaniaEdit" placeholder="Cedula de Ciudadania" required>
                                                </div>
                                                <div class="help-info">C&eacute;dula de Ciudadan&iacute;a</div>
                                            </div>
                                            <label class="form-label">Rol</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="TxtRolEdit" id="TxtRolEdit" placeholder="Rol" required>
                                                </div>
                                                <div class="help-info">Rol</div>
                                            </div>
                                            <label class="form-label">Correo</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" name="TxtCorreoEdit" id="TxtCorreoEdit" placeholder="Correo" required>
                                                </div>
                                                <div class="help-info">Correo</div>
                                            </div>
                                            <label class="form-label">Contrase&ntilde;a</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="TxtContrasenaEdit" id="TxtContrasenaEdit" placeholder="Contrase&ntilde;a" required>
                                                </div>
                                                <div class="help-info">Contrase&ntilde;a</div>
                                            </div>
                                            <label class="form-label">Telefono</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="TxtTelefonoEdit" id="TxtTelefonoEdit" placeholder="Telefono" required>
                                                </div>
                                                <div class="help-info">Tel&eacute;fono</div>
                                            </div>
                                            <label class="form-label">Direcci&oacute;n</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="TxtDireccionEdit" id="TxtDireccionEdit" placeholder="Direccion" required>
                                                </div>
                                                <div class="help-info">Direcci&oacute;n</div>
                                            </div>
                                    
                                            <input type="submit" name="Enviar" class="btn btn-primary" class="botonEdit">
                                            <input type="reset" name="Reset"  class="btn btn-danger">
                                        
                                    </form>                                        
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="js/Profile.js"></script>
<?php
    include "template/footer.php";
?>