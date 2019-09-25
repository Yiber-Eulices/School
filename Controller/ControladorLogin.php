<?php
    class ControladorLogin{
        public static function CtrlLogin($rol,$user,$password){
            $objLOGINM = ModeloLogin::Login($rol,$user,$password);
            return $objLOGINM;
        }
    }