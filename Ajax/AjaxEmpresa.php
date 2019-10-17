<?php
    require_once "../Controller/ControladorEmpresa.php";
    require_once "../Model/ModeloEmpresa.php";
    class AjaxEmpresa{
        public $id;
        public $mision;
        public $vision;
        public $somos;

        public function AjxCrear(){
            $objADMIN = ControladorEmpresa::CtrlCrear( $this->mision,$this->vision,$this->somos);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorEmpresa::CtrlEditar( $this->id,$this->mision,$this->vision,$this->somos);
            echo json_encode($objADMIN);  //lo esta retornando en false.
        }
        public function AjxListar(){
            $objADMIN = ControladorEmpresa::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdEmpresa = '".$objADMIN[$i]["IdEmpresa"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdEmpresa = '".$objADMIN[$i]["IdEmpresa"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdEmpresa"].'",
                                "'.$objADMIN[$i]["Mision"].'",
                                "'.$objADMIN[$i]["Vision"].'",
                                "'.$objADMIN[$i]["QuienesSomos"].'",
                                "'.$btnUpdate.$btnDelete.'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            "",
                            "",
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxBuscar(){
            $objADMIN = ControladorEmpresa::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorEmpresa::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxEmpresa();
        $oBJEC_AJAX -> mision = $_POST["Mision"];
        $oBJEC_AJAX -> vision = $_POST["Vision"];
        $oBJEC_AJAX -> somos = $_POST["Somos"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxEmpresa();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> mision = $_POST["Mision"];
        $oBJEC_AJAX -> vision = $_POST["Vision"];
        $oBJEC_AJAX -> somos = $_POST["Somos"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxEmpresa();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxEmpresa();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxEmpresa();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    