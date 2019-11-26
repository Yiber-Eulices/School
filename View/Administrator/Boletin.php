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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 btnPeriodo" periodo="1">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">filter_1</i>
                        </div>
                        <div class="content">
                            <div class="text">PRIMER PERIODO</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 btnPeriodo" periodo="2">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">filter_2</i>
                        </div>
                        <div class="content">
                            <div class="text">SEGUNDO PERIODO</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 btnPeriodo" periodo="3">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">filter_3</i>
                        </div>
                        <div class="content">
                            <div class="text">TERCER PERIODO</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 btnPeriodo" periodo="4">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">filter_4</i>
                        </div>
                        <div class="content">
                            <div class="text">CUARTO PERIODO</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <input type="hidden" name="UserId" id="UserId" value = "<?php echo($_SESSION['EstudianteId']);?>">
                                    <h2>Boletin de <b id = "NumPeriodo"></b> de el Estudiante <b><?php echo($_SESSION['EstudianteNombre']);?></b>.</h2>
                                </div>
                            </div>
                            
                        </div>
                        <div class="body">
                            <div id="PlanoPdfView"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
</section>
<script src="View/js/Parent/Boletin.js"></script>
<?php
    include "View/template/footer.php";
?>