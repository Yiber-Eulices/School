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
                                Cursos
                            </h2>
                        </div>
                        <div class="body">
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#ModalCreate">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Curso</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableCurso table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Curso</th>
                                            <th>Año</th>
                                            <th>Director de Curso</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Curso</th>
                                            <th>Año</th>
                                            <th>Director de Curso</th>
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
            <h5 class="modal-title">A&ntilde;adir Curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtNombre" id="TxtNombre" required>
                        <label class="form-label">Nombre</label>
                    </div>
                    <div class="help-info">Nombre</div>
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
                    <label class="form-label">Director de Curso</label>
                    <div class="form-line">
                        <select name="TxtProfesor" id="TxtProfesor" style ="width: 100%" required>
                            <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>
                    <div class="help-info">Director de Curso</div>
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
            <h5 class="modal-title">Editar Curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <label class="form-label">Nombre</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtNombreEdit" id="TxtNombreEdit" required>                        
                    </div>
                    <div class="help-info">Nombre</div>
                </div>
                <div class="form-group form-float">
                    <label class="form-label">Año</label>
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtAnioEdit" id="TxtAnioEdit" required>
                    </div>
                    <div class="help-info">Año</div>
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
                    <label class="form-label">Director de Curso</label>
                    <div class="form-line">
                         <select name="TxtProfesorEdit" id="TxtProfesorEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>   
                    <div class="help-info">Director de Curso</div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" IdCurso name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="View/js/Administrator/Curso.js"></script>
<?php
    include "View/template/footer.php";
?>