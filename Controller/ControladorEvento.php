<?php
    class ControladorEvento{
        public static function CtrlCrear($fecha,$titulo,$descripcion,$foto){
            $objCREARM = ModeloEvento::CrearEvento($fecha,$titulo, $descripcion,$foto);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$fecha,$titulo,$descripcion,$foto){
            $objEDITM = ModeloEvento::EditarEvento($id,$fecha,$titulo,$descripcion,$foto);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloEvento::ListarEvento();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloEvento::BuscarEvento($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloEvento::EliminarEvento($id);
            return $objELIM;
        }
    }