<?php
    class ControladorObservacion{
        public static function CtrlCrear($fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor){
            $objCREARM = ModeloObservacion::CrearObservacion($fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor,$password,$telefono,$foto,$fechaNacimiento){
            $objEDITM = ModeloObservacion::EditarObservacion($id,$fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloObservacion::ListarObservacion();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloObservacion::BuscarObservacion($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloObservacion::EliminarObservacion($id);
            return $objELIM;
        }
        
    }