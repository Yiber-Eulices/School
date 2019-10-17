<?php
    require_once "../Controller/ControladorDirectivo.php";
    require_once "../Model/ModeloDirectivo.php";
    class AjaxDirectivo{
        public $id;
        public $nombre;
        public $correo;
        public $telefono;

        public function AjxCrear(){
            $objDIRE= ControladorDirectivo::CtrlCrear( $this->nombre,$this->correo,$this->telefono);
            echo json_encode($objDIRE);
        }
        public function AjxEditar(){
            $objDIRE= ControladorDirectivo::CtrlEditar( $this->id,$this->nombre,$this->correo,$this->telefono);
            echo json_encode($objDIRE);  
        }
        public function AjxListar(){
            $objEVEN = ControladorDirectivo::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objEVEN) >= 1){
                        for ($i=0; $i < count($objEVEN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdDirectivo = '".$objEVEN[$i]["IdDirectivo"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdDirectivo = '".$objEVEN[$i]["IdDirectivo"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            

                            $oBJEC_JSON .= '[
                                "'.$objEVEN[$i]["IdDirectivo"].'",
                                "'.$objEVEN[$i]["Nombre"].'",
                                "'.$objEVEN[$i]["Correo"].'",
                                "'.$objEVEN[$i]["Telefono"].'",
                                "'.$btnUpdate.$btnDelete.'"
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
            $objDIRE= ControladorDirectivo::CtrlBuscar($this->id);
            echo json_encode($objDIRE);
        }
        public function AjxEliminar(){
            $objDIRE= ControladorDirectivo::CtrlEliminar($this->id);
            echo json_encode($objDIRE);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
       
        
        $oBJEC_AJAX = new AjaxDirectivo();
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> telefono = $_POST["Telefono"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
      
        
        $oBJEC_AJAX = new AjaxDirectivo();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> telefono = $_POST["Telefono"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxDirectivo();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxDirectivo();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxDirectivo();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    