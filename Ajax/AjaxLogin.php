<?php
    require_once "../Controller/ControladorLogin.php";
    require_once "../Model/ModeloLogin.php";

    class AjaxLogin{
        public $rol;
        public $user;
        public $password;
        public function LoginAjax(){
            $objLOGINC = ControladorLogin::CtrlLogin( $this->rol,$this->user,$this->password);
            echo json_encode($objLOGINC);
        }
    }
    $oBJEC_AJAX = new AjaxLogin();
    $oBJEC_AJAX->rol = $_POST["Rol"];
    $oBJEC_AJAX->user = $_POST["User"];
    $oBJEC_AJAX->password = $_POST["Paswword"];
    $oBJEC_AJAX -> LoginAjax();