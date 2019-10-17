<?php
    class ControladorMateria{
        public static function CtrlCrear($nombre,$descripcion){
            $objCREARM = ModeloMateria::CrearMateria($nombre,$descripcion);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$descripcion){
            $objEDITM = ModeloMateria::EditarMateria($id,$nombre,$descripcion);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloMateria::ListarMateria();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloMateria::BuscarMateria($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloMateria::EliminarMateria($id);
            return $objELIM;
        }
    }