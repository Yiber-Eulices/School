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
                                Acudiente-Estudiente
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
                                <span>A&ntilde;adir Acudiente-Estudiante</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableAcudienteEstudiante table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Estudiante</th>
                                            <th>Acudiente</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>#</th>
                                            <th>Estudiente</th>
                                            <th>Acudiente</th>
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
                <h5 class="modal-title">A&ntilde;adir Acudiente-Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_advanced_validation" class="formCreate" method="POST" onsubmit="return SubmitFunction()">
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            
                           <select name="TxtEstudiante" id="TxtEstudiante" style ="width: 100%">
                                <option value=''>-- Por favor seleccione --</option>
                           </select>
                            <label class="form-label">Estudiante</label>
                        </div>
                        <div class="help-info">Estudiante</div>
                    </div>
                
                <div class="form-group form-float">
                        <div class="form-line">
                        <select name="TxtAcudiente" id="TxtAcudiente" style ="width: 100%">
                                <option value=''>-- Por favor seleccione --</option>
                           </select>
                            <label class="form-label">Acudiente</label>
                        </div>
                        <div class="help-info">Acudiente</div>
                    </div>
                </div>
               
                <div class="modal-footer">
                <input type="submit" name="Enviar" class="btn btn-primary botonCreate">
                <input type="reset"  name="Reset"  class="btn btn-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    <!--End Modal Create -->
    <!--Modal Edit -->
    <div class="modal fade"  role="dialog" id="ModalEdit">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Acudiente-Estudiante</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation" class="formEdit" method="POST" onsubmit="return SubmitFunction()">
            <div class="modal-body">
                
                <div class="form-group form-float">
                    <div class="form-line">
                          
                    <select name="TxtEstudianteEdit" id="TxtEstudianteEdit" style ="width: 100%">
                                <option value=''>-- Por favor seleccione --</option>
                           </select><label class="form-label">Estudiante</label>
                    </div>
                    <div class="help-info">Estudiante</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                    <select name="TxtAcudienteEdit" id="TxtAcudienteEdit" style ="width: 100%">
                                <option value=''>-- Por favor seleccione --</option>
                           </select><label class="form-label">Acudiente</label>
                        <label class="form-label">Acudiente</label>
                    </div>
                    <div class="help-info">Acudiente</div>
                </div>            
            </div>
            <div class="modal-footer">
              <input type="submit" IdEstudianteAcudiente name="Enviar" class="btn btn-primary botonEdit" id = "botonEdit">
              <input type="reset"  name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Edit -->
    <script src="js/AcudienteEstudiante.js"></script>
<?php
    include "template/footer.php";
?>