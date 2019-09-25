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
                                PROFESOR CURSO
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
                                <span>A&ntilde;adir Profesor Curso</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                        <tr>
                            <th>CURSO</th>
                            <th>PROFESOR</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                                <th>CURSO</th>
                                <th>PROFESOR</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1°</td>
                            <td>Carlos Eduardo Perez</td>
                        </tr>
                        <tr>
                            <td>10°</td>
                            <td>Laura Valentina Saenz Becerra</td>
                        </tr>
                        <tr>
                            <td>6°</td>
                            <td>Fernanda Perez Sanchez</td>
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
                <h4 class="modal-title" id="defaultModalLabel">Profesor Curso</h4>
            </div>
            <div class="modal-body">
                <h2 class="card-inside-title">Profesor Curso</h2>
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                    <select class="form-control show-tick">
                                            <option >Seleccione</option>
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
                                <label class="form-label">Curso:</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                    <select class="form-control show-tick">
                                            <option >Seleccione</option>
                                            <option value="10">Laura Melissa Perez Serrano</option>
                                            <option value="20">Karol Astrid Castiblanco Salamanca</option>
                                            <option value="30">Cristian Andres Sanchez Gutierrez</option>
                                            <option value="40">Andres Javier Hernandez castillo</option>
                                            <option value="50">Carlos Alejandro Perez</option>
                                        </select>
                                <label class="form-label">Profesor:</label>
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