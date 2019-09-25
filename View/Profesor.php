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
                                Profesores
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
                            <button type="button" class="btn btn-success waves-effect"  data-toggle="modal" data-target="#miModal">
                                <i class="material-icons">add</i>
                                <span>A&ntilde;adir Profesor</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Tipo de Documento</th>
                                            <th>Documento</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Rh</th>
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
                                            <th>Fecha de Nacimiento</th>
                                            <th>Rh</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="images/user.png" width="48" height="48" alt="User" /></td>
                                            <td>Mario</td>
                                            <td>Lopez Lemus</td>
                                            <td>Cedula de Ciudadania</td>
                                            <td>1002772343</td>
                                            <td>24/03/1965</td>
                                            <td>A+</td>
                                            <td>MarioLopez@gmail.com</td>
                                            <td>3105730264</td>
                                            
                                            <td>
                                                <button type="button" class="btn bg-amber waves-effect" onclick="location.href='#'">
                                                    <i class="material-icons">edit</i>
                                                    <span>Editar</span>
                                                </button>
                                                <button type="button" class="btn bg-deep-orange waves-effect" onclick="location.href='#'">
                                                    <i class="material-icons">delete_forever</i>
                                                    <span>Eliminar</span>
                                                </button>
                                                <button type="button" class="btn bg-success waves-effect" onclick="location.href='ProfesorCurso.php'">
                                                    <i class="material-icons">visibility</i>
                                                    <span>Ver Cursos</span>
                                                </button>
                                                <button type="button" class="btn bg-success waves-effect" onclick="location.href='ProfesorMateria.php'">
                                                    <i class="material-icons">visibility</i>
                                                    <span>Ver Materias</span>
                                                </button>
                                                <button type="button" class="btn bg-success waves-effect" onclick="location.href='Mensaje.php'">
                                                    <i class="material-icons">message</i>
                                                    <span>Mensaje</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
    <!--Modal Create -->
    <div class="modal fade" tabindex="-1" role="dialog" id="miModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">A&ntilde;adir Profesores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form id="form_advanced_validation" action="OrdenProduccion.aga?a=create" method="POST">
            <div class="modal-body">
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtSerie">
                        <label class="form-label">Nombre</label>
                    </div>
                    <div class="help-info">Nombre</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtVin">
                        <label class="form-label">Apellido</label>
                    </div>
                    <div class="help-info">Apellido</div>
                </div> 
                <div class="form-group form-float"> 
                    <label class="form-label">Tipo de Documento</label>
                    <select class="form-control show-tick selectpicker form-control" data-container="body" data-live-search="true" title="Select a number" data-hide-disabled="true" name ="TxtAutobus" requiere>
                        <option value="">-- Por Favor Seleccione --</option>
                        <option value="<1>">Cedula de Ciudadania</option>
                        <option value="<1>">Targeta de Identidad</option> 
                        <option value="<1>">Cedula Extranjera</option>                        
                    </select>
                    <div class="help-info">Tipo de Documento</div>
                </div>               
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" class="form-control" name="TxtFechaIngreso">
                        <label class="form-label">Documento</label>
                    </div>
                    <div class="help-info">Documento</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line " id="bs_datepicker_container">
                        <input type="text"  class="form-control" name="TxtFechaSalida">
                        <label class="form-label">Fecha de Nacimiento</label>
                    </div>
                    <div class="help-info">Fecha de Nacimiento</div>
                </div>
                <div class="form-group form-float"> 
                    <label class="form-label">Rh</label>
                    <select class="form-control show-tick selectpicker form-control" data-container="body" data-live-search="true" title="Select a number" data-hide-disabled="true" name ="TxtAutobus" requiere>
                        <option value="">-- Por Favor Seleccione --</option>
                        <option value="<1>">AB+</option>
                        <option value="<1>">AB-</option> 
                        <option value="<1>">A+</option>
                        <option value="<1>">A-</option>
                        <option value="<1>">B+</option>
                        <option value="<1>">B-</option>
                        <option value="<1>">O+</option>
                        <option value="<1>">O-</option>
                    </select>
                    <div class="help-info">Rh</div>
                </div> 
                <div class="form-group form-float">
                    <div class="form-line ">
                        <input type="text"  class="form-control" name="TxtFechaSalida">
                        <label class="form-label">Correo</label>
                    </div>
                    <div class="help-info">Correo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text"  class="form-control" name="TxtFechaSalida">
                        <label class="form-label">Telefono</label>
                    </div>
                    <div class="help-info">Telefono</div>
                </div>
                
            </div>
            <div class="modal-footer">
              <input type="submit" name="Enviar" class="btn btn-primary">
              <input type="reset" name="Reset"  class="btn btn-danger">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--End Modal Create -->
   
<?php
    include "template/footer.php";
?>