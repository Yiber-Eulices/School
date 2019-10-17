<?php
    class ControladorMatricula{
        public static function CtrlCrear($fecha,$costo,$grado,$estudiante){
            $objCREARM = ModeloMatricula::CrearMatricula($fecha,$costo,$grado,$estudiante);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$fecha,$costo,$grado,$estudiante){
            $objEDITM = ModeloMatricula::EditarMatricula($id,$fecha,$costo,$grado,$estudiante);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloMatricula::ListarMatricula();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloMatricula::BuscarMatricula($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloMatricula::EliminarMatricula($id);
            return $objELIM;
            
        }
    }