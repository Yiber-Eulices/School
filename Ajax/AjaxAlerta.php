<?php
    require_once "../Controller/ControladorAlerta.php";
    require_once "../Model/ModeloAlerta.php";
    class AjaxAlerta{
        public $id;
        public $rolPersona;
        public $idPersona;
        public $fecha;
        public $titulo;
        public $mensaje;
        public $estado;

        public function AjxCrear(){
            $objADMIN = ControladorAlerta::CtrlCrear( $this->rolPersona,$this->idPersona,$this->fecha,$this->titulo,$this->mensaje,$this->estado);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorAlerta::CtrlEditar( $this->id,$this->rolPersona,$this->idPersona,$this->fecha,$this->titulo,$this->mensaje,$this->estado);
            echo json_encode($objADMIN);  
        }
        public function AjxListar(){
            $objADMIN = ControladorAlerta::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAlerta = '".$objADMIN[$i]["IdAlerta"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAlerta = '".$objADMIN[$i]["IdAlerta"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            
                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdAlerta"].'",
                                "'.$objADMIN[$i]["RolPersona"].'",
                                "'.$objADMIN[$i]["IdPersona"].'",
                                "'.$objADMIN[$i]["Fecha"].'",
                                "'.$objADMIN[$i]["Titulo"].'",
                                "'.$objADMIN[$i]["Mensaje"].'",
                                "'.$objADMIN[$i]["Estado"].'",
                                "'.$btnUpdate.$btnDelete.'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            "",
                            "",
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
            $objADMIN = ControladorAlerta::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorAlerta::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> rolPersona = $_POST["RolPersona"];
        $oBJEC_AJAX -> idPersona = $_POST["IdPersona"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> mensaje = $_POST["Mensaje"];
        $oBJEC_AJAX -> estado = $_POST["Estado"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> rolPersona = $_POST["RolPersona"];
        $oBJEC_AJAX -> idPersona = $_POST["IdPersona"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> mensaje = $_POST["Mensaje"];
        $oBJEC_AJAX -> estado = $_POST["Estado"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    