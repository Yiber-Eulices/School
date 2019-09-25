<?php
    include "template/header.php";
    include "template/menu.php";
?>
   <section class="content">
        <div class="container-fluid">
            
            <div class="row clearfix">
                <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ACUDIENTES DE YIBER EULICES
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
                            <div class="table-responsive">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana2"><i class="material-icons">add</i>Agregar Acudiente</button><br><br>
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>E-mail</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>E-mail</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>soila</td>
                                            <td>Perez</td>
                                            <td>3123434567</td>
                                            <td>cl 12-23</td>
                                            <td>soila@gmail.com</td>
                                            <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Mensaje.php'">
                                                    <i class="material-icons">message</i>
                                                    <span>Mensaje</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Maria Julia</td>
                                            <td>Martinez</td>
                                            <td>3212367890</td>
                                            <td>Cr 45-32</td>
                                            <td>maria@gmail.com</td>
                                            <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Mensaje.php'">
                                                    <i class="material-icons">message</i>
                                                    <span>Mensaje</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Benedilce</td>
                                            <td>Julio</td>
                                            <td>3104235431</td>
                                            <td>Cl 65-11</td>
                                            <td>benedilce@gmail.com</td>
                                            <td><button type="button" class="btn bg-success waves-effect" onclick="location.href='Mensaje.php'">
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
        </div>
    </section>
    <div class="modal fade" id="ventana2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Acudiente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="ModificarDatos">
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                            <div class="col-md-3">
                                    <select class="form-control show-tick" data-live-search="true">
                                        <option>--Seleccione--</option>
                                        <option>Soila Perez</option>
                                        <option>Maria Julia Martinez</option>
                                        <option>Benedilce Julio</option>
                                    </select>
                                </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <input type="submit" value="Guardar" name="actualizar" class="btn btn-primary btnModificaDatos" id="btnModificar" idUsuario="">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include "template/footer.php";
?>