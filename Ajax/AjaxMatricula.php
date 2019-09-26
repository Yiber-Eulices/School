<?php
    require_once "../Controller/ControladorMatricula.php";
    require_once "../Model/ModeloMatricula.php";
    class AjaxMatricula{
        
        public $id;
        public $fecha;
        public $costo;
        public $grado;
        public $estudiante;

        public function AjxCrear(){
            $objMATR = ControladorMatricula::CtrlCrear( $this->fecha,$this->costo,$this->grado,$this->estudiante);
            echo json_encode($objMATR);
        }
        public function AjxEditar(){
            $objMATR = ControladorMatricula::CtrlEditar( $this->id,$this->fecha,$this->costo,$this->grado,$this->estudiante);
            echo json_encode($objMATR);  
        }
        public function AjxListar(){
            $objMATR = ControladorMatricula::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objMATR) >= 1){
                        for ($i=0; $i < count($objMATR); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdMatricula = '".$objMATR[$i]["IdMatricula"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdMatricula = '".$objMATR[$i]["IdMatricula"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$objMATR[$i]["IdMatricula"].'",
                                "'.$objMATR[$i]["Nombre"].'",
                                "'.$objMATR[$i]["costo"].'",
                                "'.$objMATR[$i]["GradoIdGrado"].'",
                                "'.$objMATR[$i]["EstudianteIdEstudiante"].'",
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
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxBuscar(){
            $objMATR = ControladorMatricula::CtrlBuscar($this->id);
            echo json_encode($objMATR);
        }
        public function AjxEliminar(){
            $objMATR = ControladorMatricula::CtrlEliminar($this->id);
            echo json_encode($objMATR);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxMatricula();
        $oBJEC_AJAX -> fecha = $_POST["Nombre"];
        $oBJEC_AJAX -> costo = $_POST["Costo"];
        $oBJEC_AJAX -> grado = $_POST["Grado"];
        $oBJEC_AJAX -> estudiante = $_POST["Estudiante"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxMatricula();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> fecha = $_POST["Nombre"];
        $oBJEC_AJAX -> costo = $_POST["Costo"];
        $oBJEC_AJAX -> grado = $_POST["Grado"];
        $oBJEC_AJAX -> estudiante = $_POST["Estudiante"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxMatricula();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxMatricula();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxMatricula();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    