<?php
    require_once "../Controller/ControladorProfesorMateria.php";
    require_once "../Model/ModeloProfesorMateria.php";
    class AjaxProfesorMateria{
        
        public $id;
        public $profesor;
        public $Materia;

        public function AjxCrear(){
            $objPROFCU = ControladorProfesorMateria::CtrlCrear($this->profesor,$this->Materia);
            echo json_encode($objPROFCU);
        }
        public function AjxEditar(){
            $objPROFCU = ControladorProfesorMateria::CtrlEditar( $this->id,$this->profesor,$this->Materia);
            echo json_encode($objPROFCU);  
        }
        public function AjxListar(){
            $objPROFCU = ControladorProfesorMateria::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objPROFCU) >= 1){
                        for ($i=0; $i < count($objPROFCU); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdProfesorMateria = '".$objPROFCU[$i]["IdProfesorMateria"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdProfesorMateria = '".$objPROFCU[$i]["IdProfesorMateria"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$objPROFCU[$i]["IdProfesorMateria"].'",
                                "'.$objPROFCU[$i]["ProfesorIdProfesor"].'",
                                "'.$objPROFCU[$i]["MateriaIdMateria"].'",
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
            $objPROFCU = ControladorProfesorMateria::CtrlBuscar($this->id);
            echo json_encode($objPROFCU);
        }
        public function AjxEliminar(){
            $objPROFCU = ControladorProfesorMateria::CtrlEliminar($this->id);
            echo json_encode($objPROFCU);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxProfesorMateria();
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> Materia = $_POST["Materia"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxProfesorMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> Materia = $_POST["Materia"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxProfesorMateria();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxProfesorMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxProfesorMateria();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    