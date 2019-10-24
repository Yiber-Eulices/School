<?php
    require_once "../Controller/ControladorInformacion.php";
    require_once "../Model/ModeloInformacion.php";
    class AjaxInformacion{
        public $id;
        public $descripcion;
        public $ubicacion;
        public $correo;
        public $telefono;

        public function AjxCrear(){
            $objINFO = ControladorInformacion::CtrlCrear( $this->descripcion,$this->ubicacion,$this->correo,$this->telefono);
            echo json_encode($objINFO);
        }
        public function AjxEditar(){
            $objINFO = ControladorInformacion::CtrlEditar( $this->id,$this->descripcion,$this->ubicacion,$this->correo,$this->telefono);
            echo json_encode($objINFO);  //lo esta retornando en false.
        }
        public function AjxListar(){
            $objINFO = ControladorInformacion::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objINFO) >= 1){
                        for ($i=0; $i < count($objINFO); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdInformacion = '".$objINFO[$i]["IdInformacion"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdInformacion = '".$objINFO[$i]["IdInformacion"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$objINFO[$i]["IdInformacion"].'",
                                "'.$objINFO[$i]["Descripcion"].'",
                                "'.$objINFO[$i]["Ubicacion"].'",
                                "'.$objINFO[$i]["Correo"].'",
                                "'.$objINFO[$i]["Telefono"].'",
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
            $objINFO = ControladorInformacion::CtrlBuscar($this->id);
            echo json_encode($objINFO);
        }
        public function AjxEliminar(){
            $objINFO = ControladorInformacion::CtrlEliminar($this->id);
            echo json_encode($objINFO);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxInformacion();
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> ubicacion = $_POST["Ubicacion"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> telelfono = $_POST["Telefono"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxInformacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> ubicacion = $_POST["Ubicacion"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> telefono = $_POST["Telefono"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxInformacion();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxInformacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxInformacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    