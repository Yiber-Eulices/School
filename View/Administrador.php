<?php
    include "template/header.php";
    include "template/menu.php";
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    
                    <small>Mas informacion en <a href="https:/www.autobusesaga.com/" target="_blank">www.autobusesaga.com</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Administradores
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#ModalCreate">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Administrador</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableAdministrador table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Tipo de Documento</th>
                                            <th>Documento</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Rh</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Tipo de Documento</th>
                                            <th>Documento</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Rh</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>                                    
                                </table>
                                <style>
                                    .imgProfile{
                                        height : 100px;
                                        width : 100px;
                                        border-radius : 50px;
                                    }
                                    .imgProfileEdit{
                                        height : 200px;
                                        width : 200px;
                                        border-radius : 100px;
                                        margin:auto;
		                                display:block;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
    <!--Modal Create -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalCreate">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">A&ntilde;adir Administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtNombre" id="TxtNombre" >
                        <label class="form-label">Nombre</label>
                    </div>
                    <div class="help-info">Nombre</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtApellido" id="TxtApellido" >
                        <label class="form-label">Apellido</label>
                    </div>
                    <div class="help-info">Apellido</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="file" class="form-control" name="TxtFoto" id="TxtFoto" >
                        <label class="form-label">Foto</label>
                    </div>
                    <div class="help-info">Foto</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="date" class="form-control" name="TxtFechaNacimiento" id="TxtFechaNacimiento" >
                        <label class="form-label">Fecha de Nacimiento</label>
                    </div>
                    <div class="help-info">Fecha de Nacimiento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select class="form-control show-tick" name = "TxtTipoDocumento" id = "TxtTipoDocumento">
                            <option value="">-- Por favor seleccione su Tipo de Documento --</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                        <label class="form-label">Tipo de Documento</label>
                    </div>
                    <div class="help-info">Tipo de Documento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtDocumento" id="TxtDocumento" >
                        <label class="form-label">Documento</label>
                    </div>
                    <div class="help-info">Documento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select class="form-control show-tick" name = "TxtRh" id = "TxtRh">
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
                        <label class="form-label">Rh</label>
                    </div>
                    <div class="help-info">Rh</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtCorreo" id="TxtCorreo" >
                        <label class="form-label">Correo</label>
                    </div>
                    <div class="help-info">Correo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" name="TxtPassword" id="TxtPassword" >
                        <label class="form-label">Contrase&ntilde;a</label>
                    </div>
                    <div class="help-info">Contrase&ntilde;a</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtTelefono" id="TxtTelefono" >
                        <label class="form-label">Telefono</label>
                    </div>
                    <div class="help-info">Telefono</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="Enviar" class="btn btn-primary botonCreate">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Create -->
    <!--Modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" id="ModalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formEdit" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <img class = "imgProfileEdit" id = "imgProfileEdit" src="">
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtNombreEdit" id="TxtNombreEdit" >
                        <label class="form-label">Nombre</label>
                    </div>
                    <div class="help-info">Nombre</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtApellidoEdit" id="TxtApellidoEdit" >
                        <label class="form-label">Apellido</label>
                    </div>
                    <div class="help-info">Apellido</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="file" class="form-control" name="TxtFotoEdit" id="TxtFotoEdit" >
                        <label class="form-label">Foto</label>
                    </div>
                    <div class="help-info">Foto</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="date" class="form-control" name="TxtFechaNacimientoEdit" id="TxtFechaNacimientoEdit" >
                        <label class="form-label">Fecha de Nacimiento</label>
                    </div>
                    <div class="help-info">Fecha de Nacimiento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select class="form-control show-tick" name = "TxtTipoDocumentoEdit" id = "TxtTipoDocumentoEdit">
                            <option value="">-- Por favor seleccione su Tipo de Documento --</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                        <label class="form-label">Tipo de Documento</label>
                    </div>
                    <div class="help-info">Tipo de Documento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtDocumentoEdit" id="TxtDocumentoEdit" >
                        <label class="form-label">Documento</label>
                    </div>
                    <div class="help-info">Documento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <select class="form-control show-tick" name = "TxtRhEdit" id = "TxtRhEdit">
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
                        <label class="form-label">Rh</label>
                    </div>
                    <div class="help-info">Rh</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtCorreoEdit" id="TxtCorreoEdit" >
                        <label class="form-label">Correo</label>
                    </div>
                    <div class="help-info">Correo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="password" class="form-control" name="TxtPasswordEdit" id="TxtPasswordEdit" >
                        <label class="form-label">Contrase&ntilde;a</label>
                    </div>
                    <div class="help-info">Contrase&ntilde;a</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtTelefonoEdit" id="TxtTelefonoEdit" >
                        <label class="form-label">Telefono</label>
                    </div>
                    <div class="help-info">Telefono</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" IdAdministrador name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="js/Administrador.js"></script>
<?php
    include "template/footer.php";
?>