<?php
    require_once "../Controller/ControladorAcudiente.php";
    require_once "../Model/ModeloAcudiente.php";
    class AjaxAcudiente{
        public $id;
        public function AjxBuscar(){
            $objACUDI = ControladorAcudiente::CtrlBuscar($this->id);
            echo json_encode($objACUDI);
        }
    }

    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAcudiente();
        $oBJEC_AJAX -> id = $_GET["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    