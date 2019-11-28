<?php
    require_once "../Controller/ControladorCurso.php";
    require_once "../Model/ModeloCurso.php";
    require_once "../Controller/ControladorGrado.php";
    require_once "../Model/ModeloGrado.php";
    class AjaxCurso{
        public $id;
        public $nombre;
        public $anio;
        public $grado;
        public $profesor;

        public function AjxCrear(){
            $objADMIN = ControladorCurso::CtrlCrear( $this->nombre,$this->anio,$this->grado,$this->profesor);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorCurso::CtrlEditar( $this->id,$this->nombre,$this->anio,$this->grado,$this->profesor);
            echo json_encode($objADMIN);  
        }
        public function AjxListar(){
            $objADMIN = ControladorCurso::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnProfesor = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnProfesor btn-info waves-effect' IdCurso = '".$objADMIN[$i]["IdCurso"]."'><i class='material-icons'>group</i><span>Profesores</span></button>";
                            $btnUpdate = "<button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdCurso = '".$objADMIN[$i]["IdCurso"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdCurso = '".$objADMIN[$i]["IdCurso"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$objADMIN[$i]["NombreCurso"].'",
                                "'.$objADMIN[$i]["Anio"].'",
                                "'.$objADMIN[$i]["Nivel"].'",
                                "'.$objADMIN[$i]["NombreProfesor"].' '.$objADMIN[$i]["Apellido"].'",
                                "'.$btnProfesor.$btnUpdate.$btnDelete.'",
                                "'.$objADMIN[$i]["IdCurso"].'"
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
            $objADMIN = ControladorCurso::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorCurso::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxSesion(){
            $objADMIN = ControladorCurso::CtrlSesion($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> anio = $_POST["Anio"];
        $oBJEC_AJAX -> grado = $_POST["GradoIdGrado"];
        $oBJEC_AJAX -> profesor = $_POST["ProfesorIdProfesor"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> anio = $_POST["Anio"];
        $oBJEC_AJAX -> grado = $_POST["Grado"];
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'sesion'){
        $oBJEC_AJAX = new AjaxCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxSesion();
    }
    