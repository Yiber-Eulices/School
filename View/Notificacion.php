<?php
    include "template/header.php";
    include "template/menu.php";
?>
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Notificaciones
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
                                <span>A&ntilde;adir Notificacion</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableAlerta table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rol</th>
                                            <th>IdPersona</th>
                                            <th>Fecha</th>
                                            <th>Titulo</th>
                                            <th>Mensaje</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Rol</th>
                                            <th>IdPersona</th>
                                            <th>Fecha</th>
                                            <th>Titulo</th>
                                            <th>Mensaje</th>
                                            <th>Estado</th>
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
    <div class="modal fade" role="dialog" id="ModalCreate">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">A&ntilde;adir Notificacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Rol</label>
                    <div class="form-line">
                        <select class="form-control show-tick TxtRolPersona" style ="width:100%" name = "TxtRolPersona" id = "TxtRolPersona">
                            <option value="">-- Por favor seleccione el Rol --</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Acudiente">Acudiente</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="help-info">Rol</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Persona</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdPersona" id = "TxtIdPersona">
                            <option value="">-- Por favor seleccione la Persona --</option>
                        </select>
                    </div>
                    <div class="help-info">Persona</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Fecha</label>
                    <div class="form-line">
                        <input type="date" class="form-control" name="TxtFecha" id="TxtFecha" >
                    </div>
                    <div class="help-info">Fecha</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtTitulo" id="TxtTitulo" >
                        <label class="form-label">Titulo</label>
                    </div>
                    <div class="help-info">Titulo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtMensaje" id="TxtMensaje" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                         <label class="form-label">Mensaje</label>
                    </div>
                    <div class="help-info">Mensaje</div>
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
            <h5 class="modal-title">Editar Notificacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formEdit" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Rol</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtRolPersonaEdit" id = "TxtRolPersonaEdit">
                            <option value="">-- Por favor seleccione el Rol --</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Acudiente">Acudiente</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="help-info">Rol</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Persona</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdPersonaEdit" id = "TxtIdPersonaEdit">
                            <option value="">-- Por favor seleccione la Persona --</option>
                        </select>
                    </div>
                    <div class="help-info">Persona</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Fecha</label>
                    <div class="form-line">
                        <input type="date" class="form-control" name="TxtFechaEdit" id="TxtFechaEdit" >
                    </div>
                    <div class="help-info">Fecha</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Titulo</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtTituloEdit" id="TxtTituloEdit" >
                    </div>
                    <div class="help-info">Titulo</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Mensaje</label>
                    <div class="form-line">
                        <textarea name="TxtMensajeEdit" id="TxtMensajeEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                    </div>
                    <div class="help-info">Mensaje</div>
                </div>
                <div class="form-group form-float">                    
                    <label class="form-label">Estado</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtEstadoEdit" id = "TxtEstadoEdit">
                            <option value="">-- Por favor seleccione el Estado --</option>
                            <option value="Visto">Visto</option>
                            <option value="Sin Ver">Sin Ver</option>
                        </select>
                    </div>
                    <div class="help-info">Estado</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" IdAlerta name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="js/Alerta.js"></script>
<?php
    include "template/footer.php";
?>