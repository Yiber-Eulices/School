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
                                Observaciones de el Estudiante <b><?php echo $_SESSION['EstudianteNombre'];?></b>.
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableObservacion table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Gravedad</th>
                                            <th>Descripcion</th>
                                            <th>Compromiso</th>
                                            <th>Profesor</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Gravedad</th>
                                            <th>Descripcion</th>
                                            <th>Compromiso</th>
                                            <th>Profesor</th>
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
    <script src="View/js/Administrator/Observacion.js"></script>
<?php
    include "View/template/footer.php";
?>