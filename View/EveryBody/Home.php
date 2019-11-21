<?php
    include "View/template/header.php";
    include "View/template/menu.php";
?>
   <section class="content">
        <div class="container-fluid">
            
            <div class="row clearfix">
                <!-- With Captions -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BIENVENIDO!!</h2>
                            
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="View/images/image-gallery/10.jpg" />
                                        <div class="carousel-caption">
                                            <h3>¿QUIENES SOMOS?</h3>
                                            <p id ="Somos"></p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="View/images/image-gallery/12.jpg" />
                                        <div class="carousel-caption">
                                            <h3>MISIÓN</h3>
                                            <p id = "Mision"></p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="View/images/image-gallery/19.jpg" />
                                        <div class="carousel-caption">
                                            <h3>VISIÓN</h3>
                                            <p id = "Vision"></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# With Captions -->
            </div>
        </div>
    </section>
    <script src="View/js/EveryBody/Home.js"></script>
<?php
    include "View/template/footer.php";
?>