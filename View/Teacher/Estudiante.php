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
                                Estudiantes
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTableEstudiante table-striped dt-responsive table-hover js-basic-example dataTable">
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
                                            <th>Curso</th>
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
                                            <th>Curso</th>
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
    <script src="View/js/Teacher/Estudiante.js"></script>
<?php
    include "View/template/footer.php";
?>