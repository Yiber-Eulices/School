<?php
    include "View/template/header.php";
    include "View/template/menu.php";
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>                    
                    <small>SCHOOL ADMIN</small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Cursos en los que dicta clases el profesor <b><?php echo $_SESSION['ProfesorNombre'];?></b>.
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
                                <span>A&ntilde;adir Curso</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableProfesorCurso table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Grado</th>
                                            <th>Curso</th>
                                            <th>Materia</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Grado</th>
                                            <th>Curso</th>
                                            <th>Materia</th>
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
                <input type="hidden" name="TxtProfesor" id="TxtProfesor" value="<?php echo $_SESSION['ProfesorId'];?>" required>

                <div class="form-group form-float">
                    <label class="form-label">Curso</label>
                    <div class="form-line">
                        <select name="TxtCurso" id="TxtCurso" style ="width: 100%" required>
                            <option value=''>-- Por favor seleccione --</option>
                        </select>
                    </div>
                    <div class="help-info">Curso</div>
                </div>
                <div class="form-group form-float">
                        <label class="form-label">Materia</label>
                        <div class="form-line">
                            <select name="TxtMateria" id="TxtMateria" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                            </select>
                        </div>
                        <div class="help-info">Materia</div>
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
                <h5 class="modal-title">Editar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="TxtProfesorEdit" id="TxtProfesorEdit" value="<?php echo $_SESSION['ProfesorId'];?>" required>

                    <div class="form-group">
                        <label class="form-label">Curso</label>
                        <div class="form-line">
                            <select name="TxtCursoEdit" id="TxtCursoEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                            </select>
                        </div>
                        <div class="help-info">Curso</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Materia</label>
                        <div class="form-line">
                            <select name="TxtMateriaEdit" id="TxtMateriaEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                            </select>
                        </div>
                        <div class="help-info">Materia</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" IdProfesorCurso name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
                    <input type="reset"  name="Reset"  class="btn btn-danger">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="View/js/Administrator/ProfesorCurso.js"></script>
<?php
    include "View/template/footer.php";
?>