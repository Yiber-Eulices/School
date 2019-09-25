<?php
    include "template/header.php";
    include "template/menu.php";
?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Autobuses AGA
                    <small>Mas informacion en <a href="https:/www.autobusesaga.com/" target="_blank">www.autobusesaga.com</a></small>
                </h2>
            </div>
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
                                            <th>Fecha</th>
                                            <th>Titulo</th>
                                            <th>Mensaje</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Titulo</th>
                                            <th>Mensaje</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>13/01/2019 08:23:00</td>
                                            <td>Reunion Padres de Familia</td>
                                            <td>La reunion se realizara en la aula multifuncional el dia 23 de mayo del 2019</td>
                                            <td>Sin Ver</td>
                                            <td>
                                                <button type="button" class="btn bg-amber waves-effect" onclick="location.href='OrdenProduccion.aga?a=update&id=<%=OrdenP.getIdOrdenProduccion()%>'">
                                                    <i class="material-icons">edit</i>
                                                    <span>Editar</span>
                                                </button>
                                                <button type="button" class="btn bg-deep-orange waves-effect" onclick="location.href='OrdenProduccion.aga?a=delete&id=<%=OrdenP.getIdOrdenProduccion()%>'">
                                                    <i class="material-icons">delete_forever</i>
                                                    <span>Eliminar</span>
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
                        <label class="form-label">Titulo</label>
                    </div>
                    <div class="help-info">Titulo</div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <textarea name="description" cols="30" rows="10" class="form-control no-resize" required></textarea>
                        <label class="form-label">Mensaje</label>
                    </div>
                    <div class="help-info">Mensaje</div>
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