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
                                Acudientes de el Estudiente <b><?php echo $_SESSION['EstudianteNombre'];?></b>
                            </h2>
                        </div>
                        <div class="body">
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#ModalCreate">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Acudiente</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableAcudienteEstudiante table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Tipo de Documento</th>
                                            <th>Documento</th>
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
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>                                    
                                </table>
                                <style>
                                    .imgProfile{
                                        height : 50px;
                                        width : 50px;
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
                <h5 class="modal-title">A&ntilde;adir Acudiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_advanced_validation" class="formCreate" method="POST">
                <div class="modal-body">
                    
                    <input type="hidden" name="TxtEstudiante" id="TxtEstudiante" value = "<?php echo $_SESSION['EstudianteId'];?>" required>
                
                    <div class="form-group form-float">
                        <label class="form-label">Acudiente</label>
                        <div class="form-line">
                            <select name="TxtAcudiente" id="TxtAcudiente" style ="width: 100%" required>
                                    <option value=''>-- Por favor seleccione --</option>
                            </select>                           
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
            <h5 class="modal-title">Editar Acudiente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form id="form_advanced_validation_edit" class="formEdit" method="POST">
            <div class="modal-body">
                
                <input type="hidden" name="TxtEstudianteEdit" id ="TxtEstudianteEdit"value = "<?php echo $_SESSION['EstudianteId'];?>" required>

                <div class="form-group form-float">
                    <div class="form-line">
                    <select name="TxtAcudienteEdit" id="TxtAcudienteEdit" style ="width: 100%" required>
                                <option value=''>-- Por favor seleccione --</option>
                           </select>
                        
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
    <script src="View/js/Administrator/EstudianteAcudiente.js"></script>
<?php
    include "View/template/footer.php";
?>
