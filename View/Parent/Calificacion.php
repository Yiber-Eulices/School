<?php
    include "View/template/header.php";
    include "View/template/menu.php";
?>
<section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Calificaciones de mi Hijo <b><?php echo($_SESSION["EstudianteNombre"]);?></b>, en la Asignatura <b><?php echo($_SESSION["CalificarMateriaNombre"]);?></b>.
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableCalificacion table-striped dt-responsive table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Periodo</th>
                                            <th>Nota Acumulativa</th>
                                            <th>Nota Comportamental</th>
                                            <th>Evaluacion</th>
                                            <th>Auto Evaluacion</th>
                                            <th>Promedio</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Periodo</th>
                                            <th>Nota Acumulativa</th>
                                            <th>Nota Comportamental</th>
                                            <th>Evaluacion</th>
                                            <th>Auto Evaluacion</th>
                                            <th>Promedio</th>
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
    <script src="View/js/Parent/Calificacion.js"></script>
<?php
    include "View/template/footer.php";
?>