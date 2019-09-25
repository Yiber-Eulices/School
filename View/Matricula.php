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
                                Matriculas
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
                                <span>A&ntilde;adir Matricula</span>
                            </button>
                            <div class="clearfix"><br><br></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>FECHA DE MATRICULA</th>
                                            <th>COSTO</th>
                                            <th>GRADO</th>
                                            <th>ESTUDIANTE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                                <th>FECHA DE MATRICULA</th>
                                                <th>COSTO</th>
                                                <th>GRADO</th>
                                                <th>ESTUDIANTE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>23/04/2018</td>
                                            <td>$320000</td>
                                            <td>10°</td>
                                            <td>Carlos Eduardo Perez</td>
                                        </tr>
                                        <tr>
                                            <td>12/01/2016</td>
                                            <td>$200000</td>
                                            <td>5</td>
                                            <td>Laura Valentina Saenz Becerra</td>
                                        </tr>
                                        <tr>
                                            <td>18/02/2010</td>
                                            <td>$500000</td>
                                            <td>11°</td>
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
                            <h4 class="modal-title" id="defaultModalLabel">Añadir Matricula</h4>
                        </div>
                        <div class="modal-body">
                            <h2 class="card-inside-title">Matricula</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    
                                        <div class="form-line">
                                        <label class="form-label">Fecha De Matricula:</label>
                                            <input type="text" class="datepicker form-control">
                                            
                                        </div>
                                  
                                </div>
                                <div class="col-sm-12">
                                        <div class="form-line">
                                        <label class="form-label">Costo:</label>
                                                <span class="input-group-addon">
                                                        <i class="material-icons">attach_money</i>
                                                        <input type="text" class="form-control money-dollar">
                                                    </span>
                                                    
                                           
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <div class="form-line">
                                        <label class="form-label">Grado:</label>
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
                                          
                                        
                                    </div>
                                        <div class="form-line">
                                        <label class="form-label">Estuduiante:</label>
                                                <select class="form-control show-tick">
                                                        <option >Seleccione</option>
                                                        <option value="10">Laura Melissa Perez Serrano</option>
                                                        <option value="20">Karol Astrid Castiblanco Salamanca</option>
                                                        <option value="30">Cristian Andres Sanchez Gutierrez</option>
                                                        <option value="40">Andres Javier Hernandez castillo</option>
                                                        <option value="50">Carlos Alejandro Perez</option>
                                                    </select>
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
    <!--End Modal Create -->
     
<?php
    include "template/footer.php";
?>