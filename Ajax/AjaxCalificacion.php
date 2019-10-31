<?php
    require_once "../Controller/ControladorCalificacion.php";
    require_once "../Model/ModeloCalificacion.php";
    class AjaxCalificacion{
        public $id;
        public $periodo;
        public $notaAcumulativa;
        public $notaComportamental;
        public $evaluacion;
        public $autoevaluacion;
        public $materiaIdMateria;
        public $estudianteIdEstudiante;

        public function AjxCrear(){
            $objADMIN = ControladorCalificacion::CtrlCrear( $this->periodo,$this->notaAcumulativa,$this->notaComportamental,$this->evaluacion,$this->autoevaluacion,$this->materiaIdMateria,$this->estudianteIdEstudiante);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorCalificacion::CtrlEditar( $this->id,$this->periodo,$this->notaAcumulativa,$this->notaComportamental,$this->evaluacion,$this->autoevaluacion,$this->materiaIdMateria,$this->estudianteIdEstudiante);
            echo json_encode($objADMIN);  
        }
        public function AjxListar(){
            $objADMIN = ControladorCalificacion::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdCalificacion = '".$objADMIN[$i]["IdCalificacion"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdCalificacion = '".$objADMIN[$i]["IdCalificacion"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            
                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdCalificacion"].'",
                                "'.$objADMIN[$i]["NombreEstudiante"]." ".$objADMIN[$i]["Apellido"].'",
                                "'.$objADMIN[$i]["NombreMateria"].'",
                                "'.$objADMIN[$i]["Periodo"].'",                                
                                "'.$objADMIN[$i]["NotaAcumulativa"].'",
                                "'.$objADMIN[$i]["NotaComportamental"].'",
                                "'.$objADMIN[$i]["Evaluacion"].'",
                                "'.$objADMIN[$i]["AutoEvaluacion"].'",
                                "'.$objADMIN[$i]["Promedio"].'",
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
            $objADMIN = ControladorCalificacion::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorCalificacion::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxCalificacion();
        $oBJEC_AJAX -> periodo = $_POST["Periodo"];
        $oBJEC_AJAX -> notaAcumulativa = $_POST["NotaAcumulativa"];
        $oBJEC_AJAX -> notaComportamental = $_POST["NotaComportamental"];
        $oBJEC_AJAX -> evaluacion = $_POST["Evaluacion"];
        $oBJEC_AJAX -> autoevaluacion = $_POST["AutoEvaluacion"];
        $oBJEC_AJAX -> materiaIdMateria = $_POST["IdMateria"];
        $oBJEC_AJAX -> estudianteIdEstudiante = $_POST["IdEstudiante"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxCalificacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> periodo = $_POST["Periodo"];
        $oBJEC_AJAX -> notaAcumulativa = $_POST["NotaAcumulativa"];
        $oBJEC_AJAX -> notaComportamental = $_POST["NotaComportamental"];
        $oBJEC_AJAX -> evaluacion = $_POST["Evaluacion"];
        $oBJEC_AJAX -> autoevaluacion = $_POST["AutoEvaluacion"];
        $oBJEC_AJAX -> materiaIdMateria = $_POST["IdMateria"];
        $oBJEC_AJAX -> estudianteIdEstudiante = $_POST["IdEstudiante"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxCalificacion();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxCalificacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxCalificacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    