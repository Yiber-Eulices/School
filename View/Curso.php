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
                                Cursos
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
                                <span>A&ntilde;adir Curso</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                        <tr>
                                        <th>Curso</th>
                                        <th>Año</th>
                                        <th>Grado</th>
                                        <th>Profesor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Curso</th>
                                        <th>Año</th>
                                        <th>Grado</th>
                                        <th>Profesor</th>
                                        <th>Acciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Noveno A</td>
                                        <td>2019</td>
                                        <td>Noveno</td>
                                        <td>Alirio Cardenas</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Estudiante.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Estudiantes</span>
                                        </button></td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='ProfesorCurso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Profesores</span>
                                        </button></td>                                        
                                    <tr>
                                        <td>Octavo B</td>
                                        <td>2019</td>
                                        <td>Octavo</td>
                                        <td>Carmen Lopez</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Estudiante.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Estudiantes</span>
                                        </button></td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='ProfesorCurso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Profesores</span>
                                        </button></td>
                                    </tr>
                                    <tr>
                                        <td>Septimo A</td>
                                        <td>2019</td>
                                        <td>Septimo</td>
                                        <td>Pablo Camargo</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Estudiante.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Estudiantes</span>
                                        </button></td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='ProfesorCurso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Profesores</span>
                                        </button></td>
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
                <h4 class="modal-title" id="defaultModalLabel">Añadir Curso</h4>
            </div>
            <div class="modal-body">
                <h2 class="card-inside-title">Curso</h2>
                    <div class="col-sm-12">
                    <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="TxtSerie">
                                <label class="form-label">Nombre</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="TxtSerie">
                                <label class="form-label">Año</label>
                            </div>
                        </div>
                       
                            <div class="form-line">
                            <label class="form-label">Grado:</label>
                                    <select class="form-control show-tick">
                                            <option>Seleccione</option>
                                            <option value="10">1°</option>
                                            <option value="20">2°</option>
                                            <option value="30">4°</option>
                                            <option value="40">5°</option>
                                            <option value="50">6°</option>
                                            <option value="50">7°</option>
                                            <option value="50">8°</option>
                                            <option value="50">9°</option>
                                            <option value="50">10°</option>
                                            <option value="50">11°</option>
                                        </select>
                                
                            </div>
                      
                      
                            <div class="form-line">
                            <label class="form-label">Profesor:</label>
                                    <select class="form-control show-tick">
                                            <option>Seleccione</option>
                                            <option value="10">Laura Melissa Perez Serrano</option>
                                            <option value="20">Karol Astrid Castiblanco Salamanca</option>
                                            <option value="30">Cristian Andres Sanchez Gutierrez</option>
                                            <option value="40">Andres Javier Hernandez castillo</option>
                                            <option value="50">Carlos Alejandro Perez</option>
                                        </select>
                               
                            </div>
                       
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">GUARDAR</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
                </div>
            </div>
      </div>
    </div>
    <!--End Modal Create -->
     
<?php
    include "template/footer.php";
?>