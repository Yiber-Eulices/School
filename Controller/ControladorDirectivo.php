<?php
    class ControladorDirectivo{
        public static function CtrlCrear($nombre,$correo,$telefono){
            $objCREARM = ModeloDirectivo::CrearDirectivo($nombre,$correo,$telefono);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$correo,$telefono){
            $objEDITM = ModeloDirectivo::EditarDirectivo($id,$nombre,$correo,$telefono);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloDirectivo::ListarDirectivo();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloDirectivo::BuscarDirectivo($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloDirectivo::EliminarDirectivo($id);
            return $objELIM;
        }
    }