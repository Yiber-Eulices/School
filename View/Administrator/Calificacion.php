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
                                Calificaciones
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
                                <span>A&ntilde;adir Calificacion</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableCalificacion table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Estudiante</th>
                                            <th>Materia</th>
                                            <th>Periodo</th>
                                            <th>Nota Acumulativa</th>
                                            <th>Nota Comportamental</th>
                                            <th>Evaluacion</th>
                                            <th>Auto Evaluacion</th>
                                            <th>Promedio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Estudiante</th>
                                            <th>Materia</th>
                                            <th>Periodo</th>
                                            <th>Nota Acumulativa</th>
                                            <th>Nota Comportamental</th>
                                            <th>Evaluacion</th>
                                            <th>Auto Evaluacion</th>
                                            <th>Promedio</th>
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
            <h5 class="modal-title">A&ntilde;adir Calificacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Estudiante</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdEstudiante" id = "TxtIdEstudiante" required>
                            <option value="">-- Por favor seleccione el Estudiante --</option>
                        </select>                       
                    </div>
                    <div class="help-info">Estudiante</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Materia</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdMateria" id = "TxtIdMateria" required>
                            <option value="">-- Por favor seleccione la Materia --</option>
                        </select>
                        
                    </div>
                    <div class="help-info">Materia</div>
                </div>
                <div class="form-group form-float">
                <label class="form-label">Periodo</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtPeriodo" id = "TxtPeriodo" required>
                            <option value="">-- Por favor seleccione el Periodo --</option>
                            <option value="1">1er Periodo</option>
                            <option value="2">2do Periodo</option>
                            <option value="3">3er Periodo</option>
                            <option value="4">4to Periodo</option>
                        </select>
                        
                    </div>
                    <div class="help-info">Periodo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtNotaAcumulativa" id="TxtNotaAcumulativa" required>
                        <label class="form-label">Nota Acumulativa</label>
                    </div>
                    <div class="help-info">Nota Acumulativa</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtNotaComportamental" id="TxtNotaComportamental" required>
                        <label class="form-label">Nota Comportamental</label>
                    </div>
                    <div class="help-info">Nota Comportamental</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtEvaluacion" id="TxtEvaluacion" required>
                        <label class="form-label">Evaluacion</label>
                    </div>
                    <div class="help-info">Evaluacion</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtAutoEvaluacion" id="TxtAutoEvaluacion" required>
                        <label class="form-label">Auto Evaluacion</label>
                    </div>
                    <div class="help-info">Auto Evaluacion</div>
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
            <h5 class="modal-title">Editar Calificacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Estudiante</label>                                    
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdEstudianteEdit" id = "TxtIdEstudianteEdit" required>
                            <option value="">-- Por favor seleccione el Estudiante --</option>
                        </select>
                    </div>
                    <div class="help-info">Estudiante</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Materia</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtIdMateriaEdit" id = "TxtIdMateriaEdit" required>
                            <option value="">-- Por favor seleccione la Materia --</option>
                        </select>
                       
                    </div>
                    <div class="help-info">Materia</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Periodo</label>
                    <div class="form-line">
                        <select class="form-control show-tick" style ="width:100%" name = "TxtPeriodoEdit" id = "TxtPeriodoEdit" required>
                            <option value="">-- Por favor seleccione el Periodo --</option>
                            <option value="1">1er Periodo</option>
                            <option value="2">2do Periodo</option>
                            <option value="3">3er Periodo</option>
                            <option value="4">4to Periodo</option>
                        </select>
                        
                    </div>
                    <div class="help-info">Periodo</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Nota Acumulativa</label>
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtNotaAcumulativaEdit" id="TxtNotaAcumulativaEdit" required>
                    </div>
                    <div class="help-info">Nota Acumulativa</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Nota Comportamental</label>
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtNotaComportamentalEdit" id="TxtNotaComportamentalEdit" required>
                    </div>
                    <div class="help-info">Nota Comportamental</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Evaluacion</label>
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtEvaluacionEdit" id="TxtEvaluacionEdit" required>
                    </div>
                    <div class="help-info">Evaluacion</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Auto Evaluacion</label>
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtAutoEvaluacionEdit" id="TxtAutoEvaluacionEdit" required>
                    </div>
                    <div class="help-info">Auto Evaluacion</div>
                </div>
                
            </div>
            <div class="modal-footer">
              <input type="submit" IdCalificacion name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit" required>
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="js/Administrator/Calificacion.js"></script>
<?php
    include "template/footer.php";
?>