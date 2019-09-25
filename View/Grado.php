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
                                GRADOS
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
                                <span>A&ntilde;adir Grados</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Grado</th>
                                        <th>Acciones</th>                                         
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Grado</th>
                                        <th>Acciones</th>                                       
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Noveno A</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Curso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Cursos</span>
                                        </button></td>                                       
                                        
                                    <tr>
                                        <td>Octavo B</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Curso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Cursos</span>
                                        </button></td>  
                                    </tr>
                                    <tr>
                                        <td>Septimo A</td>
                                        <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Curso.php'">
                                            <i class="material-icons">visibility</i>
                                            <span>Ver Cursos</span>
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
                <h4 class="modal-title" id="defaultModalLabel">Añadir Grado</h4>
            </div>
            <div class="modal-body">
                <h2 class="card-inside-title">Grado</h2>
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                <input type="text" class="form-control" name="TxtSerie">
                                <label class="form-label">Nivel de Grado:</label>
                            </div>
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