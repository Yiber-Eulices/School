<?php
    include "View/template/header.php";
    include "View/template/menu.php";
?>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img  id = 'fotoEdit'src="View/images/user.png" alt="Autobuses AGA - Profile Image" />
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
                            <p id ="pRol"><?php echo($_SESSION['UserRol']);?></p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <button onclick="location.href='Login'" class="btn btn-primary btn-lg waves-effect btn-block">Cerrar Sesi&oacute;n</button>
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
                                    <form id="form_advanced_validation_edit" class="formEdit" method="POST">

                                        <input type="hidden" name="TxtIdPersonaEdit" id="TxtIdPersonaEdit">
                                        <div class="form-group form-float">
                                            <label class="form-label">Nombre</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="TxtNombreEdit" id="TxtNombreEdit" required>
                                            </div>
                                            <div class="help-info">Nombre</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Apellido</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="TxtApellidoEdit" id="TxtApellidoEdit" required>
                                            </div>
                                            <div class="help-info">Apellido</div>
                                        </div>
                                        <div class="form-group from-foto-camara form-float">
                                            <label class="form-label">Foto</label>
                                            <div class="row">
                                                <div class="col-xs-0"></div>                                                
                                                <input type="file" class="form-control-file col-xs-8"  name="TxtFotoEdit" id="TxtFotoEdit">
                                                <!--label class="col-xs-4" for="TxtFotoEdit">Seleccionar Archivo</label-->
                                                <button type="button" class="btn btnCamara btn-info btn-circle waves-effect waves-circle waves-float col-4">
                                                    <i class="material-icons">camera_alt</i>
                                                </button>  
                                                <div id="fotoCamara"></div>
                                                <div class="help-info">Foto</div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Tipo de Documento</label>
                                            <div class="form-line">
                                                <select class="form-control show-tick" style ="width:100%" name = "TxtTipoDocumentoEdit" id = "TxtTipoDocumentoEdit" required>
                                                    <option value="">-- Por favor seleccione su Tipo de Documento --</option>
                                                    <option value="CC">Cédula de Ciudadanía</option>
                                                    <option value="CE">Cédula de Extranjería</option>
                                                    <?php if($_SESSION['UserRol']=="Estudiante"){ ?>
                                                        <option value="TI">Tarjeta de Identidad</option>
                                                        <option value="RC">Registro Civil</option>                       
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="help-info">Tipo de Documento</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Documento</label>
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="TxtDocumentoEdit" id="TxtDocumentoEdit" required>
                                            </div>
                                            <div class="help-info">Documento</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Fecha de Nacimiento</label>
                                            <div class="form-line"  id="bs_datepicker_container">
                                                <input type="text" class="form-control" name="TxtFechaNacimientoEdit" id="TxtFechaNacimientoEdit" placeholder = "Mes/Dia/A&ntilde;o" required>
                                            </div>
                                            <div class="help-info">Fecha de Nacimiento</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Rh</label>
                                            <div class="form-line">
                                                <select class="form-control show-tick" style ="width:100%" name = "TxtRhEdit" id = "TxtRhEdit" required>
                                                    <option value="">-- Por favor seleccione su Rh --</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                </select>
                                            </div>
                                            <div class="help-info">Rh</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Correo</label>
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="TxtCorreoEdit" id="TxtCorreoEdit" required>
                                            </div>
                                            <div class="help-info">Correo</div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Contrase&ntilde;a</label>
                                            <div class="form-line">
                                                <input type="password" class="form-control" name="TxtPasswordEdit" id="TxtPasswordEdit">
                                            </div>
                                            <div class="help-info">Contrase&ntilde;a</div>
                                        </div>
                                        <div class ="row clearfix demo-icon-container">
                                            <div class="col-xs-10 col-sm-10 col-md-11 col-lg-11"></div>
                                            <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
                                                <div class="demo-google-material-icon" style="cursor: pointer"> <i class="material-icons iconovisibipassedit">visibility</i><span class="icon-name nameiconpassedit"></span></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <label class="form-label">Telefono</label>
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="TxtTelefonoEdit" id="TxtTelefonoEdit" required>
                                            </div>
                                            <div class="help-info">Telefono</div>
                                        </div>
                                
                                        <input type="submit" name="Enviar" class="btn btn-primary botonEdit">
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
        <!-- Modal Camera-->
        <div class="modal fade" id="ModalCamara" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Camara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- CSS -->
                <style>
                #my_camera{
                    width: 320px;
                    height: 240px;
                    border: 1px solid black;
                }
                </style>

                <div id="my_camera"style="margin: auto; width: 320px; height: 240px;"><div></div><video autoplay="autoplay" style="width: 320px; height: 240px;"></video></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btnCapturarFoto btn-primary">Capturar</button>
            </div>
            </div>
        </div>
        </div>
        <!-- End Modal Camera-->
    <script src="View/js/EveryBody/Perfil.js"></script>
<?php
    include "View/template/footer.php";
?>