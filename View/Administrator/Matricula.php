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
                                Matr&iacute;cula
                            </h2>
                            
                        </div>
                        <div class="body">
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#ModalCreate">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Matr&iacute;cula</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableMatricula table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha de Matrícula</th>
                                            <th>Costo</th>
                                            <th>Grado</th>
                                            <th>Estudiante</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Fecha de Matrícula</th>
                                            <th>Costo</th>
                                            <th>Grado</th>
                                            <th>Estudiante</th>
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
            <h5 class="modal-title">A&ntilde;adir Matr&iacute;cula</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
            <div class="modal-body">
                <!--div class="form-group form-float">
                    <label class="form-label">Fecha de Matr&iacute;cula</label>
                    <div class="form-line" id="bs_datepicker_container">
                        <input type="text" class="form-control" name="TxtFechaMatricula" id="TxtFechaMatricula" placeholder = "Mes/Dia/A&ntilde;o" required>
                        
                    </div>
                    <div class="help-info">Fecha de Matr&iacute;cula</div>
                </div-->
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtCosto" id="TxtCosto" required>
                        <label class="form-label">Costo</label>
                    </div>
                    <div class="help-info">Costo</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Grado</label>
                    <div class="form-line">
                    <select name="TxtGrado" id="TxtGrado" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                           </select>
                    </div>
                    <div class="help-info">Grado</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Estudiante</label>
                    <div class="form-line">
                        <select name="TxtIdEstudiante" id="TxtIdEstudiante" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>
                    <div class="help-info">Estudiante</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="Enviar" class="btn btn-primary botonCreate">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
            <h5 class="modal-title">Editar Matr&iacute;cula</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Fecha de Matr&iacute;cula</label>
                    <div class="form-line" id="bs_datepicker_container_edit">
                        <input type="text" class="form-control" name="TxtFechaMatriculaEdit" id="TxtFechaMatriculaEdit" placeholder = "Mes/Dia/A&ntilde;o" required>
                    </div>       
                    <div class="help-info">Fecha de Matr&iacute;cula</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Costo</label>
                    <div class="form-line">
                        <input type="number" class="form-control" name="TxtCostoEdit" id="TxtCostoEdit" required>
                    </div>
                    <div class="help-info">Costo</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Grado</label>
                    <div class="form-line">
                        <select name="TxtGradoEdit" id="TxtGradoEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>
                    <div class="help-info">Grado</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Estudiante</label>
                    <div class="form-line">
                        <select name="TxtIdEstudianteEdit" id="TxtIdEstudianteEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>
                    <div class="help-info">Estudiante</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" IdMatricula name="Enviar" class="btn btn-primary botonEdit" id ="botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="View/js/Administrator/Matricula.js"></script>
<?php
    include "View/template/footer.php";
?>