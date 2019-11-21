<?php
    include "View/template/header.php";
    include "View/template/menu.php";
?>
<section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <h2>                    
                    SCHOOL ADMIN
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Información Institucional
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
                                <span>A&ntilde;adir Información</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableInformacion table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descripción</th>
                                            <th>Ubicación</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Descripción</th>
                                            <th>Ubicación</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
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
            <h5 class="modal-title">A&ntilde;adir Información</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtDescripcion" id="TxtDescripcion" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Descripción</label>
                    </div>
                    <div class="help-info">Descripción</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtUbicacion" id="TxtUbicacion" required>
                        <label class="form-label">Ubicación</label>
                    </div>
                    <div class="help-info">Ubicación</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtCorreo" id="TxtCorreo" required>
                        <label class="form-label">Correo</label>
                    </div>
                    <div class="help-info">Correo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtTelefono" id="TxtTelefono" required>
                        <label class="form-label">Teléfono</label>
                    </div>
                    <div class="help-info">Teléfono</div>
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
    <div class="modal fade" role="dialog" id="ModalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Información</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Descripción</label>
                    <div class="form-line">
                        <textarea name="TxtDescripcionEdit" id="TxtDescripcionEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>    
                    </div>
                    <div class="help-info">Descripción</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Ubicación</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtUbicacionEdit" id="TxtUbicacionEdit" required>                        
                    </div>
                    <div class="help-info">Ubicación</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Correo</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtCorreoEdit" id="TxtCorreoEdit" required>                        
                    </div>
                    <div class="help-info">Correo</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Teléfono</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtTelefonoEdit" id="TxtTelefonoEdit" required>                        
                    </div>
                    <div class="help-info">Teléfono</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" IdEstudiante name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="View/js/Administrator/Informacion.js"></script>
<?php
    include "View/template/footer.php";
?>