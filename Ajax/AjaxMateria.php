<?php
    require_once "../Controller/ControladorMateria.php";
    require_once "../Model/ModeloMateria.php";
    class AjaxMateria{
        public $id;
        public $nombre;
        public $descripcion;

        public function AjxCrear(){
            $objADMIN = ControladorMateria::CtrlCrear( $this->nombre,$this->descripcion);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorMateria::CtrlEditar( $this->id,$this->nombre,$this->descripcion);
            echo json_encode($objADMIN);  //lo esta retornando en false.
        }
        public function AjxListarSelect(){
            $objADMIN = ControladorMateria::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdMateria"].'",
                                "'.$objADMIN[$i]["Nombre"].'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';
                echo $oBJEC_JSON;
        }
        public function AjxListar(){
            $objADMIN = ControladorMateria::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdMateria = '".$objADMIN[$i]["IdMateria"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdMateria = '".$objADMIN[$i]["IdMateria"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$objADMIN[$i]["Nombre"].'",
                                "'.$objADMIN[$i]["Descripcion"].'",
                                "'.$btnUpdate.$btnDelete.'",
                                "'.$objADMIN[$i]["IdMateria"].'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
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
            $objADMIN = ControladorMateria::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorMateria::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaSelect'){
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> AjxListarSelect();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    