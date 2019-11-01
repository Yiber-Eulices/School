<?php
    require_once "../Controller/ControladorAcudienteEstudiante.php";
    require_once "../Model/ModeloAcudienteEstudiante.php";
    class AjaxAcudienteEstudiante{
        public $id;
        public $estudiante;
        public $acudiente;

        public function AjxCrear(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlCrear( $this->estudiante,$this->acudiente);
            echo json_encode($objAcudienteEstudiante);
        }
        public function AjxEditar(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlEditar( $this->id,$this->estudiante,$this->acudiente);
            echo json_encode($objAcudienteEstudiante);  
        }
        public function AjxListar(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";

                            $oBJEC_JSON .= '[
                                "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                "'.$objAcudienteEstudiante[$i]["Nombre"].' '.$objAcudienteEstudiante[$i]["Apellido"].'",
                                "'.$objAcudienteEstudiante[$i]["NombreAcudiente"].' '.$objAcudienteEstudiante[$i]["ApellidoAcudiente"].'",
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
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlBuscar($this->id);
            echo json_encode($objAcudienteEstudiante);
        }
        public function AjxEliminar(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlEliminar($this->id);
            echo json_encode($objAcudienteEstudiante);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> estudiante = $_POST["EstudianteIdEstudiante"];
        $oBJEC_AJAX -> acudiente = $_POST["AcudienteIdAcudiente"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> estudiante = $_POST["EstudianteIdEstudiante"];
        $oBJEC_AJAX -> acudiente = $_POST["AcudienteIdAcudiente"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    