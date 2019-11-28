<?php
    require_once "../Controller/ControladorObservacion.php";
    require_once "../Model/ModeloObservacion.php";
    setlocale(LC_ALL,"es-CO.utf8");
    class AjaxObservacion{
        public $id;
        public $fecha;
        public $gravedad;
        public $descripcion;
        public $compromiso;
        public $estudiante;
        public $profesor;

        public function AjxCrear(){
            $objOBSE = ControladorObservacion::CtrlCrear( $this->fecha,$this->gravedad,$this->descripcion,$this->compromiso,$this->estudiante,$this->profesor);
            echo json_encode($objOBSE);
        }
        public function AjxEditar(){
            $objOBSE = ControladorObservacion::CtrlEditar( $this->id,$this->fecha,$this->gravedad,$this->descripcion,$this->compromiso,$this->estudiante,$this->profesor);
            echo json_encode($objOBSE);  
        }
        public function AjxListar(){
            $objOBSE = ControladorObservacion::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objOBSE) >= 1){
                        for ($i=0; $i < count($objOBSE); $i++) {
                            list($anio,$mes,$dia) = explode("-",$objOBSE[$i]["Fecha"]);
                            $btnUpdate = "<button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdObservacion = '".$objOBSE[$i]["IdObservacion"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdObservacion = '".$objOBSE[$i]["IdObservacion"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                                "'.$objOBSE[$i]["Gravedad"].'",
                                "'.$objOBSE[$i]["Descripcion"].'",
                                "'.$objOBSE[$i]["Compromiso"].'",
                                "'.$objOBSE[$i]["Nombre"].' '.$objOBSE[$i]["Apellido"].'",
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
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        
        public function AjxBuscar(){
            $objOBSE = ControladorObservacion::CtrlBuscar($this->id);
            echo json_encode($objOBSE);
        }
        public function AjxEliminar(){
            $objOBSE = ControladorObservacion::CtrlEliminar($this->id);
            echo json_encode($objOBSE);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxObservacion();
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> gravedad = $_POST["Gravedad"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> compromiso = $_POST["Compromiso"];
        $oBJEC_AJAX -> estudiante = $_POST["Estudiante"];
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxObservacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> gravedad = $_POST["Gravedad"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> compromiso = $_POST["Compromiso"];
        $oBJEC_AJAX -> estudiante = $_POST["EstudianteIdEstudiante"];
        $oBJEC_AJAX -> profesor = $_POST["ProfesorIdProfesor"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxObservacion();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxObservacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxObservacion();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    