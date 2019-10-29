<?php
    class ControladorInformacion{
        public static function CtrlCrear($descripcion,$ubicacion,$correo,$telefono){
            $objCREARM = ModeloInformacion::CrearInformacion($descripcion,$ubicacion,$correo,$telefono);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$descripcion,$ubicacion,$correo,$telefono){
            $objEDITM = ModeloInformacion::EditarInformacion($id,$descripcion,$ubicacion,$correo,$telefono);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloInformacion::ListarInformacion();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloInformacion::BuscarInformacion($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloInformacion::EliminarInformacion($id);
            return $objELIM;
        }
    }