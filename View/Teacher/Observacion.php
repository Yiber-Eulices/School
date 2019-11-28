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
                                Observaciones de el Estudiante <b><?php echo $_SESSION['EstudianteNombre'];?></b>.
                            </h2>
                            
                        </div>
                        <div class="body">
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#ModalCreate">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Observacion</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableCurso table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Gravedad</th>
                                            <th>Descripcion</th>
                                            <th>Compromiso</th>
                                            <th>Profesor</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Gravedad</th>
                                            <th>Descripcion</th>
                                            <th>Compromiso</th>
                                            <th>Profesor</th>
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
            <h5 class="modal-title">A&ntilde;adir Observacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
            <div class="modal-body">
                <input type="hidden" name="TxtEstudiante" id="TxtEstudiante" value="<?php echo($_SESSION['EstudianteId']);?>">
                <input type="hidden" name="TxtProfesor" id="TxtProfesor" value="<?php echo($_SESSION['UserId']);?>">
                <div class="form-group form-float">
                    <label class="form-label">Gravedad</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtGravedad" id = "TxtGravedad" required>
                            <option value="">-- Por favor seleccione la Gravedad de la Observacion --</option>
                            <option value="Leve">Leve</option>
                            <option value="Grave">Grave</option>
                        </select>
                    </div>
                    <div class="help-info">Gravedad</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtDescripcion" id="TxtDescripcion" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Descripci&oacute;n</label>
                    </div>
                    <div class="help-info">Descripci&oacute;n</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtCompromiso" id="TxtCompromiso" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Compromiso</label>
                    </div>
                    <div class="help-info">Compromiso</div>
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
            <h5 class="modal-title">Editar Observacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formEdit" method="POST">
            <div class="modal-body">
                <input type="hidden" name="TxtEstudianteEdit" id="TxtEstudianteEdit" value="<?php echo($_SESSION['EstudianteId']);?>">
                <input type="hidden" name="TxtProfesorEdit" id="TxtProfesorEdit" value="<?php echo($_SESSION['UserId']);?>">
                <div class="form-group form-float">
                    <label class="form-label">Gravedad</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtGravedadEdit" id = "TxtGravedadEdit" required>
                            <option value="">-- Por favor seleccione la Gravedad de la Observacion --</option>
                            <option value="Leve">Leve</option>
                            <option value="Grave">Grave</option>
                        </select>
                    </div>
                    <div class="help-info">Gravedad</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtDescripcionEdit" id="TxtDescripcionEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Descripci&oacute;n</label>
                    </div>
                    <div class="help-info">Descripci&oacute;n</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtCompromisoEdit" id="TxtCompromisoEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Compromiso</label>
                    </div>
                    <div class="help-info">Compromiso</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="Enviar" class="btn btn-primary botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="View/js/Teacher/Observacion.js"></script>
<?php
    include "View/template/footer.php";
?>