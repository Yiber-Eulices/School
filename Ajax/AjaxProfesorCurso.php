<?php
    require_once "../Controller/ControladorProfesorCurso.php";
    require_once "../Model/ModeloProfesorCurso.php";
    class AjaxProfesorCurso{
        
        public $id;
        public $profesor;
        public $curso;
        public $materia;

        public function AjxCrear(){
            $objPROFCU = ControladorProfesorCurso::CtrlCrear($this->profesor,$this->curso,$this->materia);
            echo json_encode($objPROFCU);
        }
        public function AjxEditar(){
            $objPROFCU = ControladorProfesorCurso::CtrlEditar( $this->id,$this->profesor,$this->curso,$this->materia);
            echo json_encode($objPROFCU);  
        }
        public function AjxListarProfesor(){
            session_start();
            $count = 0;
            $objPROFCU = ControladorProfesorCurso::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objPROFCU) >= 1){
                        for ($i=0; $i < count($objPROFCU); $i++) {
                            if($objPROFCU[$i]["IdProfesor"]==$_SESSION["ProfesorId"]){
                                $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdProfesorCurso = '".$objPROFCU[$i]["IdProfesorCurso"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                                $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdProfesorCurso = '".$objPROFCU[$i]["IdProfesorCurso"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                                $oBJEC_JSON .= '[
                                    "'.$objPROFCU[$i]["IdProfesorCurso"].'",
                                    "'.$objPROFCU[$i]["Nombre"].'",
                                    "'.$objPROFCU[$i]["NombreMateria"].'",
                                    "'.$btnUpdate.$btnDelete.'"
                                ],';
                                $count++;
                            }
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            "",
                            "",
                            ""
                        ],';
                    }
                    if($count<=0 && count($objPROFCU) >= 1){
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
        public function AjxListarCurso(){
            session_start();
            $count = 0;
            $objPROFCU = ControladorProfesorCurso::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objPROFCU) >= 1){
                        for ($i=0; $i < count($objPROFCU); $i++) {
                            if($objPROFCU[$i]["IdCurso"]==$_SESSION["CursoId"]){
                                $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdProfesorCurso = '".$objPROFCU[$i]["IdProfesorCurso"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                                $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdProfesorCurso = '".$objPROFCU[$i]["IdProfesorCurso"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                                $oBJEC_JSON .= '[
                                    "'.$objPROFCU[$i]["IdProfesorCurso"].'",
                                    "'.$objPROFCU[$i]["NombreProfesor"]." ".$objPROFCU[$i]["Apellido"].'",
                                    "'.$objPROFCU[$i]["NombreMateria"].'",
                                    "'.$btnUpdate.$btnDelete.'"
                                ],';
                                $count++;
                            }
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            "",
                            "",
                            ""
                        ],';
                    }
                    if($count<=0 && count($objPROFCU) >= 1){
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
            $objPROFCU = ControladorProfesorCurso::CtrlBuscar($this->id);
            echo json_encode($objPROFCU);
        }
        public function AjxEliminar(){
            $objPROFCU = ControladorProfesorCurso::CtrlEliminar($this->id);
            echo json_encode($objPROFCU);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){              
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> curso = $_POST["Curso"];
        $oBJEC_AJAX -> materia = $_POST["Materia"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
       
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> profesor = $_POST["Profesor"];
        $oBJEC_AJAX -> curso = $_POST["Curso"];
        $oBJEC_AJAX -> materia = $_POST["Materia"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaProfesor'){
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> AjxListarProfesor();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaCurso'){
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> AjxListarCurso();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxProfesorCurso();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    