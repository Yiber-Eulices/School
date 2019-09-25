<?php
    include "template/header.php";
    include "template/menu.php";
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
                                        <img src="images/image-gallery/10.jpg" />
                                        <div class="carousel-caption">
                                            <h3>¿QUIENES SOMOS?</h3>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum quae exercitationem reiciendis quasi dolorem temporibus fugiat id voluptatem, aut ducimus reprehenderit, veniam provident alias laboriosam. Ab consectetur corporis inventore ad.Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="images/image-gallery/12.jpg" />
                                        <div class="carousel-caption">
                                            <h3>MISIÓN</h3>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum quae exercitationem reiciendis quasi dolorem temporibus fugiat id voluptatem, aut ducimus reprehenderit, veniam provident alias laboriosam. Ab consectetur corporis inventore ad.Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="images/image-gallery/19.jpg" />
                                        <div class="carousel-caption">
                                            <h3>VISIÓN</h3>
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum quae exercitationem reiciendis quasi dolorem temporibus fugiat id voluptatem, aut ducimus reprehenderit, veniam provident alias laboriosam. Ab consectetur corporis inventore ad.Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Reunion Padres de Familia</h4>
            </div>
            <div class="modal-body">
                La reunion se realizara en la aula multifuncional el dia 23 de mayo del 2019</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">Aceptar</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php
    include "template/footer.php";
?>
<script type="text/javascript">
        $(document).ready(function() {
            $("#defaultModal").modal();                  
        });
</script>