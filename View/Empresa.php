<?php
    include "template/header.php";
    include "template/menu.php";
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
                                OBJETIVOS ESTRATEGÍCOS
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
                                <span>A&ntilde;adir Empresa</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableEmpresa table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Misión</th>
                                            <th>Visión</th>
                                            <th>¿Quienes somos?</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Misión</th>
                                            <th>Visión</th>
                                            <th>¿Quienes somos?</th>
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
            <h5 class="modal-title">A&ntilde;adir Objetivo estrategíco</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtMision" id="TxtMision" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Misión</label>
                    </div>
                    <div class="help-info">Misión</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtVision" id="TxtVision" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">Visión</label>
                    </div>
                    <div class="help-info">Visión</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="TxtSomos" id="TxtSomos" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                        <label class="form-label">¿Quienes somos?</label>
                    </div>
                    <div class="help-info">¿Quienes somos?</div>
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
            <h5 class="modal-title">Editar Objetivo estrategíco</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formEdit" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Misión</label>
                    <div class="form-line">
                        <textarea name="TxtMisionEdit" id="TxtMisionEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                    </div>
                    <div class="help-info">Misión</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Visión</label>
                    <div class="form-line">
                        <textarea name="TxtVisionEdit" id="TxtVisionEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                    </div>
                    <div class="help-info">Visión</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">¿Quienes somos?</label>
                    <div class="form-line">
                        <textarea name="TxtSomosEdit" id="TxtSomosEdit" cols="30" rows="5" class="form-control no-resize" required aria-required="true"></textarea>
                    </div>
                    <div class="help-info">¿Quienes somos?</div>
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
    <script src="js/Empresa.js"></script>
<?php
    include "template/footer.php";
?>